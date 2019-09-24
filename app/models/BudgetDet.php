<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetDet extends Model
{
    protected $table = 'budget_dets';
    protected $primaryKey = 'id';

    protected $fillable = ['budget_id','item','item_description','priority','username','itemAmount','created_by','updated_by'];
}

