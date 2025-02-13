<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_code',
        'client_id',
        'title',
        'project_summary',
        'start_date',
        'deadline_date',
        'deadline_date',
        'cancelled_date',
        'due_date',
        'status',
        'budget',
        'notes',
        'file',
        'project_notification',
        'is_active',
        'task_board',
        'gannt_chart'
    ];

    public static function generateProjectNumber()
    {
        $latestProject = self::latest('id')->first();
        $nextNumber = $latestProject ? intval(substr($latestProject->project_code, -3)) + 1 : 1;
        return 'soft-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT).'-proj';
    }

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

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
