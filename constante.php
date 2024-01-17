<?php
require_once("./class/LoadJSON.php");
require_once("./class/Questionnaire.php");

date_default_timezone_set('Europe/Paris');

try {
    $file_db = new PDO('sqlite:./Quizz_bd');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {
    echo $th->getMessage();
}


$themes = $file_db->query('SELECT * FROM themes')->fetchAll();
$questionnaires = $file_db->query('SELECT * FROM questionnaire')->fetchAll();
$questionnaires_object = [];

foreach ($questionnaires as $id => $questionnaire) {
    $questionnaires[$questionnaire['intitule']] = new Questionnaire($questionnaire['intitule'], $questionnaire['idTheme'], $questionnaire['nbQuestions']);
    unset($questionnaires[$id]);
}