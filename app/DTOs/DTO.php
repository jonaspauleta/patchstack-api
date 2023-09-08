<?php

namespace App\DTOs;

use Illuminate\Support\Str;
use ReflectionObject;
use ReflectionProperty;

class DTO
{
    /**
     * Transforms all public properties of the DTO to an array with snake_case keys.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $properties = (new ReflectionObject($this))->getProperties(filter: ReflectionProperty::IS_PUBLIC);

        return collect(value: $properties)
            ->map(callback: fn (ReflectionProperty $property) => $property->getName())
            ->filter(callback: fn (string $property) => ! ($this->{$property} instanceof None))
            ->mapWithKeys(callback: function (string $property) {
                $key = Str::snake(value: $property);

                return [$key => $this->{$property}];
            })->toArray();
    }
}
