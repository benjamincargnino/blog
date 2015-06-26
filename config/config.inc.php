<?php
//////////////////////////////////////////////////////////////////////// BLOC DE CODE LIAISON PHP ET MYSQL
$datasource = "mysql:host=localhost;dbname=blog;charset=utf8";
$login ="root";
$mdp ="troiswa";
$connect = new PDO($datasource, $login, $mdp);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
///////////////////////////////////////////////////////////////////////

define("root", str_replace("index.php","", $_SERVER["SCRIPT_NAME"]));
define("root_css", root."vues/css/");
define("root_js", root."vues/js/");
