<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'invoice_number',
        'cost',
        'time',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
