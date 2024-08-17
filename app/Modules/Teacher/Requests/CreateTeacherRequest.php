<?php

namespace App\Modules\Teacher\Requests;

use App\Http\Requests\CommonRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class CreateTeacherRequest extends CommonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'user_name' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'birthday' => 'required|date',
            'hire_date' => 'required|date',
            'qualification' => 'required|string',
            'specialization' => 'required|string',
            'salary' => 'required|numeric',
        ];
    }
}
