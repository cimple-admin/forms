<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TextInput extends BaseComponent
{
    public string $type = 'text'; // Input 类型
    public string $hint = '';

    public function render(): Factory|View|Application
    {
        return view('form::input');
    }
}
