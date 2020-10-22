<?php

function activatePlugin()
{
    //A partir de aquí escribe todas las tareas que quieres realizar en la activación
    //Vas a añadir una función nueva. La sintaxis de add_option es la siguiente:add_option($nombre,$valor,'',$cargaautomatica)
    add_option('option_1', 255, '', 'yes');
}

register_activation_hook(__FILE__, 'activatePlugin');


function deactivatePlugin()
{
    echo "Plugin desactivado";
    // echo "<script>alert('Plugin desactivado');</script>";
    //A partir de aqui escribe todas las tareas que quieres realizar en la desactivación
}

register_deactivation_hook(__FILE__, 'deactivatePlugin');


function newButtons($buttons)
{
    $buttons[] = 'fontselect';
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'underline';
    return $buttons;
}

add_filter('mce_buttons_3','newButtons');


function home() {
	// if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js', false, '1.3.2');
		wp_enqueue_script('jquery');
	// }
}

add_action('init', 'home');