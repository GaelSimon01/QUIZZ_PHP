<?php

// namespace model;

require_once("IRender.php");

class Input implements IRender
{
    private $name;
    private $id;
    private $label;
    private $value;

    protected function __construct(string $name, string $id, string $label, string $value)
    {
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
    }
    public function render($estDisable): string
    {
        return sprintf('<label for="%s">%s</label><input name="%s" id="%s" value="%s" %s', $this->id, $this->label, $this->name, $this->id, $this->value, $estDisable ? "disabled" : "");
    }
}