<?php

namespace Laravolt\UiComponent\Filters;

class StatusFilter extends CheckboxFilter
{
    protected string $label = 'Status';

    public function apply($data, $value)
    {
        $value = (array) $value;
        foreach ($value as $status) {
            if ($status) {
                $data->where('status', $value);
            }
        }

        return $data;
    }

    public function options(): array
    {
        return [
            'ACTIVE' => 'ACTIVE',
            'PENDING' => 'PENDING',
        ];
    }
}
