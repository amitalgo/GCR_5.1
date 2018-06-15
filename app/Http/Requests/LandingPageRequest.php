<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LandingPageRequest extends Request
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
            "content"=>"required",
            "theme"=>"required",
            "banner"=>"required",
            "meta-title"=>"required",
            "meta-keyword"=>"required",
            "meta-description"=>"required",
        ];
        if($this->method() == 'PUT'){
            //$rules["title"] = "required|unique:App\Entities\LandingPage,title,".$this->id.",id,isActive,1";
            $rules["title"] = "required|unique:App\Entities\LandingPage,title,".$this->id.",id,isActive,1";
        }
        if ($this->method() != 'PUT'){
            $rules["title"] = "required|unique:App\Entities\LandingPage,title,NULL,id,isActive,1";
        }
        return $rules;
    }
}
