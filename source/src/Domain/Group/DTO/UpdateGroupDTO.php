<?php

namespace Domain\Group\DTO;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

class UpdateGroupDTO extends Data
{
    public function __construct(
        public readonly string $name,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'name' => $request->name,
        ]);
    }

    public static function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:100'
        ];
    }
}
