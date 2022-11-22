<?php

namespace CimpleAdmin\Forms\Traits;

use CimpleAdmin\Forms\Builder\Component;
use CimpleAdmin\Forms\Components\Container;
use Livewire\Exceptions\PropertyNotFoundException;

trait HasFormTrait
{
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
            $this->validateOnly($name);
        }
    }

    protected function getListeners(): array
    {
        return ['updateEvent' => 'updateEvent'];
    }

    public function rules()
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
