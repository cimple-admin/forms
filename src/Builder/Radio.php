<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Builder\Traits\HasOptions;
use CimpleAdmin\Forms\Builder\Traits\HasRuleSingleValueItemInArray;
use CimpleAdmin\Forms\Builder\Traits\HasRuleSingleValueItemInOptions;

class Radio extends Component
{
    use HasOptions;
    use HasRuleSingleValueItemInArray;
    use HasRuleSingleValueItemInOptions;

    const COMPONENT_NAME = 'radio';

    public function build(): array
    {
        $params = parent::build();
        $params['options'] = $this->options;

        return $params;
    }
}
