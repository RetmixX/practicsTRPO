<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Domain\Group\Actions\AddStudentToGroupAction;
use Domain\Group\Actions\CreateGroup\CreateGroup;
use Domain\Group\Actions\RemoveStudentFromGroupAction;
use Domain\Group\Actions\UpdateGroupAction;
use Domain\Group\DTO\GroupDTO;
use Domain\Group\DTO\GroupFileDTO;
use Domain\Group\DTO\UpdateGroupDTO;
use Domain\Group\Enums\GroupEnum;
use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Domain\Group\ViewModels\AddStudentToGroupViewModel;
use Domain\Group\ViewModels\RemoveStudentFromGroupViewModel;
use Domain\Group\ViewModels\RetrieveGroupViewModel;
use Domain\Shared\ViewModels\CRUD\CreateObjectViewModel;
use Domain\Shared\ViewModels\CRUD\IndexObjectsViewModel;
use Domain\Shared\ViewModels\CRUD\RetrieveObjectViewModel;
use Domain\Shared\ViewModels\CRUD\UpdateObjectViewModel;
use Illuminate\Http\JsonResponse;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): IndexObjectsViewModel
    {
        return new IndexObjectsViewModel(new Group());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupFileDTO $data, CreateGroup $createGroup)
    {
        return response()->json(
            new CreateObjectViewModel(
                $createGroup->execute($data->file)
                    ->include('teacher', 'students'), GroupEnum::Create->value),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group): RetrieveGroupViewModel
    {
        return new RetrieveGroupViewModel(GroupDTO::from($group)->include('teacher', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Group $group, UpdateGroupDTO $data): JsonResponse
    {
        return response()->json(
            new UpdateObjectViewModel(UpdateGroupAction::execute($group, $data), GroupEnum::Update->value),
            201
        );
    }

    public function addStudentToGroup(Group $group, Student $student)
    {
        return new AddStudentToGroupViewModel(AddStudentToGroupAction::execute($group, $student));
    }

    public function removeStudentFromGroup(Group $group, Student $student)
    {
        $this->authorize('removeStudentFromGroup', [$group, $student]);

        return new RemoveStudentFromGroupViewModel(RemoveStudentFromGroupAction::execute($group, $student), $student);
    }
}
