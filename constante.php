<?php


include_once 'model/Autoloader.php';
model\AutoLoader::register();
use model\{Questionnaire, Question};

date_default_timezone_set('Europe/Paris');


$file_db = new PDO('sqlite:./data/Quizz_bd.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$themes = $file_db->query('SELECT * FROM themes')->fetchAll();
$questionnaires = $file_db->query('SELECT * FROM questionnaire');
$questionnaires_object = [];

foreach ($questionnaires as $questionnaire) {
    $questions = $file_db->query('SELECT * FROM question WHERE intitule = \'' . $questionnaire['intitule'] . '\'')->fetchAll();
    $questions_object = [];
    foreach ($questions as $question) {
        array_push($questions_object, new Question($file_db, $question['idQ'], $question['idType'], $questionnaire['intitule'], $question['intituleQuestion']));
    }
    array_push($questionnaires_object, new Questionnaire($questionnaire['intitule'], $questionnaire['idTheme'], $questions_object));
}

