<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Select extends BaseComponent
{
    public array $options = [];
    protected string $viewName = 'form::select';
}
