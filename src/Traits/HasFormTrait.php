<?php

namespace CimpleAdmin\Forms\Traits;

use CimpleAdmin\Forms\Builder\Component;
use CimpleAdmin\Forms\Components\Container;
use Illuminate\Validation\ValidationException;
use Livewire\Exceptions\PropertyNotFoundException;

trait HasFormTrait
{
    public bool $disableSubmitBtn = true;

    /**
     * @throws PropertyNotFoundException
     */
    public function __get($property)
    {
        try {
            return parent::__get($property);
        } catch (PropertyNotFoundException $e) {
            if ($property == 'form') {
                return Container::make($this->getForm());
            }
            throw $e;
        }
    }

    public function updateEvent($name, $value): void
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            try {
                $this->validateOnly($name);
            } catch (ValidationException $e) {
                $this->disableSubmitBtn = true;
                throw $e;
            }


            try {
                $this->validate();
            } catch (ValidationException $e) {
                $this->disableSubmitBtn = true;
            }

            $this->disableSubmitBtn = false;
        }
    }

    protected function getListeners(): array
    {
        return ['updateEvent' => 'updateEvent'];
    }

    /**
     * 获取组件验证条件，从构造的组件中返回
     * @return array
     */
    public function rules(): array
    {
        $rules = [];
        /**
         * @var Component $component
         */
        foreach ($this->getForm() as $component) {
            $rules[$component->getProperty()] = $component->getRules();
        }

        return $rules;
    }

    abstract public function getForm();
}
