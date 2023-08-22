<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Specialty extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'descripcion',
        'state',
        'id_area',
    ];

    protected $dates = ['deleted_at'];

    public function area()
    {
        return $this->belongsTo(\App\Models\Area::class);
    }

    public function subspecialty()
    {
        return $this->hasMany(\App\Models\Subspecialty::class,'id_specialty');
    }

    
}
