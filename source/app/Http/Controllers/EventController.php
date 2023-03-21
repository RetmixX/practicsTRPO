<?php

namespace App\Http\Controllers;

use Domain\Event\DTO\EventDTO;
use Domain\Event\Models\Event;
use Domain\Event\ViewModels\AllEventsViewModel;
use Domain\Shared\ViewModels\RetrieveObjectViewModel;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AllEventsViewModel
    {
        return new AllEventsViewModel();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return new RetrieveObjectViewModel($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
