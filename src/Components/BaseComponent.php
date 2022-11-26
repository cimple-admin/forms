<?php

namespace CimpleAdmin\Forms\Components;

use Livewire\Component;

class BaseComponent extends Component
{
    public string $customRules = '';
    public string $property = '';
    public string $label = ''; // Input 表单名称
    public string|array $value = ''; // Input 的输入值

    public static function make(): static
    {
        return new static();
    }

    public function updated($propertyName)
    {
        if ($this->property) {
            $this->emitUp('updateEvent', $this->property, $this->value);
        }
        $this->validateOnly($propertyName);
    }

    protected function validationAttributes(): array
    {
        return ['value' => $this->label];
    }

    public function rules(): array
    {
        $rules = [];
        if ($this->customRules) {
            $rules = unserialize($this->customRules);
        }

        return $rules;
    }
}
