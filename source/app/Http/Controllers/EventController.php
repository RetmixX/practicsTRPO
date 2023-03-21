<?php

namespace App\Http\Controllers;

use Domain\Event\Action\CreateEventAction;
use Domain\Event\Action\UpdateEventAction;
use Domain\Event\DTO\EventDTO;
use Domain\Event\DTO\UpdateEventDTO;
use Domain\Event\Enums\EventEnum;
use Domain\Event\Models\Event;
use Domain\Event\ViewModels\SearchEventViewModel;
use Domain\Shared\ViewModels\CRUD\CreateObjectViewModel;
use Domain\Shared\ViewModels\CRUD\IndexObjectsViewModel;
use Domain\Shared\ViewModels\CRUD\RetrieveObjectViewModel;
use Domain\Shared\ViewModels\CRUD\UpdateObjectViewModel;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): IndexObjectsViewModel
    {
        return new IndexObjectsViewModel(new Event());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventDTO $data)
    {
        return new CreateObjectViewModel(CreateEventAction::execute($data), EventEnum::Create->value);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): RetrieveObjectViewModel
    {
        return new RetrieveObjectViewModel($event);
    }

    public function searchEvent(): SearchEventViewModel
    {
        return new SearchEventViewModel();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Event $event, UpdateEventDTO $data)
    {
        return new UpdateObjectViewModel(UpdateEventAction::execute($event, $data), EventEnum::Update->value);
    }
}
