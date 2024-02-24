<?php namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Validators\UsersValidator;
use Illuminate\Support\Facades\App;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /** UsersValidator */
        $usersValidator = App::make(UsersValidator::class);
        return $usersValidator->getRules(UsersValidator::LOGIN);
    }
}
