<?php




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
            if ($question->get_answer() == $rep[$question->getId()])
                $score++;
        return $score;
    }
}