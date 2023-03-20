<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Domain\Group\Actions\UpdateGroupAction;
use Domain\Group\DTO\GroupDTO;
use Domain\Group\DTO\UpdateGroupDTO;
use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Domain\Group\ViewModels\IndexGroupsViewModel;
use Domain\Group\ViewModels\RetrieveGroupViewModel;
use Domain\Group\ViewModels\UpdateGroupViewModel;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): IndexGroupsViewModel
    {
        return new IndexGroupsViewModel();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group): RetrieveGroupViewModel
    {
        return new RetrieveGroupViewModel(GroupDTO::fromModel($group));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Group $group, UpdateGroupDTO $data)
    {
        return new UpdateGroupViewModel(UpdateGroupAction::execute($group, $data));
    }

    public function addStudentToGroup(Group $group, Student $student)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
