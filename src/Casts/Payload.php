<?php

namespace Anam\DevelopmentKit\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Payload implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        $payload = json_decode($value);
        $command = unserialize($payload->data->command);
        $payload->data->command = $command;
        return $payload;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param string $value
     * @param array $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }
}
