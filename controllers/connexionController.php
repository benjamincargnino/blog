<?php 

	$error=[];

if (empty($_POST) == false) 
{ 
	if(empty($_POST["login"]) == true)
	{
		array_push($error, "Veuillez entrer un email");

	} elseif(filter_var($_POST["login"], FILTER_VALIDATE_EMAIL) == false)

	{
		array_push($error, "Veuillez entrer une adresse email valide");
	}

	if(empty($_POST["password"]) == true) 
	{
		array_push($error, "Veuillez entrer un mot de passe");
	} 

	if(empty($error)) 
	{
		$sql = "SELECT * FROM utilisateur WHERE email= :mail AND password = :mdp";
		$requete = $connect->prepare($sql);
		$requete->bindValue(":mail", $_POST["login"]);
		$requete->bindValue(":mdp", sha1($_POST["password"]));
		$requete->execute();
		$user=$requete->fetch();
		if(empty($user) == false)
			{
				$_SESSION["logged"] = $user;
				header("Location:index.php");
				die();
			}
	}
};
