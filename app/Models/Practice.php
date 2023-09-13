<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Practice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'date',
        'modalidad',
        'descripcion',
        'state',
        'status',
        'workload',
        'vacant',
        'views',
        'id_company'
    ];

    protected $dates = ['deleted_at'];

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class,'id_company');
    }
    public function match()
    {
        return $this->hasMany(\App\Models\Match::class,'id_practice');
    }
}
