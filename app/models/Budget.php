<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';
    protected $primaryKey = 'id';

    protected $fillable = ['budget_id','username','Amount','created_by','updated_by'];
}
