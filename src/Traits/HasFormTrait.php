<?php

namespace CimpleAdmin\Forms\Traits;

use CimpleAdmin\Forms\Components\Container;
use Livewire\Exceptions\PropertyNotFoundException;
use Livewire\Livewire;

trait HasFormTrait
{
    public function __get($property)
    {
        try {
            return parent::__get($property);
        } catch (PropertyNotFoundException $e) {
            return Container::make($this->getForm());
        }
    }

    public function updateEvent($name, $value): void
    {
        if (property_exists($this, $name) ) {
            $this->$name = $value;
        }
    }

    protected function getListeners(): array
    {
        return ['updateEvent' => 'updateEvent'];
    }

    abstract  public function getForm();
}