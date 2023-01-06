<?php

namespace CimpleAdmin\Forms\Builder\Traits;

use Illuminate\Validation\Rule;

trait HasRuleArrayValueItemInArray
{
    public function itemInArray($options): static
    {
        $this->rules['value.*'][] = Rule::in($options);

        return $this;
    }
}
