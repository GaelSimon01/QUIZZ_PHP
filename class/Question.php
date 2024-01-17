<?php

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
        $this->choix = $this->file_db->query("select * from choix where idQ=".$this->idQ);
    }

    public function getId()
    {
        return $this->idQ;
    }

    public function getIntitule()
    {
        return $this->intitule;
    }

    public function get_choix(){
        $this->file_db->query("select * from choix where idQ=".$this->idQ);
    }

    public function render()
    {
        
    }

    public function getResult($reponse) {
        if ($reponse == null)
            return "";
        if ($reponse == $this->answer)
            return "<span style='color:green'>Bonne réponse</span><br>";
        else
            return "<span style='color:red'>Mauvaise réponse</span>, la bonne réponse était " . $this->answer;
    }

}