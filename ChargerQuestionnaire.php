<?php
include("./constante.php");
    
    class ChargerQuestionnaire
    {
        private $intitule;
        private $questions;
        private $file_db;

        public function __construct($intitule,$file_db)
        {
            $this->file_db=$file_db;
            $this->intitule=$intitule;
            $this->questions=$file_db->query("select * from questionnaire where intitule='".$intitule."'");
        }

        public function getQuestions()
        {
            return $this->questions;
        }

    }