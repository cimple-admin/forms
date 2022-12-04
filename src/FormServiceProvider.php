<?php

namespace CimpleAdmin\Forms;

use CimpleAdmin\Forms\Components\Checkbox;
use CimpleAdmin\Forms\Components\PasswordInput;
use CimpleAdmin\Forms\Components\TextInput;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FormServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $response)
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form');
        // 这里声明的只是 components 不是 builder 别搞混了
        Livewire::component('input-text', TextInput::class);
        Livewire::component('input-password', PasswordInput::class);
        Livewire::component('checkbox', Checkbox::class);
    }
}
