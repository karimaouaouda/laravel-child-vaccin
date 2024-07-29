<?php

namespace App\Filament\Admin\Resources\VaccinResource\Pages;

use App\Filament\Admin\Resources\VaccinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVaccins extends ListRecords
{
    protected static string $resource = VaccinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
