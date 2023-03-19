<?php

namespace Domain\Group\DTO;

use Illuminate\Support\Optional;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class GroupDTO extends Data
{
    public function __construct(
        public readonly Optional|int $id,
        public readonly TeacherDTO $teacher,
        #[DataCollectionOf(StudentDTO::class)]
        public readonly DataCollection $students,
    ) {
    }



}
