<?php

namespace App\Filament\Resources\Pessoas\RelationManagers;

use App\Filament\Resources\Pessoas\PessoaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class PessoasRelationManager extends RelationManager
{
    protected static string $relationship = 'pessoas';

    protected static ?string $relatedResource = PessoaResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
