<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class UpdateShop extends FormRequest
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
            'name' => 'required|unique:shops,name,'.$id,
            'email' => 'email|nullable',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
}
