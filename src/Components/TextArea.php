<?php

namespace CimpleAdmin\Forms\Components;

class TextArea extends BaseComponent
{
    public string $hint = '';
    public int $rows = 4;
    protected string $viewName = 'form::textarea';
}
