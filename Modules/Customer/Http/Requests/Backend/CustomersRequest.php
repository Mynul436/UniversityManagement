<?php
 
namespace Modules\Customer\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CustomersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:255',
            ''
        ];
    }

    function generateReferrerPosId() {
        // Get the current date in year-month-day format
        $date = date('Ymd');
        
        // Get the number of referrers on the same day
        $count = DB::table('customers')
                 ->whereDate('created_at', '=', date('Y-m-d'))
                 ->count();
                 
        // Increment the count by 1 and format it with leading zeros
        $count++;
        $countStr = str_pad($count, 4, '0', STR_PAD_LEFT);
        
        // Concatenate the parts into the Referrer POS ID
        $referrerPosId = "ROO-$date-$countStr";
        
        return $referrerPosId;
    }
    
}
 