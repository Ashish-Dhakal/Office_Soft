<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    protected $fillable = ['employee_id','given_date' , 'appreciation_award_id' , 'description'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function appreciation_award()
    {
        return $this->belongsTo(AppreciationAward::class);
    }
    
}
