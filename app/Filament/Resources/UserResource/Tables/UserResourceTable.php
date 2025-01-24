<?php

namespace App\Filament\Resources\UserResource\Tables;

use Filament\Tables\Columns\TextColumn;
use App\Filament\Contracts\ResourceFieldContract;

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