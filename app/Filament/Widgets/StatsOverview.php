<?php

namespace App\Filament\Widgets;

use App\Models\Locacao;
use App\Models\Roupa;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        $roupasDisponiveis = Roupa::where('estado', 'disponivel')->count();
        $roupasAlugadas = Roupa::where('estado', 'alugada')->count();
        $locacoesAtivas = Locacao::where('estado', 'ativa')->count();
        $locacoesAtrasadas = Locacao::where('estado', 'atrasada')
            ->orWhere(function($query) {
                $query->where('estado', 'ativa')
                      ->where('data_devolucao', '<', now())
                      ->whereNotNull('data_devolucao');
            })
            ->count();
        
        return [
            Stat::make('Peças Disponíveis', $roupasDisponiveis)
                ->description('Roupas prontas para locação')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
            
            Stat::make('Peças Alugadas', $roupasAlugadas)
                ->description('Roupas em uso')
                ->descriptionIcon('heroicon-o-shopping-bag')
                ->color('warning'),
            
            Stat::make('Locações Ativas', $locacoesAtivas)
                ->description('Em andamento')
                ->descriptionIcon('heroicon-o-clock')
                ->color('info'),
            
            Stat::make('Locações Atrasadas', $locacoesAtrasadas)
                ->description('Requerem atenção')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color('danger'),
        ];
    }
}
