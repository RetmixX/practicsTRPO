<?php

namespace Domain\Event\ViewModels;

use Domain\Event\DTO\EventDTO;
use Domain\Event\Models\Event;
use Domain\Shared\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class AllEventsViewModel extends ViewModel
{
    public function events(): Collection
    {
        return Event::all()->map(fn(Event $event) => EventDTO::from($event));
    }
}
