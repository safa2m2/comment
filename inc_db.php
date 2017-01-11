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



$requst_from = substr($_SERVER['SCRIPT_FILENAME'],(strripos($_SERVER['SCRIPT_FILENAME'],'/')+1));

$no_page = array('index.php', 'add_user.php', 'proce.php', 'proce_co.php', 'proce_cr.php', 'proce_on.php', 'rece_pas.php');

if (in_array($requst_from, $no_page))
{
	if($_SESSION["login"]!="admin" && $_SESSION["login"]!= "user" )
	{
		$url = 'login.php';
		header( "Location: $url" );
		die();
	}
}
elseif($requst_from == 'login.php' &&  ($_SESSION["login"]== "user" || $_SESSION["login"]=="admin"))
{
	$url = 'index.php';
	header( "Location: $url" );
	die();
}



?>