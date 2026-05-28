<?php

namespace App\Filament\Widgets;

use App\Enums\StatusKegiatan;
use App\Models\Jemaat;
use App\Models\Kegiatan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    //protected ?string $heading = 'Ringkasan Data';

    protected function getStats(): array
    {
        $jumlahJemaat = Jemaat::query()->where('active', true)->count();
        $jumlahKegiatan = Kegiatan::query()->where('active', true)->count();
        $jumlahLaporan = Kegiatan::query()
            ->where('active', true)
            ->where('status', StatusKegiatan::LAPORAN)
            ->count();

        return [
            Stat::make('Jumlah Jemaat', number_format($jumlahJemaat))
                ->description('Data jemaat')
                ->descriptionIcon('heroicon-m-user-group')
                ->chart([12, 14, 13, 15, 16, 18, $jumlahJemaat])
                ->color('success'),
            Stat::make('Jumlah Kegiatan', number_format($jumlahKegiatan))
                ->description('Jadwal Kegiatan')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart([3, 5, 4, 6, 7, 8, $jumlahKegiatan])
                ->color('warning'),
            Stat::make('Jumlah Laporan Kegiatan', number_format($jumlahLaporan))
                ->description('Laporan tersedia')
                ->descriptionIcon('heroicon-m-document-text')
                ->chart([1, 2, 2, 3, 4, 5, $jumlahLaporan])
                ->color('info'),
        ];
    }
}
