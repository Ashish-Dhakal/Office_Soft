<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        if (Auth::user()->hasRole('employee')) {
            
            $data['creator_id'] = Auth::user()->id;
            $data['creator_role'] = 'employee';
        } elseif (Auth::user()->hasRole('client')) {
            
            $data['creator_id'] = Auth::user()->id;
            $data['creator_role'] = 'client';
        } else {

            $data['creator_id'] = Auth::user()->id;
            $data['creator_role'] = 'admin';
        }
        return $data;
    }
}
