<?php

namespace CimpleAdmin\Forms\Components;

class Radio extends BaseComponent
{
    public array $options = [];
    protected string $viewName = 'form::radio';

    protected function validationAttributes(): array
    {
        $attributes = parent::validationAttributes();
        $attributes['value.*'] = $this->label;

        return $attributes;
    }
}
