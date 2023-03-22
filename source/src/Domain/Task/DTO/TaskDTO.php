<?php

namespace Domain\Task\DTO;

use Carbon\Carbon;
use Domain\Task\Models\Task;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TaskDTO extends Data
{
    public function __construct(
        public readonly Optional|int $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $status,
        public readonly string $date,
    ) {
    }

    public static function fromModel(Task $task): self
    {
        return self::from([
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'status' => $task->status,
            'date' => Carbon::create($task->date)->translatedFormat('d F Y H:i'),
        ]);
    }

    public static function rules(): array
    {
        return [
            'id'=>'prohibited',
            'name' => 'required|string|min:1|max:100',
            'description' => 'required|string|min:1|max:1000',
            'status'=>'required|string|in:В работе,Отменен,Выполнен',
            'date' => 'required|date_format:Y-m-d H:i',
        ];
    }
}
