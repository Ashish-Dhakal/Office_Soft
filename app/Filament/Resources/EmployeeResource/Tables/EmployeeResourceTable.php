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
            Tables\Columns\ImageColumn::make('user.avatar')
                ->label('Employee Name'),
            Tables\Columns\TextColumn::make('user.name')
                ->label('Employee Name')
                ->searchable(),
            Tables\Columns\TextColumn::make('department.name')
                ->numeric()
                ->searchable(),
            Tables\Columns\TextColumn::make('position.title')
                ->label('Position Title')
                ->searchable(),
            Tables\Columns\TextColumn::make('reportingTo.user.name')
                ->label('Reporting To')
                ->searchable()
                ->sortable()
                ->getStateUsing(fn($record) => optional($record->reportingTo?->user)->name ?? '-'),

            Tables\Columns\IconColumn::make('is_active')
                ->label('Is Active')
                ->boolean()
                ->searchable(),
            Tables\Columns\IconColumn::make('receive_mail')
                ->label('Receive Mail')
                ->boolean()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('hire_date')
                ->date()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('dob')
                ->label('Date of Birth')
                ->date()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('gender')
                ->label('Gender')
                ->badge()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('slack_id')
                ->label('Slack ID')
                ->badge()
                ->getStateUsing(fn($record) => $record->slack_id ?? '-')
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('discord_id')
                ->label('Discord ID')
                ->badge()
                ->getStateUsing(fn($record) => $record->discord_id ?? '-')
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('employee_type')
                ->label('Contract Type')
                ->badge(),
            Tables\Columns\TextColumn::make('address')
                ->limit(10)
                ->toggleable(isToggledHiddenByDefault: true),
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
