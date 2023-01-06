<?php

namespace CimpleAdmin\Forms\Builder;

class TextArea extends Component
{
    const COMPONENT_NAME = 'textarea';
    private int $rows = 4;

    /**
     * 设置行数.
     *
     * @param $rows
     * @return $this
     */
    public function rows($rows): static
    {
        $this->rows = $rows;

        return $this;
    }

    public function build(): array
    {
        $params = parent::build();
        $params['rows'] = $this->rows;

        return $params;
    }
}
