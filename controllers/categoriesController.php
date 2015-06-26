<?php

$sql = "SELECT * FROM categorie WHERE 1";
$requete = $connect->prepare($sql);
$requete->execute();
$categories=$requete->fetchAll();
