<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\PacoteUsuario;
use App\Models\PacotePersoUsuario;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Carbon\Carbon;

class Pacotes extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $packageType = $this->filters['packageType'] ?? 'all';
        $startDate = $this->filters['startDate'] ? Carbon::parse($this->filters['startDate']) : null;
        $endDate = $this->filters['endDate'] ? Carbon::parse($this->filters['endDate'])->endOfDay() : now()->endOfDay();

        $closedPackagesQuery = PacoteUsuario::query()
            ->join('pacotes', 'pacoteusuarios.pacote_id', '=', 'pacotes.id')
            ->when($startDate, fn($query) => $query->where('pacoteusuarios.data', '>=', $startDate))
            ->when($endDate, fn($query) => $query->where('pacoteusuarios.data', '<=', $endDate));

        $customPackagesQuery = PacotePersoUsuario::query()
            ->join('pacotes_personalizados', 'pacotepersousuarios.pacoteperso_id', '=', 'pacotes_personalizados.id')
            ->when($startDate, fn($query) => $query->where('pacotepersousuarios.data', '>=', $startDate))
            ->when($endDate, fn($query) => $query->where('pacotepersousuarios.data', '<=', $endDate));


        if ($packageType === 'closed') {
            $customPackagesQuery->whereRaw('1 = 0');
        } elseif ($packageType === 'custom') {
            $closedPackagesQuery->whereRaw('1 = 0');
        }

        // Receita dos pacotes pagos
        $closedRevenue = $closedPackagesQuery->where('pacoteusuarios.status', 'PAGO')->sum('pacotes.preco');
        $customRevenue = $customPackagesQuery->where('pacotepersousuarios.status', 'PAGO')->sum('pacotes_personalizados.preco');
        $totalRevenue = $closedRevenue + $customRevenue;

        // Total de pacotes não pagos
        $closedUnpaid = $closedPackagesQuery->where('pacoteusuarios.status', 'NÃO PAGO')->count('pacoteusuarios.id');
        $customUnpaid = $customPackagesQuery->where('pacotepersousuarios.status', 'NÃO PAGO')->count('pacotepersousuarios.id');
        $totalUnpaid = $closedUnpaid + $customUnpaid;

        // Total de pacotes (fechados e personalizados)
        $totalClosedPackages = $closedPackagesQuery->count('pacoteusuarios.id');
        $totalCustomPackages = $customPackagesQuery->count('pacotepersousuarios.id');
        $totalPackages = $totalClosedPackages + $totalCustomPackages;

        return [
            Stat::make('Receita Total', 'R$' . number_format($totalRevenue, 2, ',', '.'))
                ->description('Pacotes pagos')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Não Pago', $totalUnpaid)
                ->description('Pacotes não pagos')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Total de Pacotes', $totalPackages)
                ->description('Pacotes fechados e personalizados')
                ->descriptionIcon('heroicon-o-briefcase')
                ->color('primary'),
        ];
    }
}
