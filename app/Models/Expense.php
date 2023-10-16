<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;


    public function cost()
    {
        return $this->belongsTo(ProjectCost::class, 'project_cost_id');
    }
}