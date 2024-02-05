<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentForConfioused extends Model
{
    use HasFactory;
    
    protected $table = 'coment_for_confiouseds';

    protected $fillable = [ 
        'user_id','description', 'status', 'replay', 'created_by', 'updated_by', 'deleted_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
