<?php

namespace App\Filament\Resources\EmployeeResource\Forms;

use App\Enums\EmployeeGender;
use App\Enums\EmployeeTypeEnum;
use App\Filament\Contracts\ResourceFieldContract;
use App\Models\Employee;
use App\Models\Position;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Toggle;

final class EmployeeResourceForm implements ResourceFieldContract
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
                Section::make('Add Employee Details')
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

                        Select::make('user_id')
                            ->label('Employee Name')
                            ->relationship('user', 'name', function ($query) {
                                $query->where('role', 'employee')
                                    ->whereDoesntHave('employee');
                            })
                            ->required()
                            ->hidden(fn(Get $get) => $get('id')),

                        TextInput::make('address')
                            ->label('Address')
                            ->placeholder('Address')
                            ->required(),

                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->placeholder('9876543212')
                            ->tel()
                            ->minLength(10)
                            ->maxLength(10)
                            ->required(),

                        DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->native(false)
                            ->required(),

                        Select::make('gender')
                            ->label('Gender')
                            ->options(
                                collect(EmployeeGender::cases())->mapWithKeys(fn($case) => [$case->value => $case->getLabel()])->toArray()
                            )
                            ->required(),
                    ])
                    ->columns(2),
            ])->from('md'),

            // Employee Department Details Section
            Split::make([
                Section::make('Employee Department Details')
                    ->schema([
                        Select::make('employee_type')
                            ->label('Employee Contract Type')
                            ->options(
                                collect(EmployeeTypeEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->getLabel()])->toArray()
                            )
                            ->required(),

                        Select::make('department_id')
                            ->label('Department Name')
                            ->live()
                            ->preload()
                            ->searchable()
                            ->relationship('department', 'name')
                            ->afterStateUpdated(function (Set $set) {
                                $set('position_id', null);
                            })
                            ->required(),

                        Select::make('position_id')
                            ->label('Position Title')
                            ->required()
                            ->options(fn(Get $get) => Position::query()
                                ->where('department_id', $get('department_id'))
                                ->pluck('title', 'id')
                                ->toArray()) // Convert to an array
                            ->searchable()
                            ->live()
                            ->preload(),



                        Select::make('reporting_to')
                            ->label('Reporting To')
                            ->options(fn() => Employee::with('user')->get()->pluck('user.name', 'id'))
                            ->searchable()
                            ->hidden(fn($get) => ! $get('enable_reporting_to'))
                            ->preload(),

                        DatePicker::make('hire_date')
                            ->label('Hire Date')
                            ->minDate(now()->toDateString())
                            ->native(false)
                            ->required(),

                        // Slack ID and Discord ID fields
                        TextInput::make('slack_id')
                            ->label('Slack ID')
                            ->suffixIcon(fn() => '<img src="' . asset('assets/suffix-image/slack.png') . '" alt="custom icon" class="h-6 w-6" />'),

                        TextInput::make('discord_id')
                            ->label('Discord ID')
                            ->suffixIcon(fn() => '<img src="' . asset('assets/suffix-image/slack.png') . '" alt="custom icon" class="h-6 w-6" />'),
                    ])
                    ->columns(2),
            ])->from('md'),

            // Toggle fields section (at the bottom of the form)
            Section::make('Additional Settings')
                ->schema([
                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),

                    Toggle::make('receive_mail')
                        ->label('Receive Mail')
                        ->default(true),

                    // Reporting To toggle and select fields
                    Toggle::make('enable_reporting_to')
                        ->label('Enable Reporting To')
                        ->reactive(),  // This makes the checkbox toggle the select field
                ])
                ->columns(4),  // Make this section span the full width (single column)
        ];
    }
}
