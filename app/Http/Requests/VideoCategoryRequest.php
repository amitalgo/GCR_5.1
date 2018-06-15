<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideoCategoryRequest extends Request
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
        if($this->method()=='PUT'){
            return [
                'categoryName' => 'required|unique:App\Entities\Category,name,'.$this->id.',id,isActive,1',
                'active' => 'required',
            ];
        }else{
            return [
                'category' => 'required|unique:App\Entities\Category,name,NULL,id,isActive,1',
            ];
        }

    }
}
