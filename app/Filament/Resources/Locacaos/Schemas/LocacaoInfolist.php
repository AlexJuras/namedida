<?php

namespace App\Filament\Resources\Locacaos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LocacaoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('pessoa_id')
                    ->numeric(),
                TextEntry::make('roupa_id')
                    ->numeric(),
                TextEntry::make('data_locacao')
                    ->date(),
                TextEntry::make('data_devolucao')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('valor_total')
                    ->numeric(),
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
