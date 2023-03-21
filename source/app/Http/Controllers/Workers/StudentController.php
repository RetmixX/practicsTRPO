<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use Domain\Group\Actions\Workers\CreateStudentAction;
use Domain\Group\DTO\StudentDTO;
use Domain\Group\Enums\StudentEnum;
use Domain\Group\Models\Student;
use Domain\Group\ViewModels\CreateWorkerViewModel;
use Domain\Shared\ViewModels\CRUD\CreateObjectViewModel;
use Domain\Shared\ViewModels\CRUD\IndexObjectsViewModel;
use Domain\Shared\ViewModels\CRUD\RetrieveObjectViewModel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IndexObjectsViewModel(new Student());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentDTO $data): CreateObjectViewModel
    {
        return new CreateObjectViewModel(CreateStudentAction::execute($data), StudentEnum::Create->value);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return new RetrieveObjectViewModel($student);
    }
}
