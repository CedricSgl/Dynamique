<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateWineRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        //dd(Rule::unique('wines'));
        return [
            'name'      => ['required', 'min:3', Rule::unique('wines')->ignore($this->route()->parameter('wine'))],
            'vintage'   => ['required'/*, 'digits_between:1900,2035'*/],
            'cepage_id' => ['required', 'integer', Rule::exists('cepages', 'id')/*->where(function($query){return $query->whereNotNull('cepage_id');})*/],
            'type_id'   => ['required', 'integer', Rule::exists('types', 'id')/*->where(function($query){return $query->whereNotNull('type_id');})*/],
            'image'     => ['image', 'max:1000']
        ];
    }
}
