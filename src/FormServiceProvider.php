<?php

namespace CimpleAdmin\Forms;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $response)
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form');
    }
}