<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $primaryKey = 'doctor_id';
    public $incrementing = true;
    protected $keyType = 'int';


    protected $fillable = [
        'name',
        'specialization',
        'phone_number',
        'email',
        'license_number',
    ];

    // (Optional) Kalau kamu mau set primary key custom (kalau bukan "id")
    // protected $primaryKey = 'doctor_id';
}
