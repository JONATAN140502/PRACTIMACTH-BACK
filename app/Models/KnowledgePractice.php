<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KnowledgePractice extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_practice', 
        'id_knowledges', 
        'state'
    ];

    protected $dates = ['deleted_at'];

    public function knowledge()
    {
        return $this->belongsTo(\App\Models\Knowledge::class);
    }
    public function practice()
    {
        return $this->belongsTo(\App\Models\Practice::class);
    }
}
