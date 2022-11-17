<?php

namespace CimpleAdmin\Forms;

use CimpleAdmin\Forms\Components\Input2;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FormServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $response)
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form');
        Livewire::component('input2', Input2::class);
    }


}