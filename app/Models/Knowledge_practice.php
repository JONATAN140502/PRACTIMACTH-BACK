<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knowledge_practice extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_practice', 
        'id_knowledges', 
        'state'
    ];

    protected $dates = ['deleted_at'];

}
