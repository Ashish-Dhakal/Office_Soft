<?php

namespace App\Filament\Resources\UserResource\Tables;

use Filament\Tables\Columns\TextColumn;
use App\Filament\Contracts\ResourceFieldContract;
use App\Filament\Resources\EmployeeResource;
use App\Filament\Tables\Columns\LinkColumn;
use Filament\Tables\Columns\IconColumn;
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
                            <img src='{$avatar}' alt='Avatar' style='width: 32px; height: 32px; border-radius: 50%; object-fit: cover;'>
                            <span style='font-weight: bold;'>{$record->salutation}.</span>
                            <span>{$record->name}</span>
                        </div>";
                })
                ->html()
                ->searchable(),

            // LinkColumn::make('name')
            //     ->label('Users')
            //     ->formatStateUsing(function ($record) {
            //         $avatar = $record->avatar
            //             ? asset('storage/' . $record->avatar)
            //             : asset('assets/suffix-image/slack.png');

            //         return "<div style='display: flex; align-items: center; gap: 8px;'>
            //         <img src='{$avatar}' alt='Avatar' 
            //             style='width: 32px; height: 32px; border-radius: 50%; object-fit: cover;'>
            //         <span style='font-weight: bold;'>{$record->salutation}.</span>
            //         <span>{$record->name}</span>
            //     </div>";
            //     })
            //     ->url(fn($record) => route('filament.admin.resources.users.view', ['record' => $record->id]))
            //     ->html()
            //     ->sortable()
            //     ->searchable(),
          


            TextColumn::make('email')
                ->searchable(),

            TextColumn::make('role')
                ->searchable()
                ->badge(),

            TextColumn::make('phone')
                ->label('Phone')
                ->searchable(),

            TextColumn::make('address_1')
                ->label('address_1')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('address_2')
                ->label('address_2')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('city')
                ->label('City')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('state')
                ->label('State')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('country')
                ->label('Country')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('zip')
                ->label('Zip Code')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('gender')
                ->label('Gender')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),


            IconColumn::make('is_active')
                ->label('Is Active')
                ->boolean()
                ->searchable(),
            IconColumn::make('receive_emails')
                ->label('Receive Emails')
                ->boolean()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),


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
