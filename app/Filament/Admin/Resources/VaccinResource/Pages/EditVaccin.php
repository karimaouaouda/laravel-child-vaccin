<?php

namespace App\Filament\Admin\Resources\VaccinResource\Pages;

use App\Filament\Admin\Resources\VaccinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVaccin extends EditRecord
{
    protected static string $resource = VaccinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
