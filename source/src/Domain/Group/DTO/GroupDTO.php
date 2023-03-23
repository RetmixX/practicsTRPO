<?php

namespace Domain\Group\DTO;

use Domain\Group\Models\Group;
use Domain\Group\Models\Student;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithoutValidation;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Lazy;

class GroupDTO extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        #[WithoutValidation]
        public readonly Lazy|TeacherDTO $teacher,
        #[WithoutValidation]
        #[DataCollectionOf(StudentDTO::class)]
        public readonly Lazy|DataCollection $students,
    ) {
    }

    public static function fromModel(Group $group): self
    {
        return self::from([
            'id' => $group->id,
            'name' => $group->name,
            'teacher' => Lazy::create(fn()=>TeacherDTO::from($group->chiefGroup)),
            'students' => Lazy::create(fn() => $group->students
                ->map(fn(Student $student) => StudentDTO::from($student))),
        ]);
    }
}
