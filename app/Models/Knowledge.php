<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Knowledge extends Model
{
    protected $table = 'knowledges';
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'state',
        'id_subspecialty'
    ];

    protected $dates = ['deleted_at'];

    public function subspecialty()
    {
        return $this->belongsTo(\App\Models\Subspecialty::class);
    }
}
