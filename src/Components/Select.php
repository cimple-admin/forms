<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Select extends BaseComponent
{
    public array $options = [];

    public function render(): Factory|View|Application
    {
        return view('form::select');
    }
}
