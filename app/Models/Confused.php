<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Confused extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'confuseds';

    protected $fillable = [ 
        'name','description', 'status', 'created_by', 'updated_by', 'deleted_by',
    ];
}
