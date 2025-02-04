<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\BooleanEntry;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\ImageEntry;

class ViewClient extends ViewRecord
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function getBreadcrumb(): string
    {
        $defaultBreadcrumb = parent::getBreadcrumb(); // Get the default breadcrumb
        $clientName = $this->record?->user->name ?? '';
    
        return trim($defaultBreadcrumb . ' > ' . $clientName); // Append name while keeping format clean
    }




    
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make('Client Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('user.salutation')
                                ->label('Salutation'),
                            TextEntry::make('user.name')
                                ->label('Client Name')
                                ->weight('bold'),
                            TextEntry::make('user.email')
                                ->label('Email')
                                ->icon('heroicon-o-envelope'),
                            TextEntry::make('client_type')
                                ->label('Client Type'),
                            // ::make('user.is_active')
                            //     ->label('Active Status'),
                            // BooleanEntry::make('user.receive_emails')
                            //     ->label('Subscribed to Emails'),
                        ]),
                ]),
    
            Section::make('Company Details')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('company_name')
                                ->label('Company Name')
                                ->hidden(fn($record) => $record->client_type !== 'company'),
                            TextEntry::make('website')
                                ->label('Company Website')
                                ->url(fn($record) => $record->website),
                            TextEntry::make('tax_name')
                                ->label('Tax Name'),
                            TextEntry::make('tax_number')
                                ->label('Tax Number'),
                            TextEntry::make('pan-vat_number')
                                ->label('PAN/VAT Number'),
                        ]),
                ]),
    
            Section::make('Address Details')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('company_address')
                                ->label('Company Address'),
                            TextEntry::make('shipping_address')
                                ->label('Shipping Address'),
                            TextEntry::make('postal_code')
                                ->label('Postal Code'),
                        ]),
                ]),
    
            Section::make('User Details')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('user.address_1')
                                ->label('Address Line 1'),
                            TextEntry::make('user.address_2')
                                ->label('Address Line 2'),
                            TextEntry::make('user.city')
                                ->label('City'),
                            TextEntry::make('user.state')
                                ->label('State'),
                            TextEntry::make('user.country')
                                ->label('Country'),
                            TextEntry::make('user.zip')
                                ->label('ZIP Code'),
                            TextEntry::make('user.phone')
                                ->label('Phone Number')
                                ->icon('heroicon-o-phone'),
                        ]),
                ]),
    
            Section::make('Profile & Additional Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            ImageEntry::make('user.avatar')
                                ->label('Profile Picture')
                                ->circular(),
                            TextEntry::make('user.gender')
                                ->label('Gender'),
                            TextEntry::make('notes')
                                ->label('Additional Notes')
                                ->columnSpanFull(),
                        ]),
                ]),
        ]);
    }
    
  
}
