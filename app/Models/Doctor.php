<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'doctors';

    protected $fillable = [
        'doctor_id', 'type', 'desig_id', 'dept_id', 'name', 'email', 'mobile', 'mobile2', 'gender', 'religion', 'dob', 'age', 'blood_grp', 'image', 'degree', 'specialist', 'train_certi', 'hosp_name', 'exp', 'consult_fee', 'follow_up_fee', 'marital_status', 'about', 'status', 'address', 'city', 'district', 'division', 'country', 'created_by', 'updated_by', 'deleted_by',
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'desig_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'id');
    }
}