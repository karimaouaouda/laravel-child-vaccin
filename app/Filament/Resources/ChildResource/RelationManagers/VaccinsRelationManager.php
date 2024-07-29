<?php

namespace App\Filament\Resources\ChildResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VaccinsRelationManager extends RelationManager
{
    protected static string $relationship = 'vaccins';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('child_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('child_id')
            ->columns([
                Tables\Columns\TextColumn::make('vaccin_id')
                    ->label('vaccin id')
                    ->prefix('#'),
                Tables\Columns\TextColumn::make('name')
                    ->label('vaccin name'),
                Tables\Columns\TextColumn::make('vaccin_date')
                    ->label('vaccin date'),
                Tables\Columns\TextColumn::make('vaccin_date')
                    ->label('rest')
                    ->formatStateUsing(function(string $state){
                        $vaccin = new \DateTime($state);
                        $now = now();

                        return $vaccin->diff($now)->format('%a') . "days";
                    }),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);
    }
}
