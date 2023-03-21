<?php

namespace Domain\Group\Actions\CreateGroup\Impl;

use Domain\Group\Actions\CreateGroup\CreateGroup;
use Domain\Group\DTO\GroupDTO;
use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Domain\Group\Models\Teacher;
use Domain\Shared\Exceptions\AttributeError;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class CreateGroupJSON implements CreateGroup
{

    public function execute(UploadedFile $file): GroupDTO
    {
        $data = collect(json_decode($file->getContent()));
        self::checkStructureJSON($data);

        try {
            DB::beginTransaction();
            $group = Group::query()->create([
                'name' => $data->get('name'),
                'teacher_id' => Teacher::create(collect($data->get('teacher'))->all())->id
            ]);

            collect($data->get('students'))->map(fn($object) => Student::create([
                'name' => collect($object)->get('name'),
                'surname' => collect($object)->get('surname'),
                'patronymic' => collect($object)->get('patronymic'),
                'sex' => collect($object)->get('sex'),
                'group_id' => $group->id
            ]));
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw new AttributeError(message: $ex->getMessage());
        }

        return GroupDTO::from($group);
    }

    private function checkStructureJSON(Collection $data): void
    {
        $keys = collect(['teacher', 'name', 'students']);
        $data->keys()->each(fn(string $key) => throw_unless(
            $keys->contains($key),
            AttributeError::class,
            message: "Аттрибут '{$key}' не валиден"
        ));

        throw_unless(
            is_array($data->get('students')),
            AttributeError::class,
            message: "Студенты должны быть массивом"
        );

        throw_unless(
            !empty($data->get('students')),
            AttributeError::class,
            message: "Массив студентов пустой"
        );
    }

}
