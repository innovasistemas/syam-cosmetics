<?php
// Conectar a la base de datos
include 'connection.php';


// Obtener los pedidos que estén estado 'procesando' ('wc-processing') de la base de datos
$sql = "SELECT *
        FROM wp_posts 
        WHERE post_type = 'shop_order' AND post_status = 'wc-cancelled'"; // cambiar luego por wc-processing

$resultQuery = $link->query($sql);

// Formación de array de órdenes de pedidos que se deben incluir en la guía y que cumplen con el estado 'wc-processing'
$arrayOrders = array();

while($row = $resultQuery->fetch_array()){
    $arrayOrders[] = $row['ID'];
}


// Extraer los datos necesarios de cada pedido para realizar la solicitud al Webservice de Envía y generar la guía
$arrayData = array();
$index = 0;
$index2 = 0;

foreach($arrayOrders as $order){
    $sql =  "SELECT 
                CONCAT(dcc.codigo_ciudad, ' - ', dcc.nombre_ciudad) AS 'Ciudad_Origen',
                wpm.meta_value AS 'Ciudad_Destino', -- enviar código y organizar dato a capturar
                '4' AS 'Cod_FormaPago',
                '12' AS 'Cod_Servicio',
                '1' AS 'Num_Unidades',
                '1' AS 'MPesoReal_K',
                '1' AS 'MPesoVolumen_K',
                TRUNCATE(wpm.meta_value, 0) AS 'Valor_Declarado', 
                '0' AS 'Mca_DocInternacional',
                '3' AS 'Cod_Regional_Cta',
                '1' AS 'Cod_Oficina_Cta',
                '03-001-0004582' AS 'Cod_Cuenta',
                'SYAM COSMETICS SAS' AS 'Nom_Remitente',
                'Carrera 54 # 79AA Sur - 40 Bodega 140 La Troja' AS 'Dir_Remitente',
                '3016883' AS 'Tel_Remitente',
                '901040898-6' AS 'Ced_Remitente',
                CONCAT(wpm.meta_value, ' - ', wpm.meta_value) AS 'Nom_Destinatario', -- organizar dato a capturar
                $order AS 'Num_Documentos', -- Número de pedido para solicitar la generación de la guía,
                wp.post_excerpt AS 'Texto_Guia',
                '' AS 'Accion_NotaGuia',
                '' AS 'Numero_Guia',
                '' AS 'CentroCosto',
                '' AS 'Con_Cartaporte',
                '' AS 'generar_os',
                '0' AS 'valorproducto'
            FROM 
              	dt_conf_ciudades dcc, 
              	wp_posts wp INNER JOIN wp_postmeta wpm 
             		ON wp.ID = wpm.post_id 
             	INNER JOIN wp_postmeta wpm2 
             		ON wpm.post_id = wpm2.post_id 
             	INNER JOIN wp_wc_order_product_lookup wwopl
             		ON wp.ID = wwopl.order_id 
             	INNER JOIN wp_posts wp1 	
             		ON wp1.ID = wwopl.product_id 
            WHERE
              	dcc.nombre_ciudad = 'LA ESTRELLA' AND 
 	            (wpm.meta_key = '_billing_city' OR
             	wpm.meta_key = '_order_total' OR 
             	wpm.meta_key = '_billing_first_name' OR
             	wpm.meta_key = '_billing_last_name') AND
 	            -- wpm.meta_id = wpm2.meta_id AND
                wpm.post_id = '$order'  
            ";

    $resultQuery = $link->query($sql);


    //Formación de array con el detalle del pedido para la generación de la guía
    while($row = $resultQuery->fetch_array()){
        $arrayData[$index]['Ciudad_Origen'] = $row['Ciudad_Origen'];
        $arrayData[$index]['Ciudad_Destino'] = $row['Ciudad_Destino'];
        $arrayData[$index]['Cod_FormaPago'] = $row['Cod_FormaPago'];
        $arrayData[$index]['Cod_Servicio'] = $row['Cod_Servicio'];
        $arrayData[$index]['Num_Unidades'] = $row['Num_Unidades'];
        $arrayData[$index]['MPesoReal_K'] = $row['MPesoReal_K'];
        $arrayData[$index]['MPesoVolumen_K'] = $row['MPesoVolumen_K'];
        $arrayData[$index]['Valor_Declarado'] = $row['Valor_Declarado'];
        $arrayData[$index]['Mca_DocInternacional'] = $row['Mca_DocInternacional'];
        $arrayData[$index]['Cod_Regional_Cta'] = $row['Cod_Regional_Cta'];
        $arrayData[$index]['Cod_Oficina_Cta'] = $row['Cod_Oficina_Cta'];
        $arrayData[$index]['Cod_Cuenta'] = $row['Cod_Cuenta'];
        $arrayData[$index]['info_origen']['Nom_Remitente'] = $row['Nom_Remitente'];
        $arrayData[$index]['info_origen']['Dir_Remitente'] = $row['Dir_Remitente'];
        $arrayData[$index]['info_origen']['Tel_Remitente'] = $row['Tel_Remitente'];
        $arrayData[$index]['info_origen']['Ced_Remitente'] = $row['Ced_Remitente'];
        $arrayData[$index]['Nom_Destinatario'] = $row['Nom_Destinatario'];
        $arrayData[$index]['Num_Documentos'] = $row['Num_Documentos'];
        $arrayData[$index]['Texto_Guia'] = $row['Texto_Guia'];
        $arrayData[$index]['Accion_NotaGuia'] = $row['Accion_NotaGuia'];
        $arrayData[$index]['Numero_Guia'] = $row['Numero_Guia'];
        $arrayData[$index]['CentroCosto'] = $row['CentroCosto'];
        $arrayData[$index]['Con_Cartaporte'] = $row['Con_Cartaporte'];
        $arrayData[$index]['generar_os'] = $row['generar_os'];
        $arrayData[$index]['valorproducto'] = $row['valorproducto'];
    }


    // Extraer el detalle de la orden de pedido
    $sql2 = "SELECT *
            FROM wp_posts wp INNER JOIN wp_wc_order_product_lookup wwopl 
                ON wp.ID = wwopl.product_id 
            WHERE wwopl.order_id = '$order'";

    $resultQuery2 = $link->query($sql2);
    $strSaysContaint = "PG.";
    $index2 = 0;
    $arrayDetails = array();

    while($row2 = $resultQuery2->fetch_array()){
        $arrayDetails[$index2]['post_title'] = $row2['post_title'];
        $arrayDetails[$index2]['product_qty'] = $row2['product_qty'];
        $strSaysContaint .= $arrayDetails[$index2]['product_qty'] . $arrayDetails[$index2]['post_title'] . "/";
        ++$index2;
    }

    $arrayData[$index]['Dice_Contener'] = $strSaysContaint; // Organizar para que sume cantidades del mismo producto y muestre solo una descripción de ésta
    ++$index;
}

// echo "\nDetalle orden\n";
// print_r($arrayData);

$link->close();

echo json_encode($arrayData);

