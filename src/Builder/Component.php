<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Traits\Validation;

abstract class Component
{
    use Validation;

    const COMPONENT_NAME = '';

    protected string $property;
    protected string $label = '';
    protected string $hint = '';
    protected string|array|bool $value = '';
    protected bool $hiddenLabel = false;

    public function __construct($property)
    {
        $this->property = $property;
        $this->label = $property;
    }

    public static function make($property): static
    {
        return new static($property);
    }

    public function getProperty(): string
    {
        return $this->property;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function label($label): static
    {
        $this->label = $label;

        return $this;
    }

    public function hint($hint): static
    {
        $this->hint = $hint;

        return $this;
    }

    public function hiddenLabel(): static
    {
        $this->hiddenLabel = true;

        return $this;
    }

    abstract public function build();
}
