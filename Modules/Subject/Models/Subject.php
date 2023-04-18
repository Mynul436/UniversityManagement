<?php

namespace Modules\Subject\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'subjects';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Subject\database\factories\SubjectFactory::new();
    }
}
