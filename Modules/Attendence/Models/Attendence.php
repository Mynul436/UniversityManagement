<?php

namespace Modules\Attendence\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendence extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    

    protected $table = 'attendences';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Attendence\database\factories\AttendenceFactory::new();
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
