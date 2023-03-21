<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use Domain\Group\DTO\StudentDTO;
use Domain\Group\Models\Student;
use Domain\Group\ViewModels\CreateWorkerViewModel;
use Domain\Shared\ViewModels\IndexObjectsViewModel;
use Domain\Shared\ViewModels\RetrieveObjectViewModel;
use Illuminate\Http\Request;

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
    public function store(StudentDTO $data): CreateWorkerViewModel
    {
        $student = Student::create($data->all());
        return new CreateWorkerViewModel(StudentDTO::from($student), 'Студент создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return new RetrieveObjectViewModel($student);
    }
}
