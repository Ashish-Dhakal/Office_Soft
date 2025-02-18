<?php

namespace App\Filament\Resources;

use App\Enums\ProjectStatusEnum;
use App\Filament\Actions\ColumnAction;
use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Filament\Tables\Columns\StatusActionColumn;
use App\Livewire\ProjectStatusUpdateModal;
use App\Models\Client;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationGroup = 'Work';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::$model::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('project_code')
                    ->label('Project Code')
                    ->readOnly()
                    ->default(fn() => Project::generateProjectNumber()),
                TextInput::make('title')
                    ->required()
                    ->maxLength(20),
                RichEditor::make('project_summary')
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->native(false),
                DatePicker::make('deadline_date')
                    ->native(false),
                Select::make('status')
                    ->options([
                        'planned' => 'Planned',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'on_hold' => 'On Hold',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
                TextInput::make('budget')
                    // ->suffixIcon('bi-currency-dollar')
                    ->placeholder('Rs. 0.00')
                    ->numeric(),
                TextInput::make('actual_cost')
                    ->numeric(),
                Select::make('client_id')
                    ->label('Client Name')
                    ->options(
                        Client::with('user')
                            ->get()
                            ->mapWithKeys(function ($client) {
                                return [
                                    $client->id => $client->user->name . ' (' . $client->company_name . ')'
                                ];
                            })
                            ->toArray()
                    )
                    ->required()
                    ->searchable(),
                RichEditor::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project_code')
                    ->label('P.Code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('deadline_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('deadline_date')
                    ->date()
                    ->sortable(),
                // TextColumn::make('status'),

                // StatusActionColumn::make('status')
                // ->actions(function ($record) {
                //     return [
                //         ColumnAction::make('edit_status')
                //             ->color($record->status->getColor())
                //             ->arguments([
                //                 'projectId' => $record->id,
                //                 'currentStatus' => $record->status,
                //             ])
                //             ->tooltip('Change Status')
                //             ->icon('heroicon-o-pencil')
                //             ->size('xs')
                //             ->eventName('openProjectStatusModal') // Make sure this matches
                //             // ->component(ProjectStatusUpdateModal::class),
                //     ];
                // }),


                ViewColumn::make('status')
                ->label('Status')
                ->view('tables.columns.hello'),
            
            
            




                TextColumn::make('budget')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('budget')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('client.user.name')
                    ->label('Client Name')
                    ->searchable(),
                IconColumn::make('project_notification')
                    ->label('Notification')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('task_board')
                    ->label('Task Board')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('gannt_chart')
                    ->label('Gannt Chart')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
