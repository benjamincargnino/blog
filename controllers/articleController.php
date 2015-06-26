<?php

if(empty($_GET["id"]) == true)
{
	header("Location: index.php");
	die();
} 

$idarticle = $_GET["id"];
$sql = "SELECT * FROM article WHERE id=$idarticle";
$requete = $connect->prepare($sql);
$requete->execute();
$readmore=$requete->fetch();

if(empty($readmore) == true) 
{
	header($_SERVER["SERVER_PROTOCOL"]." 404 not found");
	include "vues/404.phtml";
	die();
};

$error=[];

if (empty($_POST) == false) 
{ 
	if(empty($_POST["auteur"]))
	{
		array_push($error, "Veuillez entrer un nom d'auteur");
	} 

	if(empty($_POST["score"])) 
	{
		array_push($error, "Veuillez noter cet article");
	}  else if(empty($_POST['score']) == false && ($_POST['score'] < "0" || $_POST["score"] > "5"))
			{
				array_push($errors, "Veuillez choisir une note valide");
			}


	if(empty($_POST["contenu"])) 
	{
		array_push($error, "Veuillez entrer du contenu dans votre commentaire");
	}

	if(empty($error))

	{
		$sql = "INSERT INTO `commentaire`(`auteur`, `note`, `contenu`, `date_commentaire`, `id_article`)
		VALUES (:auteur, :note, :contenu, NOW(), $idarticle)";
		$requete = $connect->prepare($sql);
		$requete->bindvalue(":auteur", $_POST["auteur"]);
		$requete->bindvalue(":note", $_POST["score"]);
		$requete->bindvalue(":contenu", $_POST["contenu"]);
		$successCommentaire = $requete->execute();

	};
};


$sql = "SELECT * FROM commentaire WHERE id_article=$idarticle ORDER BY date_commentaire DESC";
$requete = $connect->prepare($sql);
$requete->execute();
$comment=$requete->fetchAll();