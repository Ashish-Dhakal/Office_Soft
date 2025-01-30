<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource\Tables\EmployeeResourceTable;
use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns(EmployeeResourceTable::getFields())
            ->filters([
                SelectFilter::make('department')->relationship('department', 'name'),
                SelectFilter::make('position')->relationship('position', 'title'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->label(''),
                Tables\Actions\EditAction::make()
                ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
