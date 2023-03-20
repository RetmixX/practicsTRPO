<?php

namespace Domain\Shared\Exceptions;

class AttributeError extends APIException
{
    public function __construct($code = 422, $message = 'Ни один из параметров не был передан')
    {
        parent::__construct($code, $message);
    }

}
