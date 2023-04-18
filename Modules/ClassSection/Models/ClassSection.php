<?php

namespace Modules\ClassSection\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSection extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'classsections';
    protected $casts = [
        'my_year' => 'year',
    ];
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\ClassSection\database\factories\ClassSectionFactory::new();
    }
}
