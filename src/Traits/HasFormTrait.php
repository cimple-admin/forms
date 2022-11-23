<?php

namespace CimpleAdmin\Forms\Traits;

use CimpleAdmin\Forms\Builder\Component;
use CimpleAdmin\Forms\Components\Container;
use Illuminate\Validation\ValidationException;
use Livewire\Exceptions\PropertyNotFoundException;

trait HasFormTrait
{
    public bool $disableSubmitBtn = true;

    /**
     * 覆写 __get 方法，如果父方法能拿到数据，则采用父方法的
     * 如果 父方法拿不到，并且 property 是指定的字段值，则采用自有的方法
     *
     * @throws PropertyNotFoundException
     */
    public function __get($property)
    {
        try {
            return parent::__get($property);
        } catch (PropertyNotFoundException $e) {
            if ($property == 'form') {
                return Container::make($this->getForm());
            }
            throw $e;
        }
    }

    /**
     * 更新事件，这里主要是为了同步调用验证，这个验证，主要是为了透传出来的变量验证
     * 不过这里等于验证了两次，可以考虑把这边优化一下
     *
     * 这里也实现了一个自定义的按钮逻辑，如果所有的验证都过了，
     * 会使 $disableSubmitBtn 变量值为 false，
     * 否则 $disableSubmitBtn 为 true。这个变量可以在前端控制按钮是否可点击
     *
     * @param $name
     * @param $value
     * @return void
     */
    public function updateEvent($name, $value): void
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            try {
                $this->validateOnly($name);
            } catch (ValidationException $e) {
                $this->disableSubmitBtn = true;
                throw $e;
            }

            try {
                $this->validate();
            } catch (ValidationException $e) {
                $this->disableSubmitBtn = true;
            }

            $this->disableSubmitBtn = false;
        }
    }

    protected function getListeners(): array
    {
        return ['updateEvent' => 'updateEvent'];
    }

    /**
     * 获取组件验证条件，从构造的组件中返回.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];
        /**
         * @var Component $component
         */
        foreach ($this->getForm() as $component) {
            $rules[$component->getProperty()] = $component->getRules();
        }

        return $rules;
    }

    abstract public function getForm();
}
