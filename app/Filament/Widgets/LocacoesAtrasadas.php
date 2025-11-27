<?php

namespace App\Filament\Widgets;

use App\Models\Locacao;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LocacoesAtrasadas extends TableWidget
{
    protected static ?int $sort = 2;
    
    protected static ?string $heading = '⚠️ Locações Atrasadas - Ação Necessária';
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Locacao::query()
                    ->where(function($query) {
                        $query->where('estado', 'atrasada')
                              ->orWhere(function($q) {
                                  $q->where('estado', 'ativa')
                                    ->where('data_devolucao', '<', now())
                                    ->whereNotNull('data_devolucao');
                              });
                    })
                    ->orderBy('data_devolucao', 'asc')
            )
            ->columns([
                TextColumn::make('pessoa.nome')
                    ->label('Pessoa')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('pessoa.cliente.nome')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                TextColumn::make('pessoa.cliente.telefone')
                    ->label('Telefone')
                    ->icon('heroicon-o-phone')
                    ->copyable()
                    ->weight('bold'),
                
                TextColumn::make('pessoa.cliente.email')
                    ->label('E-mail')
                    ->icon('heroicon-o-envelope')
                    ->copyable(),
                
                TextColumn::make('roupa.codigo')
                    ->label('Código Roupa')
                    ->sortable(),
                
                TextColumn::make('data_devolucao')
                    ->label('Deveria ter devolvido')
                    ->date('d/m/Y')
                    ->sortable()
                    ->badge()
                    ->color('danger')
                    ->description(fn ($record) => $record->data_devolucao ? now()->diffInDays($record->data_devolucao) . ' dias de atraso' : 'Sem data definida'),
                
                TextColumn::make('valor_total')
                    ->label('Valor')
                    ->money('BRL')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
