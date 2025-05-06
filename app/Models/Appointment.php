<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function pet()
{
    return $this->belongsTo(Pet::class, 'pet_id');
}

public function doctor()
{
    return $this->belongsTo(Doctor::class, 'doctor_id');
}

public function service()
{
    return $this->belongsTo(Service::class, 'service_id');
}

    use HasFactory;
    protected $fillable = [
        'pet_id',
        'doctor_id',
        'service_id',
        'time',
        'status',
    ];

    public function invoice()
{
    return $this->hasOne(Invoice::class);
}

}
