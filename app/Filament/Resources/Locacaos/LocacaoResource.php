<?php

namespace App\Filament\Resources\Locacaos;

use App\Filament\Resources\Locacaos\Pages\CreateLocacao;
use App\Filament\Resources\Locacaos\Pages\EditLocacao;
use App\Filament\Resources\Locacaos\Pages\ListLocacaos;
use App\Filament\Resources\Locacaos\Pages\ViewLocacao;
use App\Filament\Resources\Locacaos\Schemas\LocacaoForm;
use App\Filament\Resources\Locacaos\Schemas\LocacaoInfolist;
use App\Filament\Resources\Locacaos\Tables\LocacaosTable;
use App\Models\Locacao;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LocacaoResource extends Resource
{
    protected static ?string $model = Locacao::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $navigationLabel = 'Locações';

    protected static ?string $modelLabel = 'Locação';

    protected static ?string $pluralModelLabel = 'Locações';

    public static function form(Schema $schema): Schema
    {
        return LocacaoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LocacaoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LocacaosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PessoaRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLocacaos::route('/'),
            'create' => CreateLocacao::route('/create'),
            'view' => ViewLocacao::route('/{record}'),
            'edit' => EditLocacao::route('/{record}/edit'),
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
