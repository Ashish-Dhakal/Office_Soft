<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'contract_number',
        'subject',
        'project_id',
        'contract_type_id',
        'client_id',
        'description',
        'notes',
        'payment_terms',
        'total_value',
        'contract_start_date',
        'contract_end_date',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function contractType()
    {
        return $this->belongsTo(ContractType::class , 'contract_type_id');
    }

    public function payments()
    {
        return $this->hasMany(ContractPayment::class);
    }
}
