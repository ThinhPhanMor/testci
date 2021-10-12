<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class BaseRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                RESPONSE_MESSAGE => $errors,
                RESPONSE_DATA => null,
                RESPONSE_CODE => Response::HTTP_UNPROCESSABLE_ENTITY
            ],
            Response::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}
