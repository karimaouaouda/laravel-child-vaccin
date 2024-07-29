<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChildResource\Pages;
use App\Filament\Resources\ChildResource\RelationManagers;
use App\Models\Child;
use App\Models\Vaccin;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

class ChildResource extends Resource
{
    protected static ?string $model = Child::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('owner_id', '=', auth()->user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('owner_id')
                    ->default(auth()->user()->id),

                Forms\Components\TextInput::make('first_name')
                    ->alpha()
                    ->minLength(4)
                    ->autofocus()
                    ->required(),


                Forms\Components\Checkbox::make('adopted')
                    ->default(false)
                    ->columnSpan('full')
                    ->live()
                    ->afterStateUpdated(function(Forms\Get $get, Forms\Set $set){
                        if( !$get('adopted') ){
                            $set('last_name', auth()->user()->last_name);
                        }
                    })
                    ->label('is child adopted'),

                Forms\Components\TextInput::make('last_name')
                    ->alpha()
                    ->minLength(4)
                    ->readOnly(fn(Forms\Get $get, ) => !$get('adopted'))
                    ->default(auth()->user()->last_name)
                    ->required()
                    ->live()
                    ->helperText('wrong last name? change the order now in settings')
                    ,

                Forms\Components\Radio::make('sex')
                    ->options([
                        'male' => 'male',
                        'female' => 'female'
                    ])->inline()
                    ->required()
                    ->default('male'),

                Forms\Components\DateTimePicker::make('date_of_birth')
                    ->minDate(now()->addYears(-6))
                    ->maxDate(now()->setMinutes(0)->setSeconds(0)->addDay())
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('child id')
                    ->prefix("#"),
                Tables\Columns\TextColumn::make('first_name')
                    ->label('child first_name'),

                Tables\Columns\TextColumn::make('last_name')
                    ->label('child last_name'),

                Tables\Columns\TextColumn::make('adopted')
                    ->label('is adopted')
                    ->formatStateUsing(fn(string $state) => $state ? 'yes' : 'no'),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->label('date of birth'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('vaccins')
                        ->action(function(Child $record){
                            redirect()->to("https://vaccin.test/dashboard/children/{$record->id}/vaccins");
                        })
                ])->label('actions')
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
            RelationManagers\VaccinsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChildren::route('/'),
            'create' => Pages\CreateChild::route('/create'),
            'edit' => Pages\EditChild::route('/{record}/edit'),
            'vaccins' => Pages\Vaccins::route('/{record}/vaccins')
        ];
    }
}
