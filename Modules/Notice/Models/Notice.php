<?php

namespace Modules\Notice\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'notices';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Notice\database\factories\NoticeFactory::new();
    }
}
