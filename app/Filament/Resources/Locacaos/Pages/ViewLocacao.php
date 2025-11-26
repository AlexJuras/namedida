<?php

namespace App\Filament\Resources\Locacaos\Pages;

use App\Filament\Resources\Locacaos\LocacaoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLocacao extends ViewRecord
{
    protected static string $resource = LocacaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
