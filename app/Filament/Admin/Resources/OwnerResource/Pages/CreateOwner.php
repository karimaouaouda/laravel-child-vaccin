<?php

namespace App\Filament\Admin\Resources\OwnerResource\Pages;

use App\Filament\Admin\Resources\OwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOwner extends CreateRecord
{
    protected static string $resource = OwnerResource::class;
}
