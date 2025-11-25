<?php

namespace App\Filament\Resources\Pessoas\Schemas;

use App\Models\Pessoa;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PessoaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nome'),
                TextEntry::make('data_nascimento')
                    ->date(),
                TextEntry::make('sexo')
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('busto')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('cintura')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('quadril')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('altura')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('ombro')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('comprimento_vestido')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Pessoa $record): bool => $record->trashed()),
            ]);
    }
}
