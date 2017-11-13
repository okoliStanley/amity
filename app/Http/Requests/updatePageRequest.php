<?php

namespace amity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePageRequest extends FormRequest
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
        return [
            'title' => ['required'],
            'uri' => ['Required', 'Unique:pages,uri,'.$this->route('page')],
            'name' =>['Unique:pages,name,'.$this->route('page'),'nullable'],
            'content' => ['Required']
        ];
    }
}
