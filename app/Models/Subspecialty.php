<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subspecialty extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'descripcion',
        'state',
        'id_specialty',
    ];

    protected $dates = ['deleted_at'];

    public function specialty()
    {
        return $this->belongsTo(\App\Models\Specialty::class);
    }
}