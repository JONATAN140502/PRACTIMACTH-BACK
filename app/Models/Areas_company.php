<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class areas_company extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['id_company', 'id_area', 'state'];

    protected $dates = ['deleted_at']; 

    public function area()
    {
        return $this->belongsTo(\App\Models\Area::class, 'id_area');
    }

}
