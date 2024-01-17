<?php

namespace model;

class InputCheckBox extends Input
{
    public function __construct(string $name, string $id, string $label, string $value)
    {
        parent::__construct($name, $id, $label, $value);
    }
    public function render($estDisable): string
    {
        return sprintf('%s type="checkbox" />', parent::render($estDisable));
    }
}