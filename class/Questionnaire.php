<?php
    require_once("./class/Question.php");

    class Questionnaire
    {
        private $questions;

        public function __construct($array)
        {
            $this->questions = array();
            foreach ($array as $question)
                array_push($this->questions, $question);
        }

        public function getQuestions()
        {
            return $this->questions;
        }

        public function get_score($rep)
        {
            $score = 0;
            foreach ($this->questions as $question)
                if ($question->getAnswer() == $rep[$question->getId()])
                    $score++;
            return $score;
        }
    }