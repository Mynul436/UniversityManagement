<?php
 
namespace Modules\Attendence\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AttendencesRequest extends FormRequest
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
 