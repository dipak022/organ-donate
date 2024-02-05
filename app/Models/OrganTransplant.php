<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganTransplant extends Model
{
    use HasFactory;
    protected $table = 'organ_transplants';

    protected $fillable = [
        'death_donate_id','donate_id', 'death_date', 'death_time', 'phone', 'address', 'address_line', 'city', 'postal_code', 'country', 'email', 'death_organs_tissues_status','collect_organ_location', 'anything_description' , 'status', 'created_by', 'updated_by', 'deleted_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'death_donate_id', 'id');
    }
    public function donate()
    {
        return $this->belongsTo(Donate::class, 'donate_id', 'id');
    }
}
