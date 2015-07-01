<?php

require_once __DIR__."/../model/categorieClass.php";
require_once __DIR__."/../model/articleClass.php";

$idarticle = $_GET["id"];
$sql = "SELECT * FROM categorie WHERE id= :protectid";
$requete = $connect->prepare($sql);
$requete->bindValue(":protectid", $idarticle);
$requete->execute();
$requete->setFetchMode(PDO::FETCH_CLASS, "categorie");
$unecategorie=$requete->fetch(PDO::FETCH_CLASS);


$sql = "SELECT * FROM article WHERE id_categorie= :protectid";
$requete = $connect->prepare($sql);
$requete->bindValue(":protectid", $idarticle);
$requete->execute();
$articlescategorie=$requete->fetchAll(PDO::FETCH_CLASS, "article");