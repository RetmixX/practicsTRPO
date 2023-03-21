<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Domain\Group\Actions\AddStudentToGroupAction;
use Domain\Group\Actions\CreateGroup\CreateGroup;
use Domain\Group\Actions\RemoveStudentFromGroupAction;
use Domain\Group\Actions\UpdateGroupAction;
use Domain\Group\DTO\GroupFileDTO;
use Domain\Group\DTO\UpdateGroupDTO;
use Domain\Group\Enums\GroupEnum;
use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Domain\Group\ViewModels\AddStudentToGroupViewModel;
use Domain\Group\ViewModels\RemoveStudentFromGroupViewModel;
use Domain\Shared\ViewModels\CRUD\CreateObjectViewModel;
use Domain\Shared\ViewModels\CRUD\IndexObjectsViewModel;
use Domain\Shared\ViewModels\CRUD\RetrieveObjectViewModel;
use Domain\Shared\ViewModels\CRUD\UpdateObjectViewModel;

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
        return new CreateObjectViewModel($createGroup->execute($data->file), GroupEnum::Create->value);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group): RetrieveObjectViewModel
    {
        return new RetrieveObjectViewModel($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Group $group, UpdateGroupDTO $data)
    {
        return new UpdateObjectViewModel(UpdateGroupAction::execute($group, $data), GroupEnum::Update->value);
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
