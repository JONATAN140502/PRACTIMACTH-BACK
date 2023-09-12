<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
    Model, SoftDeletes};

class Match extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'date',
        'id_practice',
        'id_student',
        'state',
        'ratings',
    ];
    protected $dates = ['deleted_at'];

    public function practice()
    {
        return $this->belongsTo(\App\Models\Practice::class,'id_practice');
    }

    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class,'id_student');
    }
}
