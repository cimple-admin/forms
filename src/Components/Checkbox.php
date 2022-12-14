<?php

namespace CimpleAdmin\Forms\Components;

class Checkbox extends BaseComponent
{
    public array $options = [];
    public string $type = 'checkbox';
    protected string $viewName = 'form::checkbox';

    protected function validationAttributes(): array
    {
        $attributes = parent::validationAttributes();
        $attributes['value.*'] = $this->label;

        return $attributes;
    }
}
