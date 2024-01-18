<?php

require_once("./constante.php");

if (isset($_GET['score']) && isset($_GET['prenom']) && isset($_GET['quizz'])) {
    $score = $_GET['score'];
    $nom = $_GET['prenom'];
    $intitule = $_GET['quizz'];

    if (count($file_db->query("SELECT * FROM score WHERE nomJoueur='".$nom."' AND intitule='".$intitule."'")->fetchAll()) != 0)
        $file_db->exec("UPDATE score SET point=".$score." WHERE nomJoueur='".$nom."' AND intitule='".$intitule."'");
    else
        $file_db->exec("INSERT INTO score (nomJoueur, point, intitule) VALUES ('".$nom."', ".$score.", '".$intitule."')");
    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
