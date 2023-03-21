<?php

namespace Domain\Event\Action;

use Domain\Event\DTO\EventDTO;
use Domain\Event\Models\Event;

class CreateEventAction
{
    public static function execute(EventDTO $data): EventDTO
    {
        return EventDTO::from(Event::create($data->all()));
    }
}
