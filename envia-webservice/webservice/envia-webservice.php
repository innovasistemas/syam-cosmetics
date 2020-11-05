<?php
//----------------------------------------------------------------------------------------
// Conectar a la base de datos
//---------------------------------------------------------------------------------------
include 'connection.php';

//---------------------------------------------------------------------------------------
// Obtener los pedidos que estén estado 'procesando' ('wc-processing') de la base de datos
//---------------------------------------------------------------------------------------
$sql = "SELECT *
        FROM wp_posts 
        WHERE post_type = 'shop_order' AND post_status = 'wc-cancelled'"; // cambiar luego por wc-processing

$resultQuery = $link->query($sql);


//---------------------------------------------------------------------------------------
// Formación de array de órdenes de pedidos que se deben incluir en la guía y que cumplen 
// con el estado 'wc-processing'
//---------------------------------------------------------------------------------------
$arrayOrders = array();

while($row = $resultQuery->fetch_array()){
    $arrayOrders[] = $row['ID'];
}


//---------------------------------------------------------------------------------------
// Extraer los datos necesarios de cada pedido para realizar la solicitud al Webservice 
// de Envía y generar la guía
//---------------------------------------------------------------------------------------
$arrayData = array();
$index = 0;
$index2 = 0;

foreach($arrayOrders as $order){
    $sql =  "SELECT 
                CONCAT(dcc.codigo_ciudad, ' - ', dcc.nombre_ciudad) AS 'Ciudad_Origen',
                '4' AS 'Cod_FormaPago',
                '12' AS 'Cod_Servicio',
                '1' AS 'Num_Unidades',
                '1' AS 'MPesoReal_K',
                '1' AS 'MPesoVolumen_K',
                TRUNCATE(wpm.meta_value, 0) AS 'Valor_Declarado', 
                '0' AS 'Mca_NoSabado',
                '0' AS 'Mca_DocInternacional',
                '3' AS 'Cod_Regional_Cta',
                '1' AS 'Cod_Oficina_Cta',
                '03-001-0004582' AS 'Cod_Cuenta',
                'SYAM COSMETICS SAS' AS 'Nom_Remitente',
                'Carrera 54 # 79AA Sur - 40 Bodega 140 La Troja' AS 'Dir_Remitente',
                '3016883' AS 'Tel_Remitente',
                '901040898-6' AS 'Ced_Remitente',
                -- CONCAT(wpm.meta_value, ' - ', wpm.meta_value) AS 'Nom_Destinatario', -- organizar dato a capturar
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
 	            -- wpm.meta_key = '_billing_city' OR
             	wpm.meta_key = '_order_total' AND 
             	-- wpm.meta_key = '_billing_first_name' OR
             	-- wpm.meta_key = '_billing_last_name') AND
 	            -- wpm.meta_id = wpm2.meta_id AND
                wpm.post_id = '$order'  
            ";

    $resultQuery = $link->query($sql);

    //---------------------------------------------------------------------------------------
    //Formación de array con el detalle del pedido para la generación de la guía
    //---------------------------------------------------------------------------------------
    while($row = $resultQuery->fetch_array()){
        $arrayData[$index]['ciudad_origen'] = $row['Ciudad_Origen'];
        $arrayData[$index]['cod_formapago'] = $row['Cod_FormaPago'];
        $arrayData[$index]['cod_servicio'] = $row['Cod_Servicio'];
        $arrayData[$index]['num_unidades'] = $row['Num_Unidades'];
        $arrayData[$index]['mpesoreal_k'] = $row['MPesoReal_K'];
        $arrayData[$index]['mpesovolumen_k'] = $row['MPesoVolumen_K'];
        $arrayData[$index]['valor_declarado'] = $row['Valor_Declarado'];
        $arrayData[$index]['mca_nosabado'] = $row['Mca_DocInternacional'];
        $arrayData[$index]['mca_docinternacional'] = $row['Mca_NoSabado'];
        $arrayData[$index]['cod_regional_cta'] = $row['Cod_Regional_Cta'];
        $arrayData[$index]['cod_oficina_cta'] = $row['Cod_Oficina_Cta'];
        $arrayData[$index]['cod_cuenta'] = $row['Cod_Cuenta'];
        $arrayData[$index]['info_origen']['nom_remitente'] = $row['Nom_Remitente'];
        $arrayData[$index]['info_origen']['dir_remitente'] = $row['Dir_Remitente'];
        $arrayData[$index]['info_origen']['tel_remitente'] = $row['Tel_Remitente'];
        $arrayData[$index]['info_origen']['ced_remitente'] = $row['Ced_Remitente'];
        $arrayData[$index]['con_cartaporte'] = $row['Con_Cartaporte'];
        $arrayData[$index]['numero_guia'] = $row['Numero_Guia'];
        $arrayData[$index]['info_contenido']['num_documentos'] = $row['Num_Documentos'];
        $arrayData[$index]['info_contenido']['texto_guia'] = $row['Texto_Guia'];
        $arrayData[$index]['info_contenido']['accion_notaguia'] = $row['Accion_NotaGuia'];
        $arrayData[$index]['info_contenido']['centrocosto'] = $row['CentroCosto'];
        $arrayData[$index]['info_contenido']['valorproducto'] = $row['valorproducto'];
        $arrayData[$index]['generar_os'] = $row['generar_os'];
    }


    //---------------------------------------------------------------------------------------
    // Extraer el detalle de la orden de pedido
    //---------------------------------------------------------------------------------------
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

    $arrayData[$index]['info_contenido']['Dice_Contener'] = $strSaysContaint; // Organizar para que sume cantidades del mismo producto y muestre solo una descripción de ésta


    //---------------------------------------------------------------------------------------
    // Extraer la ciudad del destinatario
    //---------------------------------------------------------------------------------------
    $sql3 = "SELECT *
            FROM wp_postmeta wpm
            WHERE wpm.meta_key = '_billing_city' AND post_id = '$order'";
    
    // $sql3 = "SELECT wpm.*, dcc.codigo_ciudad, dcc.nombre_ciudad
    //         FROM wp_postmeta wpm, dt_conf_ciudades dcc  
    //         WHERE wpm.meta_key = '_billing_city' 
    //             AND dcc.nombre_ciudad LIKE CONCAT('%', wpm.meta_value, '%')
    //             AND post_id = '$order'";

    $resultQuery3 = $link->query($sql3);
    $row3 = $resultQuery3->fetch_array();
    $arrayData[$index]['ciudad_destino'] = $row3['meta_value'];


    //---------------------------------------------------------------------------------------
    // Extraer el nombre, apellido, dirección, teléfono y cédula del destinatario
    //---------------------------------------------------------------------------------------
     $sql3 = "SELECT *
             FROM wp_postmeta wpm
             WHERE wpm.meta_key = '_billing_first_name' AND post_id = '$order'";

    $resultQuery3 = $link->query($sql3);
    $row3 = $resultQuery3->fetch_array();
    $strFullName = $row3['meta_value'];
    
    $sql3 = "SELECT *
             FROM wp_postmeta wpm
             WHERE wpm.meta_key = '_billing_last_name' AND post_id = '$order'";

    $resultQuery3 = $link->query($sql3);
    $row3 = $resultQuery3->fetch_array();
    $strFullName .= " " . $row3['meta_value'] . " / $order";

    $sql3 = "SELECT *
             FROM wp_postmeta wpm
             WHERE wpm.meta_key = '_billing_address_1' AND post_id = '$order'";

    $resultQuery3 = $link->query($sql3);
    $row3 = $resultQuery3->fetch_array();
    
    $sql3 = "SELECT *
             FROM wp_postmeta wpm
             WHERE wpm.meta_key = '_billing_phone' AND post_id = '$order'";

    $resultQuery3 = $link->query($sql3);
    $row4 = $resultQuery3->fetch_array();

    $arrayData[$index]['info_destino']['nom_destinatario'] = $strFullName;
    $arrayData[$index]['info_destino']['dir_destinatario'] = $row3['meta_value'];
    $arrayData[$index]['info_destino']['tel_destinatario'] = $row4['meta_value'];
    $arrayData[$index]['info_destino']['ced_destinatario'] = ""; // Extraer cédula para enviarla (aunque no es obligatorio)
 
    ++$index;
}

// echo "\nDetalle orden\n";
// print_r($arrayData);
// print_r($row3);

$link->close();

echo json_encode($arrayData);

