<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use Domain\Group\DTO\TeacherDTO;
use Domain\Group\Models\Teacher;
use Domain\Group\ViewModels\CreateWorkerViewModel;
use Domain\Shared\ViewModels\RetrieveObjectViewModel;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Teacher::all()->map(fn(Teacher $teacher) => TeacherDTO::from($teacher));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherDTO $data)
    {
        $teacher = Teacher::create($data->all());
        return new CreateWorkerViewModel(TeacherDTO::from($teacher), 'Работник создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return new RetrieveObjectViewModel($teacher);
    }
}
