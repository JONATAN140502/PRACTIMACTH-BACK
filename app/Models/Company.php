<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'ruc',
        'correo',
        'business_name',
        'address',
        'district',
        'province',
        'department',
        'phone',
        'descripcion',
        'valoration',
        'user_name',
        'password',
    ];

    protected $dates = ['deleted_at'];

    public function practice()
    {
        return $this->hasMany(Practice::class);
    }
}
