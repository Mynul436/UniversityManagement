<?php

namespace Modules\Customer\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Customer extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customers';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Customer\database\factories\CustomerFactory::new();
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
