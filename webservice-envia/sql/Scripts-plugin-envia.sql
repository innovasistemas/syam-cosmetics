use desarrollossylog_tienda;

SELECT *
FROM desarrollossylog_tienda.wp_posts 
WHERE post_type like '%product%'

SELECT *
FROM desarrollossylog_tienda.wp_posts 
WHERE post_type ='shop_order'

SELECT wu.user_email 
FROM desarrollossylog_tienda.wp_posts wp inner join wp_users wu 
	on wp.post_author = wu.ID 
WHERE post_type = 'shop_order'


-- --------------------------------------------------------
-- --------------------------------------------------------
-- Generación guía
select  
	concat(dcc.codigo_ciudad, ' - ', dcc.nombre_ciudad) as 'Ciudad_Origen',
	wpm.meta_value as 'Ciudad_Destino',
	'4' as 'Cod_FormaPago',
	'12' as 'Cod_Servicio',
	'1' as 'Num_Unidades',
	'1' as 'MPesoReal_K',
	'1' as 'MPesoVolumen_K',
	wpm.meta_value as 'Valor_Declarado',
	'0' as 'Mca_DocInternacional',
	'3' as 'Cod_Regional_Cta',
	'1' as 'Cod_Oficina_Cta',
	'03-001-0004582' as 'Cod_Cuenta',
	'SYAM COSMETICS SAS' as 'Nom_Remitente',
	'Carrera 54 # 79AA Sur - 40 Bodega 140 La Troja' as 'Dir_Remitente',
	'5963719' as 'Tel_Remitente',
	'901040898-6' as 'Ced_Remitente'
from dt_conf_ciudades dcc, 
	 wp_postmeta wpm 
where dcc.nombre_ciudad = 'LA ESTRELLA' and 
	  (wpm.meta_key = '_billing_city' or
	  wpm.meta_key = '_order_total') and
	  -- wpm.meta_id = wpm2.meta_id and
	  wpm.post_id = '9486' 
-- group by wpm.post_id 
-- limit 1
;

-- --------------------------------------------------------
select distinct 
	concat(dcc.codigo_ciudad, ' - ', dcc.nombre_ciudad) as 'Ciudad_Origen',
	wpm.meta_value as 'Ciudad_Destino',
	'4' as 'Cod_FormaPago',
	'12' as 'Cod_Servicio',
	'1' as 'Num_Unidades',
	'1' as 'MPesoReal_K',
	'1' as 'MPesoVolumen_K',
	wpm.meta_value as 'Valor_Declarado',
	'0' as 'Mca_DocInternacional',
	'3' as 'Cod_Regional_Cta',
	'1' as 'Cod_Oficina_Cta',
	'03-001-0004582' as 'Cod_Cuenta',
	'SYAM COSMETICS SAS' as 'Nom_Remitente',
	'Carrera 54 # 79AA Sur - 40 Bodega 140 La Troja' as 'Dir_Remitente',
	'5963719' as 'Tel_Remitente',
	'901040898-6' as 'Ced_Remitente',
	concat(wpm.meta_value, ' - ', wpm.meta_value) as 'Nom_Destinatario',
	'9487' as 'Num_Documentos', -- Número de pedido para solicitar la generación de la guía
	'Dice_Contener' as 'Dice_Contener',  -- Pendiente: corresponde al detalle del pedido
	post_excerpt as 'Texto_Guia',
	'' as 'Accion_NotaGuia'
from 
 	dt_conf_ciudades dcc, 
 	wp_posts wp inner join
	wp_postmeta wpm 
		on wp.ID = wpm.post_id 
	inner join wp_postmeta wpm2 
		on wpm.post_id = wpm2.post_id 
where 
 	dcc.nombre_ciudad = 'LA ESTRELLA' and 
	(wpm.meta_key = '_billing_city' or
	wpm.meta_key = '_order_total' or 
	wpm.meta_key = '_billing_first_name' or
	wpm.meta_key = '_billing_last_name') and
	  -- wpm.meta_id = wpm2.meta_id and
	  wpm.post_id = '9487'  
-- group by wpm.meta_id 
-- limit 1	  
;	  
	  

	  
-- --------------------------------------------------------	  
-- --------------------------------------------------------

	  
	  
	  
	  

select count(*)
from wp_postmeta 

select *
from wp_postmeta 
where post_id = 8079 -- producto


select *
from wp_postmeta 
where post_id = 9486 -- pedido

select * from wp_users wu

select * from wp_usermeta wu2 where user_id = 23