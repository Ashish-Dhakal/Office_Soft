<?php

namespace App\Filament\Resources\EmployeeResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use App\Models\Position;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Split;

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
            Split::make([
                Section::make('Add Employee Details')
                    ->schema([
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
                            ->required(),

                        DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->native(false)
                            ->required(),
                        Select::make('gender')
                            ->label('Gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ])
                            ->required(),
                    ]),

            ])->from('md'),
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
                            ->required()
                            ->options(fn(Get $get) => Position::query()
                                ->where('department_id', $get('department_id'))
                                ->pluck('title', 'id')
                                ->toArray()) // Convert to an array
                            ->searchable()
                            ->live()
                            ->preload(),

                        DatePicker::make('hire_date')
                            ->label('Hire Date')
                            ->minDate(now()->toDateString())
                            ->native(false)
                            ->required(),

                    ])
            ])->from('md')







        ];
    }
}
