<?php

namespace Domain\Group\Actions\CreateGroup;

use Domain\Group\DTO\GroupDTO;
use Illuminate\Http\UploadedFile;

interface CreateGroup
{
    public function execute(UploadedFile $file): GroupDTO;
}
