<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppreciationAwardResource\Pages;
use App\Filament\Resources\AppreciationAwardResource\RelationManagers;
use App\Models\AppreciationAward;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppreciationAwardResource extends Resource
{
    protected static ?string $model = AppreciationAward::class;

    protected static ?string $navigationGroup = 'Human Resource';

    protected static ?string $navigationLabel = 'App. Awards';

    // protected static bool $shouldRegisterNavigation = false;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::$model::count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Total Appreciation Awards';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(40)
                    ->searchable(),
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
            'index' => Pages\ListAppreciationAwards::route('/'),
            // 'create' => Pages\CreateAppreciationAward::route('/create'),
            // 'view' => Pages\ViewAppreciationAward::route('/{record}'),
            // 'edit' => Pages\EditAppreciationAward::route('/{record}/edit'),
        ];
    }
}
