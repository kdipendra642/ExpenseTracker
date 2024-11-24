<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'userId' => 'required|integer|exists:users,id',
            'categoryId' => 'required|integer|exists:categories,id',
            'comment' => 'required|string|min:1|max:255',
            'amount' => 'required|numeric|between:1,10000000',
            'paidTo' => 'sometimes|nullable|string|min:1|max:255',
            'paidAt' => 'required|date|date_format:Y-m-d',
        ];
    }
}
