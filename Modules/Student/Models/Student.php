<?php

namespace Modules\Student\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'students';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Student\database\factories\StudentFactory::new();
    }
}
