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
            TextColumn::make('name')
                ->label('Users')
                ->formatStateUsing(function ($record) {
                    $avatar = $record->avatar
                        ? asset('storage/' . $record->avatar)
                        : asset('assets/suffix-image/slack.png');

                    return "<div style='display: flex; align-items: center; gap: 8px;'>
                            <img src='{$avatar}' alt='Avatar'style='width: 32px; height: 32px; border-radius: 50%; object-fit: cover;''>
                            <span>{$record->name}</span>
                        </div>";
                })
                ->html()
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
