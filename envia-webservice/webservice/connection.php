<?php
error_reporting(E_ALL ^ E_WARNING);
!$link = new mysqli('localhost', 'root', '', 'desarrollossylog_tienda');
if($link->connect_errno){
    echo("Conexión no válida: " . $link->connect_error);
    exit();
}