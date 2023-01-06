<?php

namespace CimpleAdmin\Forms\Components;

class TextArea extends BaseComponent
{
    public int $rows = 4;
    public string $placeHolder;
    protected string $viewName = 'form::textarea';
}
