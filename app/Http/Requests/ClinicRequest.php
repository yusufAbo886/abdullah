<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicRequest extends FormRequest
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
            'theName' => 'required',
            'file' => 'required'
        ];
    }

    protected function update()
    {

        return [
            'theName' =>'required',
            'file' => 'required',
        ];
    }
}
