<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Input2 extends Component
{
    public $message;
    public $type;
    public $label;
    public $name;

    public $customRules;
    public function mount($type, $name, $label, $rules)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->customRules = serialize($rules);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'message' => unserialize($this->customRules),
        ];
    }

    public static function make(): static
    {
        return new Static;
    }

    public function render()
    {
        return view('form::input');
    }
}