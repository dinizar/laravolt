<?php

namespace Laravolt\SemanticForm\Elements;

use Illuminate\Support\Arr;

class CheckboxGroup extends Wrapper
{
    protected $value;

    protected $options;

    protected $attributes = [
        'class' => 'grouped fields',
    ];

    protected $controls = [];

    public function inline($inline = true)
    {
        if ($inline) {
            $this->setAttribute('class', 'inline fields');
        }

        return $this;
    }

    public function value($value)
    {
        $this->value = $value;

        return $this;
    }

    public function options($options)
    {
        $this->options = $options;
    }

    public function displayValue()
    {
        if (is_string($this->value)) {
            $option = Arr::get($this->options, $this->value);
            if (is_array($option) && isset($option['label'])) {
                return $option['label'];
            }

            return Arr::get($this->options, $this->value);
        }
    }

    public function attributes($attributes)
    {
        foreach ($this->controls as $control) {
            if ($control instanceof Checkbox) {
                if ($attributes instanceof \Closure) {
                    $attributes($control);
                } else {
                    $control->attributes($attributes);
                }
            }
        }

        return $this;
    }
}
