<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);
        return [
            'shop_id' => 'required',
            'name' =>  [
                'required',
                Rule::unique(Product::class)->where(
                    function ($query) {
                        return $query->where('shop_id', $this->shop_id);
                    }
                )->ignore($id, 'id'),
            ],
            'price' => 'numeric|nullable',
            'stock' => 'boolean',
        ];
    }
}
