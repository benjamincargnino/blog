<?php


$idarticle = $_GET["id"];
$sql = "SELECT * FROM categorie WHERE id= :protectid";
$requete = $connect->prepare($sql);
$requete->bindValue(":protectid", $idarticle);
$requete->execute();
$unecategorie=$requete->fetch();


$sql = "SELECT * FROM article WHERE id_categorie= :protectid";
$requete = $connect->prepare($sql);
$requete->bindValue(":protectid", $idarticle);
$requete->execute();
$articlescategorie=$requete->fetchAll();