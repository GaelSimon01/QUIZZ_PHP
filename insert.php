<?php

require_once("./constante.php");

$file_db->query("INSERT INTO choix (NomChoix, idQ, reponse) VALUES ('choix1', 1, 0)");
$file_db->query("INSERT INTO choix (NomChoix, idQ, reponse) VALUES ('choix2', 1, 1)");