<?php

// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=immobilier','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// variable globale
$content = "";
$error = '';


define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/php/evaluation/');
define("URL", "http://" . $_SERVER['HTTP_HOST'] . "/php/evaluation/");

?>