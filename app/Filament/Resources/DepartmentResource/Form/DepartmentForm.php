<?php

namespace App\app\Filament\Resources\DepartmentResource\Form;

use Filament\Forms;
use Filament\Forms\Form;

class DepartmentForm
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

}
