<?php

// require_once "IRender.php";

namespace model;
use model\IRender;

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
        return sprintf('<div class="form-check form-check-inline"><label for="%s" class="form-check-label">%s</label><input name="%s[]" id="%s" value="%s" %s', $this->id, $this->label, $this->name, $this->id, $this->value, $estDisable ? "disabled" : "");
    }
}