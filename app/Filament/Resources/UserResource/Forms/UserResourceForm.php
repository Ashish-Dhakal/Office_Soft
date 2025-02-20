<?php

namespace App\Filament\Resources\UserResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

final class UserResourceForm implements ResourceFieldContract
{

    /**
     * Get the form fields for the address resource.
     *
     * @return array<int, mixed>
     */


    public static function getFields(): array
    {
        return [
            // Personal Information Section
            Split::make([
                Section::make('Personal Information')
                    ->schema([
                        Select::make('salutation')
                            ->options([
                                'Mr' => 'Mr',
                                'Mrs' => 'Mrs',
                                'Miss' => 'Miss',
                                'Er' => 'Er',
                                'Dr' => 'Dr',
                            ])
                            ->label('Salutation')
                            ->required(),

                        FileUpload::make('avatar')
                            ->directory('user_image')
                            ->image()
                            ->previewable()
                            ->label('Profile Picture'),

                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        // Select::make('role')
                        //     ->options([
                        //         'client' => 'Client',
                        //         'employee' => 'Employee',
                        //         'admin' => 'Admin',
                        //     ])
                        //     ->required()
                        //     ->label('Role')
                        //     ->placeholder('Select a role'),
                        Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable(),

                       

                        TextInput::make('password')
                            ->password()
                            ->maxLength(255)
                            ->required(fn($context) => $context === 'create')
                            ->dehydrated(fn($context) => $context === 'create'),
                    ])
                    ->columns(2),
            ])->from('md'),

            // Contact & Address Section
            Split::make([
                Section::make('Contact & Address')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('phone')
                                ->tel()
                                ->maxLength(20)
                                ->label('Phone Number')
                                ->columnSpan(1),

                            Select::make('gender')
                                ->options([
                                    'male' => 'Male',
                                    'female' => 'Female',
                                ])
                                ->required()
                                ->label('Gender')
                                ->columnSpan(1),
                        ]),

                        TextInput::make('address_1')
                            ->maxLength(255)
                            ->label('Address 1'),

                        TextInput::make('address_2')
                            ->maxLength(255)
                            ->label('Address 2')
                            ->nullable(),

                        Grid::make(3)->schema([
                            TextInput::make('city')->maxLength(100)->label('City')->columnSpan(1),
                            TextInput::make('state')->maxLength(100)->label('State')->columnSpan(1),
                            TextInput::make('zip')->maxLength(10)->label('ZIP Code')->columnSpan(1),
                        ]),

                        TextInput::make('country')
                            ->maxLength(100)
                            ->label('Country'),
                    ])
                    ->columns(2),
            ])->from('md'),

            // Additional Settings Section
            Section::make('Additional Settings')
                ->schema([
                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),
                    Toggle::make('receive_emails')
                        ->label('Receive Mail')
                        ->default(true),
                ])
                ->columns(4),
        ];
    }
}
