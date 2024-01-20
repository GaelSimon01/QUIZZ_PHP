<?php

namespace model;

// require_once("InputRadio.php");
// require_once("InputCheckBox.php");

class Question
{
    private $idQ;
    private $idType;
    private $intitule;
    private $intituleQuestion;
    private $file_db;

    private $choix;

    public function __construct($file_db,$idQ,$idType,$intitule,$intituleQuestion)
    {
        $this->idQ = $idQ;
        $this->idType = $idType;
        $this->intitule = $intitule;
        $this->intituleQuestion = $intituleQuestion;
        $this->file_db = $file_db;
        $this->choix = $this->file_db->query("select * from choix where idQ=".$this->idQ." and intitule='".$intitule."'")->fetchAll();
    }

    public function getId()
    {
        return $this->idQ;
    }

    public function getIntitule()
    {
        return $this->intituleQuestion;
    }

    public function get_choix(){
        $this->file_db->query("select * from choix where idQ=".$this->idQ);
    }

    public function get_answer(){
        return $this->file_db->query("select * from choix where idQ=".$this->idQ." and reponse=1 and intitule='".$this->intitule."'")->fetchAll();
    }

    public function render($estDisable = false)
    {
        if (count($this->get_answer()) == 1) {
            $res = "<fieldset><legend>" . $this->intituleQuestion . "</legend>";
            foreach ($this->choix as $id => $choice)
                $res .= (new InputRadio($this->idQ, $this->intitule.$choice['NomChoix'], $choice['NomChoix'], $choice['NomChoix']))->render($estDisable);
            return $res."</fieldset>";
        }
        if (count($this->get_answer()) > 1) {
            $res = "<fieldset><legend>" . $this->intituleQuestion . "</legend>";
            foreach ($this->choix as $id => $choice)
                $res .= (new InputCheckBox($this->idQ, $this->intitule.$choice['NomChoix'], $choice['NomChoix'], $choice['NomChoix']))->render($estDisable);
            return $res."</fieldset>";
        }
    }

    public function getResult($reponses) {
        if ($reponses == null)
            return "";
        $a_bon = true;
        $answer = [];
        foreach ($this->get_answer() as $ans)
            array_push($answer, array_shift($ans));
        foreach ($answer as $ans) {
            if (!in_array($ans, $reponses))
                $a_bon = false;
        }

        if ($a_bon)
            return "<span style='color:green'>Bonne réponse</span><br>";
        else
            return "<span style='color:red'>Mauvaise réponse</span><br>";
    }

}