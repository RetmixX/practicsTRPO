<?php

namespace Domain\Group\Exceptions;

use Domain\Shared\Exceptions\APIException;

class UpdateGroupError extends APIException
{
    public function __construct($code = 500, $message = 'При обновление произошла ошибка, попробуйте позже.')
    {
        parent::__construct($code, $message);
    }
}
