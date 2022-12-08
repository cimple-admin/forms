<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TextArea extends BaseComponent
{
    public string $hint = '';
    public int $rows = 4;

    public function render(): Factory|View|Application
    {
        return view('form::textarea');
    }
}
