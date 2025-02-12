<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['creator_id', 'creator_role', 'project_id', 'ticket_title', 'description', 'status', 'priority', 'image', 'attachment'];


    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function category()
    {
        return $this->belongsTo(TicketCategory::class, 'ticket_category_id');
    }

    public function assignments()
    {
        return $this->hasMany(TicketAssignment::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
