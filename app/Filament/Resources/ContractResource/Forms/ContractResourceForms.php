<?php

namespace App\Filament\Resources\ContractResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use App\Filament\Resources\ContractTypeResource\Forms\ContractTypeResourceForm;
use App\Models\Client;
use App\Models\Contract;
use App\Models\ContractType;
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
                    ->readOnly()
                    ->default(fn() => Contract::generateContractNumber()),
               TextInput::make('subject')
                    ->required()
                    ->maxLength(255),

               Select::make('project_id')
                    ->label('Project Name')
                    ->options(Project::all()->pluck('title', 'id')->toArray())
                    ->searchable()
                    ->required(),
               Select::make('client_id')
                    ->label('Client Name')
                    ->options(Client::all()->pluck('user.name', 'id')->toArray())
                    ->searchable()
                    ->required(),

               Select::make('contract_type_id')
                    ->label('Contract Type Name')
                    ->options(ContractType::all()->pluck('name', 'id')->toArray()),
               RichEditor::make('description')
                    ->columnSpanFull(),
               RichEditor::make('notes')
                    ->columnSpanFull(),
               Select::make('payment_terms')
                    ->label('Payment Terms')
                    ->options([
                         'monthly' => 'Monthly',
                         'milestone' => 'Milestone',
                         'lump_sum' => 'Lump Sum',
                    ])
                    ->required(),
               TextInput::make('total_value')
                    ->numeric(),
               DatePicker::make('contract_start_date')
                    ->native(false)
                    ->required(),
               DatePicker::make('contract_end_date')
                    ->native(false)
                    ->after('contract_start_date'),
               Select::make('status')
                    ->label('Contract Status')
                    ->options([
                         'pending' => 'Pending',
                         'active' => 'Active',
                         'completed' => 'Completed',
                         'terminated' => 'Terminated',
                         'expired' => 'Expired',
                    ])
                    ->required(),
          ];
     }
}
