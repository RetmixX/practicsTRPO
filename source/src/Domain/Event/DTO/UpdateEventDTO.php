<?php

namespace Domain\Event\DTO;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateEventDTO extends Data
{
    public function __construct(
        public readonly Optional|string $name,
        public readonly Optional|string $description,
        public readonly Optional|string $date,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => 'string|min:1|max:100',
            'description' => 'string|min:1|max:1000',
            'date' => 'date_format:Y-m-d H:i',
        ];
    }

}
