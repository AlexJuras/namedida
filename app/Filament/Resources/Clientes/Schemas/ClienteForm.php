<?php

namespace App\Filament\Resources\Clientes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClienteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required()
                    ->maxLength(255)
                    ->label('Nome Completo')
                    ->columnSpan(2),
                
                TextInput::make('cpf')
                    ->required()
                    ->mask('999.999.999-99')
                    ->unique(ignoreRecord: true)
                    ->maxLength(14)
                    ->label('CPF'),
                
                DatePicker::make('data_nascimento')
                    ->label('Data de Nascimento')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->maxDate(now()),
                
                TextInput::make('telefone')
                    ->required()
                    ->tel()
                    ->mask('(99) 99999-9999')
                    ->maxLength(15)
                    ->label('Telefone'),
                
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->label('E-mail')
                    ->columnSpan(2),
                
                Textarea::make('endereco')
                    ->required()
                    ->rows(3)
                    ->maxLength(500)
                    ->label('Endereço Completo')
                    ->columnSpan('full'),
                
                Textarea::make('observacoes')
                    ->rows(4)
                    ->maxLength(1000)
                    ->label('Observações')
                    ->columnSpan('full'),
            ])
            ->columns(3);
    }
}
