<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knowledges_student extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [ 'id_student', 'id_knowledges', 'state'];

    protected $dates = ['deleted_at'];

    public function knowledge()
    {
        return $this->belongsTo(\App\Models\Knowledge::class,'id_knowledges');
    }

    public function studiant()
    {
        return $this->belongsTo(\App\Models\Student::class);
    }

}
