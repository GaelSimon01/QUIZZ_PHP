<?php
require_once("./class/LoadJSON.php");
require_once("./class/Questionnaire.php");
$jsonLoader = new LoadJSON("./data/model.json");
$questionnaire = new Questionnaire($jsonLoader->getQuestions());

date_default_timezone_set('Europe/Paris');

try {
    $file_db = new PDO('sqlite:./Quizz_bd');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {
    echo $th->getMessage();
}