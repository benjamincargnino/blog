<?php 

// cookies /////////////////////////////////////////////////////////////////////////////////////////////////////
// setcookie("test", "3wa", strtotime("+1 DAYS"), "/", false, false, true);
// var_dump($_COOKIE);
// echo $_COOKIE["test"];
// die();
// setcookie("favoris", null, -1, "/");

// sessions /////////////////////////////////////////////////////////////////////////////////////////////////////////
// $_SESSION["test"] = "3wa";
// die;

include "config/config.inc.php";

$currentPage = "accueil";

if(empty($_GET["page"]) == false)
{
	$currentPage = $_GET["page"];
};

$controller =  "controllers/".$currentPage."Controller.php";
$vue =  "vues/".$currentPage."Vue.phtml";

if(file_exists($controller) == false || file_exists($vue) == false) 
{
	header($_SERVER["SERVER_PROTOCOL"]. " 404 Not Found");
	include "vues/404.phtml";
	die();
}	

include $controller;
include $vue;
