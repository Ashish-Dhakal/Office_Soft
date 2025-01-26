<?php

namespace App\Filament\Resources\EmployeeResource\Tables;


use App\Filament\Contracts\ResourceFieldContract;
use Filament\Tables;

final class EmployeeResourceTable implements ResourceFieldContract
{

        /**
     * Get the form fields for the address resource.
     *
     * @return array<int, mixed>
     */
    public static function getFields(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                    ->label('Employee Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->numeric()
                    ->searchable(),
                Tables\Columns\TextColumn::make('position.title')
                    ->label('Position Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hire_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('dob')
                    ->label('Date of Birth')
                    ->date(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->badge(),
                Tables\Columns\TextColumn::make('employee_type')
                    ->label('Contract Type')
                    ->badge(),
                Tables\Columns\TextColumn::make('address')
                ->limit(10),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}