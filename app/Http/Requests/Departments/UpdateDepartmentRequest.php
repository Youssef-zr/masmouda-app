<?php

namespace App\Http\Requests\Departments;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
        $id = request()->department;
        
        return [
            "name"=>"required|string|unique:departments,name,$id",
            "description"=>"sometimes|nullable|string",
            "parent_id"=>"sometimes|nullable|exists:departments,id",
        ];
    }

  
    public function attributes()
    {
        return [
            'name' => __(key: "employees.name"),
            'description' => __("employees.phone"),
            'parent_id' => __("employees.parent"),
        ];
    }
}
