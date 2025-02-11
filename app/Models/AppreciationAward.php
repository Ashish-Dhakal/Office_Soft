<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppreciationAward extends Model
{
    protected $fillable = ['title', 'description'];

    public function appreciations()
    {
        return $this->hasMany(Appreciation::class);
    }
}
