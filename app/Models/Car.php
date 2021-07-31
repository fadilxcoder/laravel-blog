<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = [
        'model_name',
        'information',
        'year'
    ];

    # Fields allowed to display in blade
    protected $visible = [
        'model_name',
        'information',
        'year'
    ];

    # Fields prevent to display in blade
    protected $hidden = [
//        'id'
    ];

    # Prevent table from having created_at & updated_at
    public $timestamps = false;
}
