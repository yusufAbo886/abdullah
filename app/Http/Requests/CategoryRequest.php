<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        return  ($this->isMethod('POST') ? $this->store() : $this->update());

    }

    protected function store()
    {
        return [
            'theNameEn' => 'required|unique:categories',
            'theNameTr' => 'required|unique:categories'


        ];
    }

    protected function update()
    {
        $id =$this->route('category');

        return [
            'theNameEn' =>'required|unique:categories,theNameEn,'.$id,
            'theNameTr' => 'required|unique:categories,theNameTr,'.$id,

        ];
    }
}
