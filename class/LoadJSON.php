<?php
    require_once("./class/Question.php");
    require_once("./constante.php");
    class LoadJSON
    {
        private $json;
        private $questions;

        public function __construct($path)
        {
            $this->json = file_get_contents($path);
            $this->json = json_decode($this->json, true);
            $this->questions = array();
            if (is_array($this->json)) {
                foreach ($this->json as $question) {
                    $this->questions[$question["uuid"]] = new Question($question);
                }
            }
        }

        public function getQuestions()
        {
            return $this->questions;
        }
    }