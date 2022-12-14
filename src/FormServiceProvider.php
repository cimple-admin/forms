<?php

namespace CimpleAdmin\Forms;

use CimpleAdmin\Forms\Components\Checkbox;
use CimpleAdmin\Forms\Components\PasswordInput;
use CimpleAdmin\Forms\Components\Radio;
use CimpleAdmin\Forms\Components\Select;
use CimpleAdmin\Forms\Components\SelectMulti;
use CimpleAdmin\Forms\Components\TextArea;
use CimpleAdmin\Forms\Components\TextInput;
use CimpleAdmin\Forms\Components\WangEditor;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FormServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $response)
    {
        // 加载视图文件
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form');
        // 发布文件
        $this->publishes([
            __DIR__.'/../dist/assets' => public_path('vendor/forms'),
        ], ['cimple-form', 'cimple-form-assets']);
        $this->publishes([
            __DIR__.'/../resources/views/layouts' => resource_path('/views/layouts'),
        ], ['cimple-form', 'cimple-form-layouts']);
        // 这里声明的只是 components 不是 builder 别搞混了
        Livewire::component('input-text', TextInput::class);
        Livewire::component('input-password', PasswordInput::class);
        Livewire::component('checkbox', Checkbox::class);
        Livewire::component('radio', Radio::class);
        Livewire::component('textarea', TextArea::class);
        Livewire::component('select-multi', SelectMulti::class);
        Livewire::component('select', Select::class);
        Livewire::component('wang-editor', WangEditor::class);
    }
}
