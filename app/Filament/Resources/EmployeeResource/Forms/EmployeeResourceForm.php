<?php

namespace App\Filament\Resources\EmployeeResource\Forms;

use App\Enums\EmployeeGender;
use App\Enums\EmployeeTypeEnum;
use App\Filament\Contracts\ResourceFieldContract;
use App\Filament\Resources\UserResource\Forms\UserResourceForm;
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
use Illuminate\Support\Facades\Blade;

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
                        Select::make('user_id')
                            ->label('Employee Name')
                            ->createOptionForm(UserResourceForm::getFields())
                            ->editOptionForm(UserResourceForm::getFields())
                            // ->relationship('user', 'name', function ($query) {
                            //     $query->where('role', 'employee')
                            //         ->whereDoesntHave('employee');
                            // })
                            ->required()
                            ->hidden(fn(Get $get) => $get('id')),
                        Select::make('employee_type')
                            ->label('Employee Contract Type')
                            ->options(
                                collect(EmployeeTypeEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->getLabel()])->toArray()
                            )
                            ->required(),
                        DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->native(false)
                            // ->suffixIcon('bi-calendar-event')
                            ->required(),
                        DatePicker::make('hire_date')
                            ->label('Hire Date')
                            ->minDate(now()->toDateString())
                            ->native(false)
                            // ->suffixIcon('bi-calendar-event')
                            ->required(),
                    ])
                    ->columns(2),
            ])->from('md'),

            // Employee Department Details Section
            Split::make([
                Section::make('Employee Department Details')
                    ->schema([
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
                        TextInput::make('discord_id')
                            ->label('Discord ID'),
                        // ->suffixIcon('bi-discord'),
                        TextInput::make('slack_id')
                            ->label('Slack ID'),
                        // ->suffixIcon('bi-slack'),
                    ])
                    ->columns(2),
            ])->from('md'),

            // Toggle fields section (at the bottom of the form)
            Section::make('Reporting TO')
                ->schema([
                    // Reporting To toggle and select fields
                    Toggle::make('enable_reporting_to')
                        ->label('Enable Reporting To')
                        ->reactive(),  // This makes the checkbox toggle the select field
                    Select::make('reporting_to')
                        ->label('')
                        ->options(fn() => Employee::with('user')->get()->pluck('user.name', 'id'))
                        ->searchable()
                        ->hidden(fn($get) => ! $get('enable_reporting_to'))
                        ->preload(),
                ])
                ->columns(4),  // Make this section span the full width (single column)
        ];
    }
}
