<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Project;
use App\Models\Ticket;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;


class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('project_id')
                    ->label('Project')
                    ->options(Project::all()->pluck('title', 'id')->toArray())
                    ->required(),

                TextInput::make('ticket_title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'closed' => 'Closed',
                        'pending' => 'Pending',
                        'resolved' => 'Resolved',
                    ])
                    ->required(),
                Select::make('priority')
                    ->options([
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                    ])
                    ->required(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('attachment')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->heading('Clients')
            // ->description('Manage your clients here.')
            // ->header(view('tables.header', [
            //     'heading' => 'Clients',
            // ]))
            ->columns([
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('C.Name'),
                Tables\Columns\TextColumn::make('project.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('creator_role')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ticket_title')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('priority'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('attachment')
                    ->limit(30)
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
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'view' => Pages\ViewTicket::route('/{record}'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
