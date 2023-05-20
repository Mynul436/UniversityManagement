<?php
 
namespace Modules\Result\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ResultsRequest extends FormRequest
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
 