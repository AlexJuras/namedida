<?php

namespace App\Filament\Resources\Locacaos\Pages;

use App\Filament\Resources\Locacaos\LocacaoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLocacaos extends ListRecords
{
    protected static string $resource = LocacaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
