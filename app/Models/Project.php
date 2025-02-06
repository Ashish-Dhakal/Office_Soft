<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'started_at',
        'deadline_at',
        'completed_at',
        'status',
        'budget',
        'actual_cost',
        'client_id',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
