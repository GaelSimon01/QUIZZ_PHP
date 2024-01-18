<?php


namespace model;

class Questionnaire
{
    private $libelle;
    private $theme;
    private $questions;

    public function __construct($libelle, $theme, $array)
    {
        $this->libelle = $libelle;
        $this->theme = $theme;
        $this->questions = array();
        foreach ($array as $question)
            array_push($this->questions, $question);
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function get_score($rep)
    {
        $score = 0;
        foreach ($this->questions as $question)
            $a_bon = true;
            $answer = [];
            foreach ($question->get_answer() as $ans)
                array_push($answer, array_shift($ans));
            foreach ($answer as $ans) {
                if (!in_array($ans, $rep[$question->getId()]))
                    $a_bon = false;
            }
            if ($a_bon)
                $score++;
        return $score;
    }
}