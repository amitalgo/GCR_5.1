<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsRequest extends Request
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
        $rules = [
                "country" => "required",
                "description" => "required",
        ];
        if($this->method() == 'PUT'){
            $rules["title"] = "required|unique:App\Entities\News,newsHeading,".$this->id.",id,isActive,1";
        }
        if ($this->method() != 'PUT'){
            $rules["title"] = "required|unique:App\Entities\News,newsHeading,NULL,id,isActive,1";
            $rules["thumbimage"] = "required";
            $rules["actimage"] = "required";
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'country.required' => 'Country is required',
            'thumbimage.required' => 'Thumbnail is required',
            'actimage.required' => 'Image is required',
            'description.required' => 'Description is required',
            'actimage.required'  => 'News/Events Heading is required',
            'title.unique'  => 'News/Events Heading is already been taken. Please provide another heading',
        ];
    }
}
