<?php

namespace App\Filament\Resources\ChildResource\Widgets;

use App\Enum\AppointmentStatus;
use App\Models\Child;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class ChildStates extends BaseWidget
{
    protected function getStats(): array
    {
        $user_id = auth()->user()->id;

        $vaccin_count = DB::table('users')
                            ->join('children',  'users.id', '=', 'children.owner_id')
                            ->join('vaccin_appointments', 'children.id', '=', 'vaccin_appointments.child_id')
                            ->where('users.id', '=', $user_id)
                            ->where('vaccin_appointments.status', '=', AppointmentStatus::DONE->value)
                            ->count();
        return [
            Stat::make('all children count', Child::where('owner_id', '=', $user_id)->count())
                ->description('this is your children count')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
                Stat::make('all vaccin taken', $vaccin_count )
                ->description('this is all vaccins that your children toke')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
        ];
    }
}
