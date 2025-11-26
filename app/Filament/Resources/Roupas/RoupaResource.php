<?php

namespace App\Filament\Resources\Roupas;

use App\Filament\Resources\Roupas\Pages\CreateRoupa;
use App\Filament\Resources\Roupas\Pages\EditRoupa;
use App\Filament\Resources\Roupas\Pages\ListRoupas;
use App\Filament\Resources\Roupas\Pages\ViewRoupa;
use App\Filament\Resources\Roupas\Schemas\RoupaForm;
use App\Filament\Resources\Roupas\Schemas\RoupaInfolist;
use App\Filament\Resources\Roupas\Tables\RoupasTable;
use App\Models\Roupa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoupaResource extends Resource
{
    protected static ?string $model = Roupa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return RoupaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RoupaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RoupasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\LocacaosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRoupas::route('/'),
            'create' => CreateRoupa::route('/create'),
            'view' => ViewRoupa::route('/{record}'),
            'edit' => EditRoupa::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
