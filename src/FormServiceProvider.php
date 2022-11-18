<?php

namespace CimpleAdmin\Forms;

use CimpleAdmin\Forms\Components\Input;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FormServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $response)
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form');
        Livewire::component('input', Input::class);
    }
}