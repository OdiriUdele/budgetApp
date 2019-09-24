<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priorities extends Model
{
    protected $table = 'priorities';
    protected $primaryKey = 'id';

    protected $fillable = ['priority','percent','created_by','updated_by'];
}
