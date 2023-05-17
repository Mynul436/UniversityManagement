<?php
 
namespace Modules\ClassSection\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ClassSectionsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'max:255',
            ''
        ];
    }
}
 