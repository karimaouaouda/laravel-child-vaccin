<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VaccinResource\Pages;
use App\Filament\Admin\Resources\VaccinResource\RelationManagers;
use App\Models\Vaccin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VaccinResource extends Resource
{
    protected static ?string $model = Vaccin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('vaccin name')
                    ->maxLength(50)
                    ->minLength(5)
                    ->required(),

                Forms\Components\TextInput::make('description')
                    ->label('vaccin description')
                    ->maxLength(200)
                    ->minLength(10)
                    ->required(),

                Forms\Components\TextInput::make('age')
                    ->label('vaccin age')
                    ->integer()
                    ->minValue(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('vaccin id')
                    ->prefix('#'),
                Tables\Columns\TextColumn::make('name')
                    ->label('vaccin name'),
                Tables\Columns\TextColumn::make('description')
                    ->label('vaccin description'),
                Tables\Columns\TextColumn::make('age')
                    ->suffix("(months)")
                    ->label('vaccin age'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListVaccins::route('/'),
            'create' => Pages\CreateVaccin::route('/create'),
            'edit' => Pages\EditVaccin::route('/{record}/edit'),
        ];
    }
}
