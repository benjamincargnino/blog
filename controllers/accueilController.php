<?php

$sql = "SELECT * FROM article";
$requete = $connect->prepare($sql);
$requete->execute();
$article=$requete->fetchAll();