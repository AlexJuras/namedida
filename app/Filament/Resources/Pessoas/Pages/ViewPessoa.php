<?php

namespace App\Filament\Resources\Pessoas\Pages;

use App\Filament\Resources\Pessoas\PessoaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPessoa extends ViewRecord
{
    protected static string $resource = PessoaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
