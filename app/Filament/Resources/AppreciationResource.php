<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppreciationResource\Pages;
use App\Filament\Resources\AppreciationResource\RelationManagers;
use App\Models\Appreciation;
use App\Models\AppreciationAward;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppreciationResource extends Resource
{
    protected static ?string $model = Appreciation::class;

    protected static ?string $navigationGroup = 'Human Resource';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::$model::count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Total Appreciation';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('employee_id')
                    ->label('Employee Name')
                    ->options(Employee::all()->pluck('user.name', 'id')->toArray())
                    ->required(),
                Select::make('appreciation_award_id')
                    ->options(AppreciationAward::all()->pluck('title', 'id')->toArray())
                    ->required(),
                TextInput::make('description')
                    ->required()
                    ->maxLength(50),
                DatePicker::make('given_date')
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('appreciation_award.title')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('given_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAppreciations::route('/'),
            'create' => Pages\CreateAppreciation::route('/create'),
            'view' => Pages\ViewAppreciation::route('/{record}'),
            'edit' => Pages\EditAppreciation::route('/{record}/edit'),
        ];
    }
}
