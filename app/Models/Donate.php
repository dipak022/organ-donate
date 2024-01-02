<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;
    protected $table = 'donates';

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'date_of_bith', 'phone', 'address', 'address_line', 'city', 'postal_code', 'country', 'email', 'height', 'weight', 'gender', 'permission_to_donate', 'organs_tissues_for', 'donor_signature','specific_organs_tissues_name','anything_description' , 'status', 'created_by', 'updated_by', 'deleted_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    
}
