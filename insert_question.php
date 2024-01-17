<?php

require_once("./constante.php");

if (isset($_GET['intitule']) && isset($_GET['theme'])) {
    $intitule = $_GET['intitule'];
    $theme = $_GET['theme'];

    $file_db->query("INSERT INTO questionnaire (intitule, idTheme) VALUES ('" . $intitule . "', " . $theme . ")");


    $idQ = "";
    $intituleQuestion = "";
    $idType = "";
    $idR = "";
    $intituleReponse = "";
    $estBonne = "";

    foreach ($_GET as $key => $value) {
        $key_explode = explode("_", $key);
        if ($key_explode[0] == "question") {
            $idQ = $key_explode[1];
            $intituleQuestion = $value;
        } else if ($key_explode[0] == "type") {
            $idType = $value;
            $file_db->query("INSERT INTO question (idQ, idType, intituleQuestion, intitule) VALUES (" . $idQ . ", " . $idType . ", '" . $intituleQuestion . "', '" . $intitule . "')");
        } else if ($key_explode[0] == "reponse") {
            $idR = $key_explode[1];
            $intituleReponse = $value;
            $file_db->query("INSERT INTO choix (NomChoix, idQ, reponse, intitule) VALUES ('" . $intituleReponse . "', " . $idQ . ", 0, '" . $intitule . "')");
        } else if ($key_explode[0] == "estBonne") {
            $estBonne = $value;
            $file_db->query("UPDATE choix SET reponse = 1 WHERE NomChoix = '" . $intituleReponse . "' AND idQ = " . $idQ);
        }
        echo "<br>";
    }
    header("Location: ./index.php");
}