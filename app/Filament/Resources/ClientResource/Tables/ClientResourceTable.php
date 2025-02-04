<?php

namespace App\Filament\Resources\ClientResource\Tables;

use App\Filament\Contracts\ResourceFieldContract;
use Filament\Tables\Columns\TextColumn;

final class ClientResourceTable implements ResourceFieldContract
{

    /**
     * Get the form fields for the address resource.
     *
     * @return array<int, mixed>
     */
    public static function getFields(): array
    {
        return [
            TextColumn::make('user.name')
                ->label('Client Name')
                ->sortable(),
            TextColumn::make('company_name')
                ->searchable(),
            TextColumn::make('client_type'),
            TextColumn::make('website')
                ->searchable(),
            TextColumn::make('tax_name')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('tax_number')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('pan-vat_number')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('company_address')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('shipping_address')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('postal_code')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('notes')
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
