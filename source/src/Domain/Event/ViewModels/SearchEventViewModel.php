<?php

namespace Domain\Event\ViewModels;

use Domain\Event\Models\Event;
use Domain\Shared\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class SearchEventViewModel extends ViewModel
{
    public function foundEvents(): Collection
    {
        return Event::filter()->get()->sortBy('date')->map->getData()->values();
    }
}
