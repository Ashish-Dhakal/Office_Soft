<?php

namespace App\Filament\Resources\ContractResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

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
                    ->maxLength(255),
               TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
               TextInput::make('project_id')
                   
                    
                    ->required()
                    ->numeric(),
               TextInput::make('client_id')
                    ->required()
                    ->numeric(),
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
