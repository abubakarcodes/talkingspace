<?php 
session_start();
spl_autoload_register(function($class_name){


require_once('config/config.php');
require_once('helpers/db_helper.php');
require_once('helpers/format_helper.php');
require_once('helpers/system_helper.php');

include"libraries/$class_name.php";

});



 ?>