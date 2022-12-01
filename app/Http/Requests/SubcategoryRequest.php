<?php

namespace App\Http\Requests;

use App\Models\Links;
use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
            'theNameEn' => 'required|unique:subcategories',
            'theNameTr' => 'required|unique:subcategories',
            'url' => 'required|unique:links'


        ];
    }

    protected function update()
    {
        $id =$this->route('subcategory');
        $link =Links::where('content_id',$id)->where('page','subcategory')->first();
        return [
            'theNameEn' =>'required|unique:subcategories,theNameEn,'.$id,
            'theNameTr' => 'required|unique:subcategories,theNameTr,'.$id,
             'url' => 'required|unique:links,url,'.$link->id

        ];
    }
}
