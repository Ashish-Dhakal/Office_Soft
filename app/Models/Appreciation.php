<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    protected $fillable = ['employee_id', 'title', 'given_date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
}
