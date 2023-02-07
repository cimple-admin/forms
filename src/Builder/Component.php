<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Traits\Validation;

abstract class Component
{
    use Validation;

    const COMPONENT_NAME = '';

    protected string $property;
    protected string $label;
    protected string $hint;
    protected string|array|bool $value;
    protected bool $hiddenLabel = false;

    protected bool $inline = false;
    protected int $inlineLabelWidth = 2;

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

    public function inline(): static
    {
        $this->inline = true;

        return $this;
    }

    /**
     * 单行表单设置label 宽度，最大支持数值支持10，保证输入区有位置.
     *
     * @param $width
     * @return $this
     */
    public function inlineLabelWidth($width): static
    {
        if ($width > 10) {
            $width = 10;
        } else {
            if ($width < 1) {
                $width = 1;
            }
        }
        $this->inlineLabelWidth = $width;

        return $this;
    }

    public function build(): array
    {
        return [
            'rules' => $this->rules,
            'property' => $this->property,
            'label' => $this->label,
            'hint' => $this->hint ?? '',
            'value' => $this->value ?? '',
            'hiddenLabel' => $this->hiddenLabel,
            'inline' => $this->inline,
            'inlineLabelWidth' => $this->inlineLabelWidth,
        ];
    }
}
