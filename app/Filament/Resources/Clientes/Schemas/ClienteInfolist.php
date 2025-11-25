<?php

namespace App\Filament\Resources\Clientes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClienteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nome')
                    ->label('Nome Completo')
                    ->columnSpan(2),
                
                TextEntry::make('cpf')
                    ->label('CPF'),
                
                TextEntry::make('data_nascimento')
                    ->label('Data de Nascimento')
                    ->date('d/m/Y')
                    ->placeholder('Não informado'),
                
                TextEntry::make('telefone')
                    ->label('Telefone')
                    ->icon('heroicon-o-phone'),
                
                TextEntry::make('email')
                    ->label('E-mail')
                    ->icon('heroicon-o-envelope')
                    ->copyable()
                    ->columnSpan(2),
                
                TextEntry::make('endereco')
                    ->label('Endereço')
                    ->icon('heroicon-o-map-pin')
                    ->columnSpan('full'),
                
                TextEntry::make('observacoes')
                    ->label('Observações')
                    ->placeholder('Nenhuma observação registrada')
                    ->columnSpan('full'),
                
                TextEntry::make('created_at')
                    ->label('Cadastrado em')
                    ->dateTime('d/m/Y H:i'),
                
                TextEntry::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->columns(3);
    }
}
