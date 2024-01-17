<?php

require_once("constante.php");

if (isset($_GET['score']) && isset($_GET['prenom']) && isset($_GET['quizz'])) {
    $score = $_GET['score'];
    $nom = $_GET['prenom'];
    $intitule = $_GET['quizz'];

    $file_db->exec("INSERT INTO score (nomJoueur, point, intitule) VALUES ('".$nom."', ".$score.", '".$intitule."')");
    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
