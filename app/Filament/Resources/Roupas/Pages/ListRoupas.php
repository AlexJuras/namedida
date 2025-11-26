<?php

namespace App\Filament\Resources\Roupas\Pages;

use App\Filament\Resources\Roupas\RoupaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRoupas extends ListRecords
{
    protected static string $resource = RoupaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
