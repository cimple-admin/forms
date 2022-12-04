<?php

namespace CimpleAdmin\Forms\Components;

class Checkbox extends BaseComponent
{
    public array $options = [];
    public string $type = 'checkbox';

    protected function validationAttributes(): array
    {
        $attributes = parent::validationAttributes();
        $attributes['value.*'] = $this->label;

        return $attributes;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('form::checkbox');
    }
}
