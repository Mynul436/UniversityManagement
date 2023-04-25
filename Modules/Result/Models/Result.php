<?php

namespace Modules\Result\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'results';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Result\database\factories\ResultFactory::new();
    }
}
