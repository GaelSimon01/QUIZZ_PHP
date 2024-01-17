<?php
require_once("./class/LoadJSON.php");
require_once("./class/Questionnaire.php");
$jsonLoader = new LoadJSON("./data/model.json");

$questionnaire = new Questionnaire($jsonLoader->getQuestions());