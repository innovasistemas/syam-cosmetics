<?php

// Top level menu del plugin
function adminMenu()
{
    add_menu_page(DEVELOP_NAME, DEVELOP_NAME, 'manage_options', DEVELOP_PATH . '/admin/configuration.php');
    add_submenu_page(DEVELOP_PATH . '/admin/helloworld.php', DEVELOP_NAME, DEVELOP_NAME, 'manage_options', DEVELOP_PATH . '/admin/submenu.php');
}

// El hook admin_menu ejecuta la funcion rai_menu_administrador
add_action('admin_menu', 'adminMenu');
