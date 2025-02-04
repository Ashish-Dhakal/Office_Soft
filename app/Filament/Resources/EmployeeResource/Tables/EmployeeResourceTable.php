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
                ->label('Employee')
                ->formatStateUsing(function ($record) {
                    $avatar = $record->user->avatar
                        ? asset('storage/' . $record->user->avatar)
                        : asset('assets/suffix-image/slack.png');

                    return "<div style='display: flex; align-items: center; gap: 8px;'>
                    <img src='{$avatar}' alt='Avatar' style='width: 32px; height: 32px; border-radius: 50%; object-fit: cover;'>
                    <span style='font-weight: bold;'>{$record->user->salutation}.</span>
                    <span>{$record->user->name}</span>
                </div>";
                })
                ->html()
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


            Tables\Columns\TextColumn::make('hire_date')
                ->date()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('dob')
                ->label('Date of Birth')
                ->date()
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
