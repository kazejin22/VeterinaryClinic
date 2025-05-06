<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $primaryKey = 'pet_id'; // custom primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['user_id', 'name', 'species', 'breed', 'age', 'gender'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // pastiin foreign key jelas
    }
}
