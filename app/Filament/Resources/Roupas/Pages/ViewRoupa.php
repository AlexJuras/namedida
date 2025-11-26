<?php

namespace App\Filament\Resources\Roupas\Pages;

use App\Filament\Resources\Roupas\RoupaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRoupa extends ViewRecord
{
    protected static string $resource = RoupaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
