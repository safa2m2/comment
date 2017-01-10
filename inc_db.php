<?php
error_reporting(0);
session_start(); 
include("jdf.php");
include("inc_con.php");

/* Database connection information */
$db_user		= "root";
$db_password	= "";
$db_name		= "comment";
$db_server		= "localhost";
$done			=	0;

$MainPath		=	str_replace('//','/',substr($_SERVER['SCRIPT_FILENAME'],0,(strripos($_SERVER['SCRIPT_FILENAME'],$_SERVER['SCRIPT_NAME']))));
$MainFilename	=	substr($_SERVER['SCRIPT_FILENAME'],(strripos($_SERVER['SCRIPT_FILENAME'],'/')+1));
$MainURL		=	str_replace($MainFilename,"","http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']) ;

date_default_timezone_set("Asia/Tehran");

$mysqlicheck= new mysqli($db_server,$db_user, $db_password,$db_name);
if ($mysqlicheck->connect_errno) {
	printf("Connect failed: %s\n", $mysqlicheck->connect_error);//"");//
	die();
}
$mysqlicheck->query("SET NAMES 'utf8'");
$mysqlicheck->query("set time_zone = '+03:30'");



/*$requst_from = substr($_SERVER['SCRIPT_FILENAME'],(strripos($_SERVER['SCRIPT_FILENAME'],'/')+1));

$no_page = array('shop-customer-addresses.php','shop-customer-dashboard.php','shop-customer-profile.php','shop-order-history.php','shop-product-wishlist.php','shop-customer-e-a.php');

if (in_array($requst_from, $no_page))
{
	if($_SESSION["login"]["type"]!="modir" && $_SESSION["login"]["type"]!= "user" )
	{
		$url = 'login.php';
		header( "Location: $url" );
		die();
	}
}
elseif($requst_from == 'login.php' &&  $_SESSION["login"]["type"] == "user" && $_GET['o'] != 'o')
{
	$url = 'index.php';
	header( "Location: $url" );
	die();
}
elseif($requst_from == 'shop-checkout.php' && $_SESSION["cart_item"] == "")
{
	$url = 'shop-cart.php';
	header( "Location: $url" );
	die();
}
elseif($requst_from == 'shop-checkout-complete.php' && $_SESSION["check"] == "")
{
	$url = 'shop-cart.php';
	header( "Location: $url" );
	die();
}
*/

?>