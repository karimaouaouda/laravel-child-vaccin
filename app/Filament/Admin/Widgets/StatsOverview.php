<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Admin;
use App\Models\Child;
use App\Models\User;
use App\Models\Vaccin;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('vaccins count', ''. Vaccin::all()->count()),
            Stat::make('owners count', User::all()->where('role', '=', 'owner')->count()),
            Stat::make('children count', Child::all()->count()),
            Stat::make('admins count', User::where('role', 'admin')->count())
        ];
    }
}
