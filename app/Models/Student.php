<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name', 'last_name', 'code', 'dni', 'correo', 'phone', 'id_school',
        'skills', 'state', 'cicle', 'user_name', 'password', 'last_access',
        'password'
    ];
    
    protected $dates = ['deleted_at'];
    public function school()
    {
        return $this->belongsTo(School::class, 'id_school');
    }

    public function faculty()
    {
        return $this->school->faculty;
    }
    
}
