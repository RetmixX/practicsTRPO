<?php

namespace Domain\Shared\Exceptions\UserExceptions;

use Domain\Shared\Exceptions\APIException;

class LoginFailedException extends APIException
{
    public function __construct($code = 401, $message = 'Неверные авторизационные данные.')
    {
        parent::__construct($code, $message);
    }

}
