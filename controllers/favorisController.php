<?php

require_once __DIR__."/../model/articleClass.php";

if(empty($_GET["supprimer"]) == false)
{
	setcookie("favoris", null, -1, "/");
	header("Location:index.php?page=favoris");
	die();
}

$articlefavoris = [];

if(empty($_COOKIE["favoris"]) == false) {
	$idfavoris = unserialize($_COOKIE["favoris"]);
	$test = implode(", ", $idfavoris);

	$sql = "SELECT * FROM article WHERE id IN($test)";
	$requete = $connect->prepare($sql);
	$requete->execute();
	$articlefavoris=$requete->fetchAll(PDO::FETCH_CLASS, "article");
};

// var_dump($_COOKIE);
// var_dump($_COOKIE["favoris"]);
// var_dump(unserialize($_COOKIE["favoris"]));
// var_dump($articlefavoris);
