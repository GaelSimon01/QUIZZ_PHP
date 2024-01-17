<?php

require_once("Input.php");

class InputRadio extends Input
{
    public function __construct(string $name, string $id, string $label, string $value)
    {
        parent::__construct($name, $id, $label, $value);
    }
    public function render($estDisable): string
    {
        return sprintf('%s type="radio" class="form-check-input" /></div>', parent::render($estDisable));
    }
}