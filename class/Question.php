<?php

require_once("./class/InputCheckBox.php");
require_once("./class/InputRadio.php");

class Question
{
    private $id;
    private $type;
    private $label;
    private $answer;
    private $choices;

    public function __construct($json)
    {
        $this->id = $json["uuid"];
        $this->type = $json["type"];
        $this->label = $json["label"];
        $this->choices = array($json["choices"]);
        $this->answer = $json["correct"];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function render($estDisable = false)
    {
        $res = "<fieldset><legend>" . $this->label . "</legend>";
        foreach ($this->choices[0] as $choice)
            $res .= (new InputRadio($this->id, $this->label.$choice, $choice, $choice))->render($estDisable);
        return $res."</fieldset>";
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