<?php
require_once("./constante.php");

$file_db->query("insert into themes values (1,'musique');");
$file_db->query("insert into questionnaire values ('qtest',1);");
$file_db->query("insert into typeQuestion values (1,'checkbox');");
$file_db->query("insert into question values (1,2,'test','qtest');");

?>