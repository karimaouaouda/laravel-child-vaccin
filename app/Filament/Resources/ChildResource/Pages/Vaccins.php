<?php

namespace App\Filament\Resources\ChildResource\Pages;

use App\Enum\AppointmentStatus;
use App\Filament\Resources\ChildResource;
use App\Models\Child;
use App\Models\Vaccin;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vaccins extends ManageRelatedRecords
{
    protected static string $resource = ChildResource::class;

    protected static string $relationship = 'vaccins';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Vaccins';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('child_id')
                    ->live()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('child.first_name')
                    ->formatStateUsing(function(Forms\Get $get){
                        return Child::where('id', '=', $get('child_id'))->get()->first()->first_name;
                    })
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->formatStateUsing(function(Forms\Get $get){
                        return Child::where('id', '=', $get('child_id'))->get()->first()->last_name;
                    })
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('date_of_birth')
                    ->formatStateUsing(function(Forms\Get $get){
                        return Child::where('id', '=', $get('child_id'))->get()->first()->date_of_birth;
                    })
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('vaccin_date')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        $disabled = false;

        return $table
            ->recordTitleAttribute('child_id')
            ->columns([
                Tables\Columns\TextColumn::make('vaccin_id')
                    ->label('vaccin id')
                    ->prefix('#'),
                Tables\Columns\TextColumn::make('name')
                    ->label('vaccin name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vaccin_date')
                    ->label('vaccin date'),
                Tables\Columns\TextColumn::make('status')
                    ->label('vaccin status')
                    ->badge()
                    ->color(fn($state) : string => match($state){
                        'primary',
                        (AppointmentStatus::WAITING)->name => 'warning',
                        (AppointmentStatus::DONE)->name => 'success',
                        (AppointmentStatus::WASTED)->name => 'danger'
                    }),
                TextColumn::make('with_appointment')
                    ->label('vaccin date')
                    ->default(function(Model $model){
                        return $model->vaccin_date;
                    })
                    ->formatStateUsing(function(string $state, Model $m){
                        if($state == $m->vaccin_date){
                            return $m->vaccin_date;
                        }
                        if( (int)$state !== 0 ){
                            $referenced = DB::table('vaccin_appointments')
                                                ->join('vaccins', 'vaccins.id', '=', 'vaccin_appointments.vaccin_id')
                                                ->select()
                                                ->where('vaccin_appointments.id', '=', $state)
                                                ->get()
                                                ->first();

                            return "with {$referenced->name} in date {$referenced->vaccin_date}";
                        }else{
                            return "not wasted";
                        }
                        return "not wasted";
                    })
                    ->badge(),
                Tables\Columns\TextColumn::make('vaccin_date')
                    ->label('rest')
                    ->tooltip(function(string $state){
                        $vaccin = new \DateTime($state);
                        $now = now();

                        return "rest " . $vaccin->diff($now)->format('%a') . "(days) for this vaccin.";
                    })
                    ->formatStateUsing(function(string $state){
                        $vaccin = new \DateTime($state);
                        $now = now();

                        $interval = $vaccin->diff($now);

                        $date = "";

                        if($interval->y){
                            $date .= $interval->y . ' years ';
                        }

                        if($interval->m){
                            $date .= $interval->m . ' months ';
                        }

                        if($interval->d){
                        $date .= $interval->d . ' days ';
                        }

                        if($interval->h){
                            $date .= $interval->h . ' hours ';
                        }

                        if($interval->i){
                            $date .= $interval->i . ' minutes ';
                        }

                        return ($interval->invert ? '' : '-') . $date;
                    })
                    ->badge(),

                SelectColumn::make('id')
                    ->label('change status')
                    ->options(
                        AppointmentStatus::values(true)
                    )
                    ->disabled(function(Model $model){
                        global $disabled;
                        return ($disabled = (DB::table('vaccin_appointments')->where('vaccin_id', '=', $model->id)
                        ->get()->first()->status == AppointmentStatus::WAITING->value));
                    })
                    ->tooltip(function(Model $model){
                        $disabled = (DB::table('vaccin_appointments')->where('vaccin_id', '=', $model->id)
                        ->get()->first()->status == AppointmentStatus::WAITING->value);

                        return $disabled ? 'you can not change a waiting vaccin' : 'change the status';
                    })
                    ->toggledHiddenByDefault()
                    ->rules(['required'])
                    ->updateStateUsing(function(Model $m, string $state){
                        DB::table('vaccin_appointments')
                            ->where('vaccin_id', '=', $m->id)
                            ->update([
                                'status' => AppointmentStatus::getByName($state)->value,
                                'with_appointment' => null
                            ]);
                    })
                    ->placeholder("chose status")
                    ->default("DONE"),

            ])
            ->filters([

                Filter::make('waiting')
                    ->query(fn(Builder $query) : Builder => $query->where('status', 'WAITING')),

                Filter::make('DONE')
                    ->query(fn(Builder $query) : Builder => $query->where('status', 'DONE')),

                Filter::make('WASTED')
                    ->query(fn(Builder $query) : Builder => $query->where('status', 'WASTED')),
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
                //Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DetachAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DetachBulkAction::make(),
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);
    }
}
