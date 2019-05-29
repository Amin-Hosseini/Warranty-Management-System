<?php
define("SERVER","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","ae_wms");
define("SITENAME","Warranty");
define("SITEPATH","");
define("DEBUG",true);
define('DSN', 'mysql:host='.SERVER.';dbname='.DATABASE.';');


if(DEBUG == true){
	error_reporting(E_ALL);
	ini_set("display_errors",1);
} else {
	error_reporting(0);
	ini_set("display_errors",0);
}

$Imgs = array("image/png","image/xpng","image/jpeg","image/pjpeg","image/jpg","image/gif");
$CountShow = 10;
$SiteStatus = true;
$Title =      ".::. Warranty Management System .::.";

function sanitize($var)
	 {
		$var = strip_tags($var);
		$var = htmlentities($var, ENT_COMPAT, 'UTF-8');
		$var = stripslashes($var);
		$var = htmlspecialchars($var);
		$var = str_replace("'","''",$var);
		$var = str_replace("/","",$var);
		$var = str_replace("\\","",$var);
		$var = str_replace("%","",$var);
		$var = str_replace("$","",$var);
		$var = str_replace("#","",$var);
		$var = str_replace("^","",$var);
		$var = str_replace("~","",$var);
		$var = str_replace("etc","",$var);
		$var = str_replace("passwd","",$var);
		$var = str_replace("<script>","",$var);
		$var = str_replace("<div>","",$var);
		$var = str_replace("while","w h i l e",$var);
		return $var;
	 }
?>