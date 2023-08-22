<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Knowledge extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'descipcion',
        'state',
        'id_idsubspecialty'
    ];

    protected $dates = ['deleted_at'];

    public function subspecialty()
    {
        return $this->belongsTo(\App\Models\Subspecialty::class);
    }
}
