<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends BaseRequest
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
            'title' => [
                'required',
                'string',
                'min:1',
                'max:255',
                Rule::unique('categories', 'title')
                    ->where('userId', $this->input('userId'))
                    ->ignore($this->category)
            ],
            'description' => 'sometimes|nullable|string|min:1|max:255'
        ];
    }
}
