<?php

namespace App\Filament\Resources\ContractResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

final class ContractResourceForms implements ResourceFieldContract
{

     /**
      * Get the form fields for the address resource.
      *
      * @return array<int, mixed>
      */


     public static function getFields(): array
     {
          return [
               TextInput::make('contract_number')
                    ->required()
                    ->prefix('Soft-')
                    ->suffix('-Contract')
                    ->maxLength(255),
               TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
               // Select::make('project_id')
               //      ->label('Project Name')
               //      ->required()
               //      //displat the project title instead of id
               //      ->options(Project::all()->pluck('title', 'id')->toArray()),
               // Select::make('client_id')
               //      ->required()
               //      ->label('Client Name')
               //      ->options(Client::all()->pluck('name', 'id')->toArray()),
               Select::make('project_id')
               ->label('Project Name')
               ->live()
               ->preload()
               ->searchable()
               ->relationship('project', 'title')
               ->afterStateUpdated(function(Set $set){
                    $set('client_id', null);
               }),
               Select::make('client_id')
               ->label('Client Name')
               ->live()
               ->preload()
               ->searchable()
               ->relationship('client', 'name')
               ->options(fn(Get $get) => Client::query()
               ->where('project_id', $get('project_id')) // Filter clients based on the selected project
               ->pluck('name', 'id') // Plucks client names and their IDs
               ->toArray()) ,
               TextInput::make('contract_type_id')
                    ->label('Contract Type Name'),
               // ->createOptionForm(ContractTypeResourceForm::getFields())
               // ->editOptionForm(ContractTypeResourceForm::getFields()),
               RichEditor::make('description')
                    ->columnSpanFull(),
               RichEditor::make('notes')
                    ->columnSpanFull(),
               TextInput::make('payment_terms')
                    ->required(),
               TextInput::make('total_value')
                    ->numeric(),
               DatePicker::make('contract_start_date')
                    ->required(),
               DatePicker::make('contract_end_date'),
               TextInput::make('status')
                    ->required(),
          ];
     }
}
