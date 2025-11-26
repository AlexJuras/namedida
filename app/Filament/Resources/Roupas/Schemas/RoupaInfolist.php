<?php

namespace App\Filament\Resources\Roupas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RoupaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('tipo'),
                TextEntry::make('tamanho'),
                TextEntry::make('cor')
                    ->placeholder('-'),
                TextEntry::make('material')
                    ->placeholder('-'),
                TextEntry::make('marca')
                    ->placeholder('-'),
                TextEntry::make('preco')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('estado')
                    ->badge(),
                TextEntry::make('observacoes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
