<?php

namespace CimpleAdmin\Forms\Builder;

class TextArea extends Component
{
    const COMPONENT_NAME = 'textarea';
    private int $rows = 4;

    /**
     * 设置行数
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
        return [
            'rules' => $this->rules,
            'property' => $this->property,
            'label' => $this->label,
            'value' => $this->value,
            'hiddenLabel' => $this->hiddenLabel,
            'rows' => $this->rows,
        ];
    }
}
