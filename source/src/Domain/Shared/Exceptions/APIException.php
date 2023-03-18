<?php

namespace Domain\Shared\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;

abstract class APIException extends HttpResponseException
{
    public function __construct($code = 400, $message = 'Что-то пошло не так.', $errors = [])
    {
        $data = [
            'error' => [
                'message' => $message,
                'code' => $code
            ]
        ];
        if (count($errors) > 0) {
            $data['error']['errors'] = $errors;
        }
        parent::__construct(response()->json($data)->setStatusCode($code));
    }
}
