<?php

if(empty($_SESSION["logged"]) == true)
{
	header("Location:index.php?page=connexion");
	die();
};

$sql = "SELECT * FROM categorie WHERE 1";
$requete = $connect->prepare($sql);
$requete->execute();
$categories=$requete->fetchAll();

////////////////////////////////////////////// TEST ERRORS /////////////////////////////////////////////////////

$error=[];

if (empty($_POST) == false) 
{ 
	if(empty($_POST["titre"]))
	{
		array_push($error, "Veuillez entrer un titre");
	} 

	if(empty($_POST["description"])) 
	{
		array_push($error, "Veuillez entrer une description");
	}  

	if(empty($_POST["auteur"])) 
	{
		array_push($error, "Veuillez entrer un nom d'auteur");
	}
	if (empty($_FILES['image']) == true || $_FILES['image']['error'] > 0)
	{
		array_push($error, "Veuillez sélectionner une image");
	} else {
		$extensionValides = ["jpg", "jpeg", "png"];
		$extensionImage = str_replace("image/", "", $_FILES['image']['type']);
	}

	if(in_array($extensionImage, $extensionValides) == false)
	{
		array_push($error, "Veuillez sélectionner une image valide");
	}

	if(empty($_POST["categories"]))
	{
		array_push($error, "Veuillez sélectionner une catégorie");
	} 

	if(empty($error) == true)

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		$nomImage = uniqid(). "." . $extensionImage;
		$resultatUpload = move_uploaded_file($_FILES["image"]["tmp_name"], "vues/images/" . $nomImage);

		if($resultatUpload == true) {
			$sql = "INSERT INTO `article`(`titre`, `description`, `date_article`, `auteur`, `image`, `id_categorie`)
			VALUES (:titre, :description, NOW(), :auteur, :image, :idcat)";
			$requete = $connect->prepare($sql);
			$requete->bindvalue(":titre", $_POST["titre"]);
			$requete->bindvalue(":description", $_POST["description"]);
			$requete->bindvalue(":auteur", $_POST["auteur"]);
			$requete->bindvalue(":image", $nomImage);
			$requete->bindvalue(":idcat", $_POST["categories"]);
			$ajouterArticle = $requete->execute();
		};
	};
};