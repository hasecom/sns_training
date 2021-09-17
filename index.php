<?php 
require_once "vendor/autoload.php";
use App\Config\config;
echo config::getEnv("TEST");
echo "<br>";
echo config::getEnv("ENV");
?>