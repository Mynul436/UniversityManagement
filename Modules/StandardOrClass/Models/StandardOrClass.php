<?php

namespace Modules\StandardOrClass\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class StandardOrClass extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'standardorclasses';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\StandardOrClass\database\factories\StandardOrClassFactory::new();
    }
}
