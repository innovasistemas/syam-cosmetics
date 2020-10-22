<?php
global $wpdb, $_wp_using_ext_object_cache;

if($_wp_using_ext_object_cache) {
	return;
}

if (!current_user_can('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));
?>
	<div class="wrap">
		<h2><?php _e('Develop', 'Desarrollo') ?></h2>
		Bienvenido a la configuración del plugin
	</div>

<?php
add_option('Nueva opción', '1000', '', 'yes');
?>

<p>
	La nueva opción es:
	<strong>
		<?php  
			echo get_option('Nueva opción');
		?>
	</strong>
</p>

<br>
<br>

<?php
echo TEMPLATEPATH . "<br>";
// $result = $wpdb->get_col("SELECT option_name FROM {$wpdb->prefix}options LIMIT 5");
$result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options LIMIT 5");
// var_dump($result);
echo "<br>";
foreach($result as $key => $value){
// foreach($result as $value){
	echo "{$key}: {$value->option_name} -- {$value->option_value} <br>";
}

//for()

?>
<hr>
<h3>Datos tabla options</h3>

<?php
if(!$link = mysqli_connect('localhost', 'root', '', 'wordpress_test')){
	echo "Error al intentar conectar con la base de datos";
	exit();
}

$result = mysqli_query($link, "SELECT * FROM wp_options LIMIT 10");
// var_dump($result);

while($record = mysqli_fetch_array($result)){
	echo "Dato: {$record['option_name']} <br>";
}

mysqli_free_result($result);
mysqli_close($link);

$objMysqli = new mysqli('localhost', 'root', '', 'wordpress_test');
if($objMysqli->connect_errno){
	echo "Ocurrió un error al conectar con la base de datos";
	exit();
}
?>

<br>
<hr>
<h3>Usuarios registrados</h3>

<?php
$result2 = $objMysqli->query("SELECT * FROM wp_users");
while($record = $result2->fetch_assoc()){
	echo "{$record['user_login']} -- {$record['user_email']} <br>";
}

$result2->free();
$objMysqli->close();
?>

<br>
<br>
<hr>
<div class="footer">
	<?php
	echo "Este plugin tiene licencia GPL"
	?>
	<input type="button" id="btnButton" value="Pulsa aquí">
	<input type="button" id="btnAbout" value="Acerca de">
</div>

<div id="dialog" title="Información del sistema">
Desarrollador: <b>Jaime Montoya</b>
<br>
¡Hello World!
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.min.css" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/theme.min.css" crossorigin="anonymous" />


<?php
// wp_enqueue_script('jquery');
?>

<script>
	document.getElementById('btnButton').addEventListener('click', function(){
		alert('Gracias por utilizar el plugin ¡Hello World!')
	});

	$(function(){
		//$('#dialog').dialog();

		$('#btnAbout').click(function(){
			// alert('Desarrollador: Jaime Montoya');
			$('#dialog').dialog({
				buttons: [
					{
						text: 'Aceptar',
						click: function(){
							$(this).dialog('close');
						}
					}
				]
			}).prev('.ui-dialog-titlebar').css('background', '#81BEF7');
			$('#dialog').css('background', '#A9F5E1')
		});



	});

</script>