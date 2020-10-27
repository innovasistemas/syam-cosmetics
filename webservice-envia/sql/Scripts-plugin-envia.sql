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
-- Generación guía
select distinctrow 
	concat(dcc.codigo_ciudad, ' - ', dcc.nombre_ciudad) as 'Ciudad_Origen',
	wpm.meta_value as 'Ciudad_Destino',
	'4' as 'Cod_FormaPago',
	'12' as 'Cod_Servicio',
	'1' as 'Num_Unidades',
	'1' as 'MPesoReal_K',
	'1' as 'MPesoVolumen_K',
	wpm.meta_value as 'Valor_Declarado'
from dt_conf_ciudades dcc, 
	 wp_postmeta wpm 
where dcc.nombre_ciudad = 'LA ESTRELLA' and 
	  (wpm.meta_key = '_billing_city' or
	  wpm.meta_key = '_order_total') and
	  -- wpm.meta_id = wpm2.meta_id and
	  wpm.post_id = '9486' 
-- group by wpm.post_id 
-- limit 1

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