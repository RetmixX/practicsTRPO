<?php

namespace App\Http\Controllers;

use Domain\Group\Models\Group;
use Domain\Shared\ViewModels\CRUD\RetrieveObjectViewModel;
use Domain\Task\Actions\CreateTaskAction;
use Domain\Task\DTO\TaskDTO;
use Domain\Task\Models\Task;
use Domain\Task\ViewModels\IndexTaskViewModel;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Group $group)
    {
        return new IndexTaskViewModel($group);
    }

    public function searchTasks(Group $group)
    {
        return Task::where('group_id', $group->id)->filter()->get()->map->getData()->values();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Group $group, TaskDTO $data): JsonResponse
    {
        return \response()->json(new RetrieveObjectViewModel(CreateTaskAction::execute($group, $data)), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group, Task $task): RetrieveObjectViewModel
    {
        $this->authorize('view', [$task, $group]);
        return new RetrieveObjectViewModel($task);
    }
}
