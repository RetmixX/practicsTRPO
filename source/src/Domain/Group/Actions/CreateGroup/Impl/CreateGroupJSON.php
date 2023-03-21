<?php

namespace Domain\Group\Actions\CreateGroup\Impl;

use Domain\Group\Actions\CreateGroup\CreateGroup;
use Domain\Group\DTO\GroupDTO;
use Illuminate\Http\UploadedFile;
use Psy\Util\Json;


class CreateGroupJSON implements CreateGroup
{

    public static function execute(UploadedFile $file): GroupDTO
    {

    }
}
