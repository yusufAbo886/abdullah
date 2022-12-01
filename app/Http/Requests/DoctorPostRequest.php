<?php

namespace App\Http\Requests;

use App\Models\Links;
use Illuminate\Foundation\Http\FormRequest;

class DoctorPostRequest extends FormRequest
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
            'theTitleEn' => 'required',
            'theTitleTr' => 'required',
            'theLocation' => 'required',
            'thePhone' => 'required',
            'theEmail' => 'required',
            'facebook' => 'required',
            'instegram' => 'required',
            'twiter' => 'required',
            'map' => 'required',
            'theTextEn' => 'required',
            'theTextTr' => 'required',
            'url' => 'required|unique:links'

        ];
    }

    protected function update()
    {
        $id =$this->route('doctor_post');
        $link =Links::where('content_id',$id)->where('page','doctorPost')->first();
//         dump($link->id);
        return [
            'theTitleEn'   => 'required',
            'theTitleTr'   => 'required',
            'theLocation' => 'required',
            'thePhone'    => 'required',
            'theEmail'    => 'required',
            'facebook'    => 'required',
            'instegram'   => 'required',
            'twiter'      => 'required',
            'map'         => 'required',
            'theTextEn'   => 'required',
            'theTextTr'   => 'required',
           'url' => 'required|unique:links,url,'.$link->id

        ];
    }
}
