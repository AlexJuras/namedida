<?php

namespace App\Filament\Resources\Roupas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RoupaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo')
                    ->label('Código')
                    ->required()
                    ->numeric()
                    ->unique(ignoreRecord: true)
                    ->maxLength(20),
                
                TextInput::make('tipo')
                    ->label('Tipo')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('tamanho')
                    ->label('Tamanho')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('cor')
                    ->label('Cor')
                    ->maxLength(255),
                
                TextInput::make('material')
                    ->label('Material')
                    ->maxLength(255),
                
                TextInput::make('marca')
                    ->label('Marca')
                    ->maxLength(255),
                
                TextInput::make('preco')
                    ->label('Preço')
                    ->numeric()
                    ->prefix('R$')
                    ->step(0.01),
                
                Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'disponivel' => 'Disponível', 
                        'alugada' => 'Alugada', 
                        'manutencao' => 'Manutenção'
                    ])
                    ->default('disponivel')
                    ->required(),
                
                Textarea::make('observacoes')
                    ->label('Observações')
                    ->rows(3)
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
