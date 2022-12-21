<?php


require 'vendor/autoload.php';
if(!$con=new MongoDB\Client("mongodb://localhost:27017"))
{

	die("failed to connect!");
}
?>
