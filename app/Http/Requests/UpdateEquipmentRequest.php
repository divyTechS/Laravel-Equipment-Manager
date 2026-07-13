<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateEquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow all users to submit this form
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=> 'required|string|max:255',
            'description' => 'nullable|string',
            'serial_number' => ['required', 'string', 'max:255', Rule::unique('equipment', 'serial_number')->ignore($this->equipment)],
            'status' => 'required|in:available,in-use,maintenance',
            'category_id' => 'required|exists:categories,id',
            'purchase_date' => 'nullable|date',
        ];
    }
}
