<?php

namespace Domain\Event\Action;

use Domain\Event\DTO\EventDTO;
use Domain\Event\DTO\UpdateEventDTO;
use Domain\Event\Models\Event;

class UpdateEventAction
{
    public static function execute(Event $event, UpdateEventDTO $data): EventDTO
    {
        $event->update($data->all());

        return EventDTO::from($event);
    }
}
