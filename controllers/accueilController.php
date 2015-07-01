<?php
require_once __DIR__."/../model/articleClass.php";

$sql = "SELECT * FROM article ORDER BY date_article DESC";
$requete = $connect->prepare($sql);
$requete->execute();
$article=$requete->fetchAll(PDO::FETCH_CLASS, "article");