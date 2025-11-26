<?php

namespace App\Filament\Resources\Roupas\RelationManagers;

use App\Filament\Resources\Locacaos\LocacaoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class LocacaosRelationManager extends RelationManager
{
    protected static string $relationship = 'locacaos';

    protected static ?string $relatedResource = LocacaoResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
