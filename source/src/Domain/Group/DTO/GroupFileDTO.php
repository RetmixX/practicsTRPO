<?php

namespace Domain\Group\DTO;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class GroupFileDTO extends Data
{
    public function __construct(
        public readonly UploadedFile $file
    ) {
    }

    public static function rules(): array
    {
        return [
            'file'=>'required|mimes:csv,excel,json'
        ];
    }

}
