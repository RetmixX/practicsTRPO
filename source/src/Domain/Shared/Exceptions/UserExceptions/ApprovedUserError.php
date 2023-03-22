<?php

namespace Domain\Shared\Exceptions\UserExceptions;

use Domain\Shared\Exceptions\APIException;

class ApprovedUserError extends APIException
{
    public function __construct($code = 409, $message = 'Пользователь уже подтвержден')
    {
        parent::__construct($code, $message);
    }

}
