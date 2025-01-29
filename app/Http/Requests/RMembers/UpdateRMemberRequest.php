<?php

namespace App\Http\Requests\RMembers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRMemberRequest extends FormRequest
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
        $id = (int) request()->segment(3);

        return [
            "name_ar" => ["required", "string", "max:255","unique:role_members,name_ar," . $id],
            "name_fr" => ["required", "string", "max:255","unique:role_members,name_fr," . $id],
            "salary" => ["required", "string", "max:255"],
        ];
    }

    public function attributes(): array
    {
        return [
            "name_fr" => __(key: "members.name_fr"),
            "name_ar" => __(key: "members.name_ar"),
            "salary" => __(key: "members.salary"),
        ];
    }
}
