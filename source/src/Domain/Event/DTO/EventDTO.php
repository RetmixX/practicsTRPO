<?php

namespace Domain\Event\DTO;

use Carbon\Carbon;
use Domain\Event\Models\Event;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

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


}
