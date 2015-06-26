<?php 
include "config/config.inc.php";

$currentPage = "accueil";

if(empty($_GET["page"]) == false)
{
	$currentPage = $_GET["page"];
};

include "controllers/".$currentPage."Controller.php";
include "vues/".$currentPage."Vue.phtml";