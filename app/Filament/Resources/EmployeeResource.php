<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Position;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Employee Name')
                    ->relationship('user', 'name', function ($query) {
                        $query->where('role', 'employee')
                            ->whereDoesntHave('employee');
                    })
                    ->required()
                      // ->options(
                    //     \App\Models\User::where('role', 'employee')->pluck('name', 'id')->toArray()
                    // )
                    ,
                Forms\Components\Select::make('department_id')
                    ->label('Department Name')
                    ->live()
                    ->preload()
                    ->searchable()
                    ->relationship('department', 'name')
                    ->afterStateUpdated(function (Set $set) {
                        $set('position_id', null);
                    })
                    ->required(),
                Forms\Components\Select::make('position_id')
                    ->required()
                    ->options(fn(Get $get) => Position::query()
                        ->where('department_id', $get('department_id'))
                        ->pluck('title', 'id')
                        ->toArray()) // Convert to an array
                    ->searchable()
                    ->live()
                    ->preload(),
                Forms\Components\Textarea::make('personaldetail')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('emergencycontact')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('hire_date')
                    ->minDate(now()->toDateString())
                    ->native(false)
                    ->required(),
                Forms\Components\DatePicker::make('dob')
                    ->native(false),
                Forms\Components\Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                    ->required()
                    ->rule('in: male,female'),
            ]);

    }

 

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
