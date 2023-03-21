<?php

namespace Domain\Group\Exceptions;

use Domain\Shared\Exceptions\APIException;

class GroupError extends APIException
{
    public function __construct($code = 409, $message = 'Произошла ошибка')
    {
        parent::__construct($code, $message);
    }
}
