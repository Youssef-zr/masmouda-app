<?php

namespace App\Http\Requests\Committe;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommitteeRequest extends FormRequest
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
            'name_ar' => "required|string|max:255|unique:committees,name_ar," . $id,
            'name_fr' => "required|string|max:255|unique:committees,name_fr," . $id,
            'description_ar' => "required|string|max:255",
            'description_fr' => "required|string|max:255",
        ];
    }

    public function attributes()
    {
        return [
            'name_ar' => __("members.name_ar"),
            'name_fr' => __("members.name_fr"),
            'description_ar' => __("members.description_ar"),
            'description_fr' => __("members.description_fr"),
        ];
    }
}
