<?php

namespace CimpleAdmin\Forms\Traits;

use CimpleAdmin\Forms\Builder\Component;
use CimpleAdmin\Forms\Components\Container;
use Illuminate\Validation\ValidationException;
use Livewire\Exceptions\PropertyNotFoundException;
use ReflectionException;
use ReflectionProperty;

trait HasFormTrait
{
    public bool $disableSubmitBtn = true;

    /**
     * 覆写 __get 方法，如果父方法能拿到数据，则采用父方法的
     * 如果 父方法拿不到，并且 property 是指定的字段值，则采用自有的方法.
     *
     * @throws PropertyNotFoundException
     */
    public function __get($property)
    {
        try {
            return parent::__get($property);
        } catch (PropertyNotFoundException $e) {
            if ($property == 'form') {
                return Container::make($this);
            }
            throw $e;
        }
    }

    /**
     * 更新事件，这里主要是为了同步调用验证，这个验证，主要是为了透传出来的变量验证
     * 不过这里等于验证了两次，可以考虑把这边优化一下.
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
            $allRules = $this->rules();
            if ($allRules) {
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
                    throw $e;
                }
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
            $componentRules = $component->getRules();
            foreach ($componentRules as $index => $componentRule) {
                $rules[str_replace('value', $component->getProperty(), $index)]
                    = $componentRule;
            }
        }

        return $rules;
    }

    /**
     * 这里使用是为了处理初始化的时候就验证一下把初始值的错误信息显示出来。
     * 如果自己将来在组件中需要自己实现一份 mount 方法，且需要初始化就验证错误的时候就可以吧这方法复制一份，然后在实现自己的逻辑.
     *
     * @return void
     *
     * @throws ReflectionException
     */
    public function mount(): void
    {
        if ($allRules = $this->rules()) {
            $needValidateRules = [];
            foreach ($allRules as $key => $rule) {
                $rp = new ReflectionProperty(get_class($this), $key);
                if ($rp->isInitialized($this) && $this->$key) {
                    $needValidateRules[$key] = $rule;
                }
            }
            if ($needValidateRules) {
                $this->validate($needValidateRules);
            }
        }
    }

    abstract public function getForm(): array;
}
