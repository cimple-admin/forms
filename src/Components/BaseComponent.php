<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BaseComponent extends Component
{
    public string $customRules = '';
    public string $property = '';
    public string $label = ''; // Input 表单名称
    public string|array|bool $value = ''; // Input 的输入值
    public bool $hiddenLabel = false;

    protected string $viewName = '';

    public static function make(): static
    {
        return new static();
    }

    public function mount($rules = [])
    {
        $this->customRules = serialize($rules);
    }

    public function updated($propertyName)
    {
        if ($this->property) {
            $this->emitUp('updateEvent', $this->property, $this->value);
        }
        $this->validateOnly($propertyName);
        $this->validateOnly($propertyName.'.*');
    }

    protected function validationAttributes(): array
    {
        return ['value' => $this->label];
    }

    public function rules(): array
    {
        $rules = ['value' => []];
        if ($this->customRules && unserialize($this->customRules)) {
            $rules = unserialize($this->customRules);
        }

        return $rules;
    }

    public function render(): Factory|View|Application
    {
        return view($this->viewName);
    }
}
