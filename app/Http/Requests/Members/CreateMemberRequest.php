<?php

namespace App\Http\Requests\Members;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
        return [
            'name' => "required|string|max:255",
            'phone' => "required|digits:10|unique:members",
            'email' => "sometimes|nullable|email|unique:members",
            'adress' => "required|max:255",
            'rib_number' => "required|numeric|regex:/^\d{24}$/|unique:members",
            "bank_name" => "required|string|max:255",
            'cin_number' => "required|alpha_num|unique:members",
            'role_id' => "required|string|max:255",
            'month' => 'required|digits_between:1,12',
            'amount' => 'sometimes|nullable|numeric',
            "permissions" => ["sometimes", "nullable", "array"],
            "political_party" => ["required", "nullable", "string"],
            'cin_image' => 'sometimes|nullable|file|mimes:pdf|max:700',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __("members.name"),
            'phone' => __("members.phone"),
            'email' => __("members.email"),
            'adress' => __("members.adress"),
            'rib_number' => __("members.rib_number"),
            'bank_name' => __("members.bank_name"),
            'cin_number' => __("members.cin_number"),
            'role_id' => __("members.role_name"),
            'month' => __("members.month"),
            'amount' => __("members.amount"),
            "permissions" => __(key: "members.permissions"),
            "political_party" => __(key: "members.political_party"),
            'cin_image' => __(key: "members.cin_image"),
        ];
    }
}
