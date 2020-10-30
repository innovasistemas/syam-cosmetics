<?php
//Conectar a la base de datos
include 'connection.php';


//Obtener los pedidos que estén estado 'procesando' de la base de datos
$sql = "SELECT *
        FROM wp_posts 
        WHERE post_type = 'shop_order' AND post_status = 'wc-cancelled'"; //cambiar luego por wc-processing

$resultQuery = $link->query($sql);
// var_dump($resultQuery);


//Formación de array de órdenes o pedidos que es deben incluir en la guía
$arrayOrders = array();
while($row = $resultQuery->fetch_array()){
    $arrayOrders[] = $row['ID'];
}
// var_dump($arrayOrders);


$arrayData = array();
$index = 0;
foreach($arrayOrders as $order){
    $sql = "SELECT 
                CONCAT(dcc.codigo_ciudad, ' - ', dcc.nombre_ciudad) AS 'Ciudad_Origen',
                -- wpm.meta_value as 'Ciudad_Destino',
                '4' AS 'Cod_FormaPago',
                '12' AS 'Cod_Servicio',
                '1' AS 'Num_Unidades',
                '1' AS 'MPesoReal_K',
                '1' AS 'MPesoVolumen_K',
                -- wpm.meta_value as 'Valor_Declarado',
                '0' AS 'Mca_DocInternacional',
                '3' AS 'Cod_Regional_Cta',
                '1' AS 'Cod_Oficina_Cta',
                '03-001-0004582' AS 'Cod_Cuenta',
                'SYAM COSMETICS SAS' AS 'Nom_Remitente',
                'Carrera 54 # 79AA Sur - 40 Bodega 140 La Troja' AS 'Dir_Remitente',
                '5963719' AS 'Tel_Remitente',
                '901040898-6' AS 'Ced_Remitente',
                -- concat(wpm.meta_value, ' - ', wpm.meta_value) as 'Nom_Destinatario',
                $order AS 'Num_Documentos', -- Número de pedido para solicitar la generación de la guía,
                /*(select 
                    case wp.post_title
                        when wp.post_title like '%KIT PIEL CANELA%'
                            then concat('PG.', wwopl.product_qty, wwopl.product_id, 'kpc/')   -- Pendiente: corresponde al detalle del pedido
                        when wp.post_title like '%CARBÓN ACTIVADO WIKI%' 
                            then concat('PG.', wwopl.product_qty, wwopl.product_id, 'carb/')  -- Pendiente: corresponde al detalle del pedido
                        else
                            'x'
                    end
                from wp_posts wp
                where wp.ID = 9487) as 'Dice_Contener',*/
                wp.post_excerpt as 'Texto_Guia',
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
-- 	(wpm.meta_key = '_billing_city' OR
-- 	wpm.meta_key = '_order_total' OR 
-- 	wpm.meta_key = '_billing_first_name' OR
-- 	wpm.meta_key = '_billing_last_name') AND
-- 	  -- wpm.meta_id = wpm2.meta_id AND
                wpm.post_id = '$order'  
-- group by wpm.meta_id 
-- limit 1	
            ";

    $resultQuery = $link->query($sql);
    // var_dump($resultQuery);
    // echo "<br>";

    //Formación de array con el detalle del pedido para la generación de la guía
    
    while($row = $resultQuery->fetch_array()){
        $arrayData[$index]['Ciudad_Origen'] = $row['Ciudad_Origen'];
        // $arrayData[$index]['Ciudad_Destino'] = $row['Ciudad_Destino'];
        // $arrayData[$index]['Cod_FormaPago'] = $row['Cod_FormaPago'];
        // $arrayData[$index]['Cod_Servicio'] = $row['Cod_Servicio'];
        // $arrayData[$index]['Num_Unidades'] = $row['Num_Unidades'];
        // $arrayData[$index]['MPesoReal_K'] = $row['MPesoReal_K'];
        // $arrayData[$index]['MPesoVolumen_K'] = $row['MPesoVolumen_K'];
        // // $arrayData[$index]['Valor_Declarado] = $row['Valor_Declarado'];
        // $arrayData[$index]['Mca_DocInternacional'] = $row['Mca_DocInternacional'];
        // $arrayData[$index]['Cod_Regional_Cta'] = $row['Cod_Regional_Cta'];
        // $arrayData[$index]['Cod_Oficina_Cta'] = $row['Cod_Oficina_Cta'];
        // $arrayData[$index]['Cod_Cuenta'] = $row['Cod_Cuenta'];
        // $arrayData[$index][] = $row['Nom_Remitente'];
        // $arrayData[$index][] = $row['Dir_Remitente'];
        // $arrayData[$index][] = $row['Tel_Remitente'];
        // $arrayData[$index][] = $row['Ced_Remitente'];
        // // $arrayData[$index][] = $row['Nom_Destinatario'];
        $arrayData[$index]['Num_Documentos'] = $row['Num_Documentos'];
        // // $arrayData[$index][] = $row['Dice_Contener'];
        // $arrayData[$index][] = $row['Texto_Guia'];
        // $arrayData[$index][] = $row['Accion_NotaGuia'];
        // $arrayData[$index][] = $row['Numero_Guia'];
        // $arrayData[$index][] = $row['CentroCosto'];
        // $arrayData[$index][] = $row['Con_Cartaporte'];
        // $arrayData[$index][] = $row['generar_os'];
        // $arrayData[$index][] = $row['valorproducto'];
    }

    ++$index;

}


// $index = 0;
// foreach($arrayOrders as $order){
//     $arrayData[$index][] = $order;
//     ++$index;
// }


print_r($arrayData[3]['Ciudad_Origen']);
print_r($arrayData[3]['Num_Documentos']);
// foreach($arrayData as $data){
//     print_r ($data[0]);
//     echo "<br>";
//     print_r ($data[1]);
//     echo "<br>";
//     exit;
// }



// echo count($arrayOrders);
// echo "<br>";
// echo count($arrayData[0][]);

// print_r($arrayData);


$link->close();