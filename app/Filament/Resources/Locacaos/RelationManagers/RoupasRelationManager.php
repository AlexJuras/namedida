<?php

namespace App\Filament\Resources\Locacaos\RelationManagers;

use App\Filament\Resources\Roupas\RoupaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class RoupasRelationManager extends RelationManager
{
    protected static string $relationship = 'roupas';

    protected static ?string $relatedResource = RoupaResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
