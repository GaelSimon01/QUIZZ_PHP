<?php
require_once("./ChargerQuestionnaire.php");
require_once("./constante.php");

$test = new ChargerQuestionnaire("qtest",$file_db);
foreach($test->getQuestions() as $q){
    echo $q['intitule'];
}

?>