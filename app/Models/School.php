<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'code', 'state', 'id_facultie'];
    protected $dates = ['deleted_at'];
    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'id_facultie');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_school');
    }
}
