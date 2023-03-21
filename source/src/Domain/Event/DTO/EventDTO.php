<?php

namespace Domain\Event\DTO;

use Carbon\Carbon;
use Domain\Event\Models\Event;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class EventDTO extends Data
{
    public function __construct(
        public readonly Optional|int $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $date,
    ) {
    }

    public static function fromModel(Event $event): self
    {
        return self::from([
            'id' => $event->id,
            'name' => $event->name,
            'description' => $event->description,
            'date' => Carbon::create($event->date)->translatedFormat('d F Y H:i'),
        ]);
    }

    public static function rules(): array
    {
        return [
            'id'=>'prohibited',
            'name' => 'required|string|min:1|max:100',
            'description' => 'required|string|min:1|max:1000',
            'date' => 'required|date_format:Y-m-d H:i',
        ];
    }


}
