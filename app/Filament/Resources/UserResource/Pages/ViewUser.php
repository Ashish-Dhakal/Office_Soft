<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                ImageEntry::make('avatar')
                ->getStateUsing(function ($record) {
                    return $record->avatar
                        ? asset('storage' . $record->avatar):
                        asset('assets/suffix-image/slack.png'); // Correct path to storage/public
                    
                })
                ->circular(),
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('role')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                  
                    ,
                TextEntry::make('updated_at')
                    ->dateTime()
                  
                    
            ]);
    }
}
