<?php

namespace App\Filament\Widgets;

use App\Models\Baliho;
use App\Models\Billboard;
use App\Models\Videotron;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $balihoCount = Baliho::count();
        $balihoBooked = Baliho::whereNotNull('bookings')
            ->whereJsonLength('bookings', '>', 0)
            ->count();

        $videotronCount = Videotron::count();
        $videotronBooked = Videotron::whereNotNull('bookings')
            ->whereJsonLength('bookings', '>', 0)
            ->count();

        $billboardCount = Billboard::count();
        $billboardBooked = Billboard::whereNotNull('bookings')
            ->whereJsonLength('bookings', '>', 0)
            ->count();

        return [
            Stat::make('Total Baliho', $balihoCount)
                ->description($balihoBooked . ' Terboking')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5]),

            Stat::make('Total Videotron', $videotronCount)
                ->description($videotronBooked . ' Terboking')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info')
                ->chart([3, 5, 4, 6, 7, 5, 6]),

            Stat::make('Total Billboard', $billboardCount)
                ->description($billboardBooked . ' Terboking')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('warning')
                ->chart([4, 6, 5, 7, 6, 5, 7]),

            Stat::make('Total Pengguna', User::count())
                ->description('Admin & Staff')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->chart([2, 3, 3, 4, 4, 5, 5]),
        ];
    }
}
