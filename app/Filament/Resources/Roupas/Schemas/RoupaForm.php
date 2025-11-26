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
                TextInput::make('tipo')
                    ->required(),
                TextInput::make('tamanho')
                    ->required(),
                TextInput::make('cor'),
                TextInput::make('material'),
                TextInput::make('marca'),
                TextInput::make('preco')
                    ->numeric(),
                Select::make('estado')
                    ->options(['disponivel' => 'Disponivel', 'alugada' => 'Alugada', 'manutencao' => 'Manutencao'])
                    ->default('disponivel')
                    ->required(),
                Textarea::make('observacoes')
                    ->columnSpanFull(),
            ]);
    }
}
