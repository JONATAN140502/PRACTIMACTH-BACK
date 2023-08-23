<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Faculty extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['code', 'name', 'descripcion', 'state'];

    protected $dates = ['deleted_at'];

    public function schools()
    {
        return $this->hasMany(\App\Models\School::class, 'id_faculty');
    }
    
}
