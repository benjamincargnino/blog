<?php

$sql = "SELECT * FROM article ORDER BY date_article DESC";
$requete = $connect->prepare($sql);
$requete->execute();
$article=$requete->fetchAll();