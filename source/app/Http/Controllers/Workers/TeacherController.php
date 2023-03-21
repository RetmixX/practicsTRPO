<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use Domain\Group\DTO\TeacherDTO;
use Domain\Group\Enums\TeacherEnum;
use Domain\Group\Models\Teacher;
use Domain\Group\ViewModels\CreateWorkerViewModel;
use Domain\Shared\ViewModels\CRUD\CreateObjectViewModel;
use Domain\Shared\ViewModels\CRUD\IndexObjectsViewModel;
use Domain\Shared\ViewModels\CRUD\RetrieveObjectViewModel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IndexObjectsViewModel(new Teacher());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherDTO $data): CreateObjectViewModel
    {
        return new CreateObjectViewModel($data, TeacherEnum::Create->value);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return new RetrieveObjectViewModel($teacher);
    }
}
