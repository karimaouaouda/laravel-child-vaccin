<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\OwnerResource\Pages;
use App\Filament\Admin\Resources\OwnerResource\RelationManagers;
use App\Models\Owner;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OwnerResource extends Resource
{
    protected static ?string $model = Owner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('parent name'),
                Forms\Components\TextInput::make('email')
                    ->label('parent email'),
                Forms\Components\TextInput::make('email_verified_at')
                    ->label('parent email'),

            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
                ->join('users', 'users.id', '=', 'owners.user_id')
                ->where('users.role', '=', 'owner')
                ->orderBy('users.id');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->label('id'),
                Tables\Columns\TextColumn::make('name')
                    ->label('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->badge()
                    ->label('email verified'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('children')
                    ->action(function(Owner $record){
                        redirect()->to("https://vaccin.test/app/owners/{$record->user_id}/children");
                    })

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListOwners::route('/'),
            //'create' => Pages\CreateOwner::route('/create'),
            //'edit' => Pages\EditOwner::route('/{record}/edit'),
            'children' => Pages\Children::route('/{record}/children')
        ];
    }
}
