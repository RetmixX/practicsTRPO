<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use Domain\Group\Actions\Workers\CreateTeacherAction;
use Domain\Group\DTO\TeacherDTO;
use Domain\Group\Enums\TeacherEnum;
use Domain\Group\Models\Teacher;
use Domain\Shared\ViewModels\CRUD\CreateObjectViewModel;
use Domain\Shared\ViewModels\CRUD\IndexObjectsViewModel;
use Domain\Shared\ViewModels\CRUD\RetrieveObjectViewModel;
use Illuminate\Http\JsonResponse;

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
    public function store(TeacherDTO $data): JsonResponse
    {
        return response()->json(
            new CreateObjectViewModel(
                CreateTeacherAction::execute($data),
                TeacherEnum::Create->value
            ),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return new RetrieveObjectViewModel($teacher);
    }
}
