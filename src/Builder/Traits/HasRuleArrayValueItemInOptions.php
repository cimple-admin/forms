<?php

namespace CimpleAdmin\Forms\Builder\Traits;

use Illuminate\Validation\Rule;

trait HasRuleArrayValueItemInOptions
{
    public function itemInOption(): static
    {
        $this->rules['value.*'][] = Rule::in(array_keys($this->options));

        return $this;
    }
}
