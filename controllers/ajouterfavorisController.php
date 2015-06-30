<?php

if(empty($_GET["id"]) == true) {
	header('Location: index.php');
}

if(empty($_COOKIE["favoris"]) == true) 
{
	$favoris = [];
}
else
{
	$favoris = unserialize($_COOKIE["favoris"]);
};

array_push($favoris, intval($_GET['id']));
setcookie("favoris", serialize($favoris), strtotime("+1 DAYS"), "/", false, false, true);
// var_dump($_COOKIE);
// var_dump($_COOKIE["favoris"]);

header('Location: index.php?page=favoris');
die();