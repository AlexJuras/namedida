<?php

namespace App\Filament\Resources\Pessoas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PessoaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                DatePicker::make('data_nascimento')
                    ->required(),
                Select::make('sexo')
                    ->options(['masculino' => 'Masculino', 'feminino' => 'Feminino', 'outro' => 'Outro']),
                TextInput::make('busto')
                    ->numeric(),
                TextInput::make('cintura')
                    ->numeric(),
                TextInput::make('quadril')
                    ->numeric(),
                TextInput::make('altura')
                    ->numeric(),
                TextInput::make('ombro')
                    ->numeric(),
                TextInput::make('comprimento_vestido')
                    ->numeric(),
            ]);
    }
}
