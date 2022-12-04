<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Radio extends BaseComponent
{
    public array $options = [];
    public string $type = 'checkbox';

    protected function validationAttributes(): array
    {
        $attributes = parent::validationAttributes();
        $attributes['value.*'] = $this->label;

        return $attributes;
    }

    public function render(): Factory|View|Application
    {
        return view('form::radio');
    }
}
