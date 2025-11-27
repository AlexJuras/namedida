<?php

namespace App\Filament\Widgets;

use App\Models\Locacao;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LocacoesProximasDevolucao extends TableWidget
{
    protected static ?int $sort = 4;
    
    protected static ?string $heading = 'Locações Próximas da Devolução';
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Locacao::query()
                    ->where('estado', 'ativa')
                    ->whereNotNull('data_devolucao')
                    ->whereBetween('data_devolucao', [now(), now()->addDays(7)])
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
                    ->sortable(),
                
                TextColumn::make('pessoa.cliente.telefone')
                    ->label('Telefone')
                    ->icon('heroicon-o-phone')
                    ->copyable(),
                
                TextColumn::make('roupa.codigo')
                    ->label('Código Roupa')
                    ->sortable(),
                
                TextColumn::make('data_devolucao')
                    ->label('Data Devolução')
                    ->date('d/m/Y')
                    ->sortable()
                    ->badge()
                    ->color(fn ($record) => $record->data_devolucao->diffInDays(now()) <= 2 ? 'warning' : 'success'),
                
                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ativa' => 'info',
                        'concluida' => 'success',
                        'atrasada' => 'danger',
                    }),
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
