use desarrollossylog_tienda;


SELECT *
FROM wp_posts 
WHERE post_type like '%product%'


SELECT *
FROM wp_posts 
WHERE post_type ='shop_order'


SELECT *
FROM wp_posts 
-- where post_author <> 1
where ID = 9487 -- ---> Pedido
-- where ID = 8079 -- ---> Producto


SELECT wp.*
FROM wp_posts wp inner join wp_users wu 
	on wp.post_author = wu.ID 
WHERE post_type = 'shop_order' AND post_status = 'wc-cancelled';

SELECT wp.*
FROM wp_posts wp inner join wp_users wu 
	on wp.post_author = wu.ID 
WHERE post_status = 'wc-cancelled';


SELECT wp.*
FROM wp_posts wp inner join wp_users wu 
	on wp.post_author = wu.ID 
WHERE post_type = 'shop_order' ;


select * from wp_users wu;


select * from wp_usermeta wum;


select wwopl.*, wp.ID, wp.post_title 
from wp_posts wp inner join wp_wc_order_product_lookup wwopl 
	on wp.ID = wwopl.product_id 
where wwopl.order_id = 9487;


select count(*)
from wp_postmeta 


select *
from wp_postmeta 
where post_id = 8079 -- producto


select *
from wp_postmeta 
where post_id = 9487 -- pedido


select * from wp_users wu


select * from wp_usermeta wu2 where user_id = 23


-- --------------------------------------------------------
-- --------------------------------------------------------
-- Generación guía

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
	(select 
		case wp.post_title
			when wp.post_title like '%KIT PIEL CANELA%'
				then concat('PG.', wwopl.product_qty, wwopl.product_id, 'kpc/')   -- Pendiente: corresponde al detalle del pedido
			when wp.post_title like '%CARBÓN ACTIVADO WIKI%' 
				then concat('PG.', wwopl.product_qty, wwopl.product_id, 'carb/')  -- Pendiente: corresponde al detalle del pedido
			else
				'x'
		end
	from wp_posts wp
	where wp.ID = 9487) as 'Dice_Contener',
	wp.post_excerpt as 'Texto_Guia',
	'' as 'Accion_NotaGuia',
	'' as 'Numero_Guia',
	'' as 'CentroCosto',
	'' as 'Con_Cartaporte',
	'' as 'generar_os',
	'0' as 'valorproducto'
from 
 	dt_conf_ciudades dcc, 
 	wp_posts wp inner join
	wp_postmeta wpm 
		on wp.ID = wpm.post_id 
	inner join wp_postmeta wpm2 
		on wpm.post_id = wpm2.post_id 
	inner join wp_wc_order_product_lookup wwopl
		on wp.ID = wwopl.order_id 
	inner join wp_posts wp1 	
		on wp1.ID = wwopl.product_id 
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

select ID, 
	case wp.post_title
		when wp.post_title like '%KIT PIEL CANELA%'
			then concat('PG.', wwopl.product_qty, wwopl.product_id, 'kpc/')   -- Pendiente: corresponde al detalle del pedido
		when wp.post_title like '%CARBÓN ACTIVADO WIKI%' 
			then concat('PG.', wwopl.product_qty, wwopl.product_id, 'carb/')  -- Pendiente: corresponde al detalle del pedido
		else
			'x'
	end
from wp_posts wp inner join wp_wc_order_product_lookup wwopl
		on wp.ID = wwopl.order_id 
where post_status = 'wc-cancelled'

-- wp.ID = 9487) -- as 'Dice_Contener'
	  
	  
	  
	  

