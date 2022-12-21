<?php

session_start();
require 'vendor/autoload.php';
include("connection.php");
	include("functions.php");

if(isset($_SESSION['user_id']))
	
{	$a=$_SESSION['username'];


	if(isset($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $k => $value)
	{
		echo $value['Item_Name'];
	$b=$_SESSION['cart'][$k]['Item_Name'];
	$c=$_SESSION['cart'][$k]['Price'];
	$d=$_SESSION['cart'][$k]['Quantity'];
$db=$con->adb->icart;


		$sql=$db->insertOne(['username'=>$_SESSION['username'],'item_name'=>$value['Item_Name'],'price'=>$value['Price'],'quantity'=>$value['Quantity'],'book_id'=>$value['id']]);

}
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	unset($_SESSION['cart']);
	unset($_SESSION['fid']);}

}

header("Location: login.php");
die;
print_r($_SESSION['cart']);
?>