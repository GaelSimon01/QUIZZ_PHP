<?php

// namespace model;

require_once("InputRadio.php");

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
        return $this->file_db->query("select * from choix where idQ=".$this->idQ." and reponse=1 and intitule='".$this->intitule."'")->fetchAll()[0]['NomChoix'];
    }

    public function render($estDisable = false)
    {
        $res = "<fieldset><legend>" . $this->intituleQuestion . "</legend>";
        foreach ($this->choix as $id => $choice)
            $res .= (new InputRadio($this->idQ, $this->intitule.$choice['NomChoix'], $choice['NomChoix'], $choice['NomChoix']))->render($estDisable);
        return $res."</fieldset>";
    }

    public function getResult($reponse) {
        if ($reponse == null)
            return "";
        if ($reponse == $this->get_answer())
            return "<span style='color:green'>Bonne réponse</span><br>";
        else
            return "<span style='color:red'>Mauvaise réponse</span>, la bonne réponse était " . "test";
    }

}