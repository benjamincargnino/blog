<?php
require_once __DIR__."/../model/categorieClass.php";

$sql = "SELECT * FROM categorie WHERE 1";
$requete = $connect->prepare($sql);
$requete->execute();
$categories=$requete->fetchAll(PDO::FETCH_CLASS, "categorie");
