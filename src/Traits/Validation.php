<?php

namespace CimpleAdmin\Forms\Traits;

trait Validation
{
    protected array $rules = [];

    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * 必须输入数据.
     *
     * @return $this
     */
    public function required(): static
    {
        $this->rules['value'][] = 'required';

        return $this;
    }

    /**
     * 输入的值，必须是 1  true on 这些值
     *
     * @return $this
     */
    public function accept(): static
    {
        $this->rules['value'][] = 'accepted';

        return $this;
    }

    /**
     * 必须是合法url.
     *
     * @return $this
     */
    public function activeUrl(): static
    {
        $this->rules['value'][] = 'active_url';

        return $this;
    }

    /**
     * 邮箱格式.
     *
     * @param  string  $validator
     * @return $this
     */
    public function email(string $validator = 'rfc'): static
    {
        $this->rules['value'][] = 'email:'.$validator;

        return $this;
    }

    /**
     * 必须是字母.
     *
     * @return $this
     */
    public function alpha(): static
    {
        $this->rules['value'][] = 'alpha';

        return $this;
    }

    public function alphaDash(): static
    {
        $this->rules['value'][] = 'alpha_dash';

        return $this;
    }

    /**
     * 限定 size， 字符串，数字，字母都有不同的方案.
     *
     * @param  int  $size
     * @return $this
     */
    public function size(int $size): static
    {
        $this->rules['value'][] = 'size:'.$size;

        return $this;
    }

    /**
     * 自己输入规则，主要是弥补封装不全问题，比如不常用的就不会封装进去，自己通过这个方法补充即可.
     *
     * @param  array  $rules
     * @return $this
     */
    public function rules(array $rules = []): static
    {
        $this->rules['value'] = array_merge($this->rules['value'] ?? [], $rules);

        return $this;
    }
}
