<?php

namespace App\Domains\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FetchProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fromPrice' => 'required_with:toPrice|lte:toPrice',
            'toPrice' => 'required_with:fromPrice|gte:fromPrice'
        ];
    }
}
