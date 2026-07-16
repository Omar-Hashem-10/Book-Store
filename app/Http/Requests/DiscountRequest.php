<?php

namespace App\Http\Requests;

use App\Models\Discount;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscountRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "code" => ['required', 'size:9', 'string', Rule::unique(Discount::class)->ignore(request()->discount_id)],
            "quantity" => "required|numeric|min:1|max:100",
            "percentage" => "required|numeric|min:1|max:100",
            'expiry_date' => "required|after:now",
        ];
    }
}
