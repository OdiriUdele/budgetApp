<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = ['category','description','created_by','updated_by'];
}
