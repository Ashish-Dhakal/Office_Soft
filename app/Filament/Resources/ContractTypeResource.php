<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContractTypeResource\Forms\ContractTypeResourceForm;
use App\Filament\Resources\ContractTypeResource\Pages;
use App\Filament\Resources\ContractTypeResource\RelationManagers;
use App\Models\ContractType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractTypeResource extends Resource
{
    protected static ?string $model = ContractType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(ContractTypeResourceForm::getFields());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListContractTypes::route('/'),
            'create' => Pages\CreateContractType::route('/create'),
            'view' => Pages\ViewContractType::route('/{record}'),
            'edit' => Pages\EditContractType::route('/{record}/edit'),
        ];
    }
}
