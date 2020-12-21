
<?php

require('inc/header.php');

define("ROOT", dirname(__DIR__));

require ROOT . "/Autoloader.php";
Autoloader::register();

session_start();
echo('<main>');

require ROOT . "/Router.php";

