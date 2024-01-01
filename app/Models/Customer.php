<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'customers';

    protected $fillable = [ 
        'customer_id', 'name', 'father_name', 'mother_name', 'email', 'mobile', 'gender', 'religion', 'marital_status', 'dob', 'age', 'occupation', 'blood_grp', 'birth_reg', 'nid', 'passport', 'status', 'present_address', 'present_city', 'present_district', 'present_division', 'permanent_address', 'permanent_city', 'permanent_district', 'permanent_division', 'country', 'guard_name', 'guard_mobile', 'guard_address', 'created_by', 'updated_by', 'deleted_by',
    ];

    
}
