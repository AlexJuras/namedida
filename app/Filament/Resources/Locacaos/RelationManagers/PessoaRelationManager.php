<?php

namespace App\Filament\Resources\Locacaos\RelationManagers;

use App\Filament\Resources\Pessoas\PessoaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class PessoaRelationManager extends RelationManager
{
    protected static string $relationship = 'pessoa';

    protected static ?string $relatedResource = PessoaResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
