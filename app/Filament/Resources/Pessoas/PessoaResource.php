<?php

namespace App\Filament\Resources\Pessoas;

use App\Filament\Resources\Pessoas\Pages\CreatePessoa;
use App\Filament\Resources\Pessoas\Pages\EditPessoa;
use App\Filament\Resources\Pessoas\Pages\ListPessoas;
use App\Filament\Resources\Pessoas\Pages\ViewPessoa;
use App\Filament\Resources\Pessoas\Schemas\PessoaForm;
use App\Filament\Resources\Pessoas\Schemas\PessoaInfolist;
use App\Filament\Resources\Pessoas\Tables\PessoasTable;
use App\Models\Pessoa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PessoaResource extends Resource
{
    protected static ?string $model = Pessoa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    public static function form(Schema $schema): Schema
    {
        return PessoaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PessoaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PessoasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPessoas::route('/'),
            'create' => CreatePessoa::route('/create'),
            'view' => ViewPessoa::route('/{record}'),
            'edit' => EditPessoa::route('/{record}/edit'),
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
