<?php

namespace App\Filament\Resources\ClientResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use App\Filament\Resources\UserResource\Forms\UserResourceForm;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;

final class ClientResourceForm implements ResourceFieldContract
{

    /**
     * Get the form fields for the address resource.
     *
     * @return array<int, mixed>
     */


    public static function getFields(): array
    {
        return [
            Section::make('Client Information')
                ->schema([
                    Select::make('user_id')
                        ->label('Client Name')
                        ->createOptionForm(UserResourceForm::getFields())
                        ->editOptionForm(UserResourceForm::getFields())
                        ->relationship('user', 'name', function ($query) {
                            $query->where('role', 'client')
                                ->whereDoesntHave('client');
                        })
                        ->searchable()
                        ->preload()
                        ->required()
                        ->hidden(fn(Get $get) => $get('id')),
        
                    Select::make('client_type')
                        ->label('Client Type')
                        ->options([
                            'company' => 'Company',
                            'individual' => 'Individual',
                        ])
                        ->required()
                        ->native(false)
                        ->helperText('Choose whether the client is an individual or a company.'),
                ])
                ->columns(2),
        
            Section::make('Company Details')
                ->schema([
                    TextInput::make('company_name')
                        ->label('Company Name')
                        ->maxLength(255)
                        ->placeholder('Enter company name'),
        
                    TextInput::make('website')
                        ->label('Company Website')
                        ->maxLength(255)
                        ->placeholder('https://example.com'),
        
                    TextInput::make('tax_name')
                        ->label('Tax Name')
                        ->maxLength(255)
                        ->placeholder('e.g., VAT, GST, etc.'),
        
                    TextInput::make('tax_number')
                        ->label('Tax Number')
                        ->maxLength(255)
                        ->placeholder('Enter tax number'),
        
                    TextInput::make('pan-vat_number')
                        ->label('PAN/VAT Number')
                        ->maxLength(255)
                        ->placeholder('Enter PAN or VAT number'),
                ])
                ->columns(2),
        
            Section::make('Address Details')
                ->schema([
                    TextInput::make('company_address')
                        ->label('Company Address')
                        ->maxLength(255)
                        ->placeholder('Enter company address'),
        
                    TextInput::make('shipping_address')
                        ->label('Shipping Address')
                        ->maxLength(255)
                        ->placeholder('Enter shipping address'),
        
                    TextInput::make('postal_code')
                        ->label('Postal Code')
                        ->maxLength(255)
                        ->placeholder('Enter postal code'),
                ])
                ->columns(2),
        
            Section::make('Additional Information')
                ->schema([
                    RichEditor::make('notes')
                        ->label('Additional Notes')
                        ->helperText('Please provide any additional information about the client.')
                        ->maxLength(255),
                ]),
        ];
        
    }
}
