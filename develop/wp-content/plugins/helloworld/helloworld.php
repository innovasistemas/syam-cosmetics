<?php
/*
Plugin Name: helloworld
Plugin URI: http://localhost/develop/
Description: Plugin ¡hola mundo!
Version: 1.0
Author: Jaime Montoya
Author URI: http://localhost/develop/
License: GPL
*/

defined('ABSPATH') or die('Bye bye');
define('DEVELOP_PATH', plugin_dir_path(__FILE__));
define('DEVELOP_NAME', '¡Hello Word!');

include(DEVELOP_PATH . 'includes/functions.php');
include(DEVELOP_PATH . 'includes/options.php');
