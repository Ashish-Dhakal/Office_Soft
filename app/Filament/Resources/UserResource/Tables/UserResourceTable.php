<?php

namespace App\Filament\Resources\UserResource\Tables;

use Filament\Tables\Columns\TextColumn;
use App\Filament\Contracts\ResourceFieldContract;
use Filament\Tables\Columns\ImageColumn;


final class UserResourceTable implements ResourceFieldContract
{

    /**
     * Get the form fields for the address resource.
     *
     * @return array<int, mixed>
     */
    public static function getFields(): array
    {
        return [
            ImageColumn::make('avatar')
                ->getStateUsing(function ($record) {
                    return $record->avatar
                        ? asset('storage/' . $record->avatar)
                        : asset('assets/suffix-image/slack.png'); // Correct path to storage/public
                })
                ->square(),
            TextColumn::make('name')
                ->searchable(),
            TextColumn::make('email')
                ->searchable(),
            TextColumn::make('role')
                ->searchable()
                ->badge(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
