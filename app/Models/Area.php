<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Area extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'descripcion',
        'state'
    ];

    protected $dates = ['deleted_at'];

    public function specialty()
    {
        return $this->hasMany(\App\Models\Specialty::class,'id_area');
    }
}
