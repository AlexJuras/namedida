<?php

namespace App\Filament\Resources\Locacaos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LocacaoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pessoa_id')
                    ->label('Pessoa')
                    ->relationship('pessoa', 'nome')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                Select::make('roupa_id')
                    ->label('Roupa')
                    ->relationship('roupa', 'codigo')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                DatePicker::make('data_locacao')
                    ->label('Data de Locação')
                    ->required()
                    ->default(now()),
                
                DatePicker::make('data_devolucao')
                    ->label('Data de Devolução'),
                
                TextInput::make('valor_total')
                    ->label('Valor Total')
                    ->required()
                    ->numeric()
                    ->prefix('R$')
                    ->step(0.01),
                
                Select::make('estado')
                    ->label('Estado')
                    ->options(['ativa' => 'Ativa', 'concluida' => 'Concluída', 'atrasada' => 'Atrasada'])
                    ->default('ativa')
                    ->required(),
                
                Textarea::make('observacoes')
                    ->label('Observações')
                    ->rows(3)
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
