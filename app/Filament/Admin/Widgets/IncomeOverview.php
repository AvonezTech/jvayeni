<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Income;

class IncomeOverview extends BaseWidget
{
    public static function canView(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    protected function getStats(): array
    {
        $total = Income::sum('amount');
        $cash = Income::sum('cash_paid');
        $credit = Income::sum('credit_paid');

        return [
            Stat::make('Total Canteen Income', 'Rs. ' . number_format($total, 2))
                ->description('All completed orders')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
            Stat::make('Cash Payments Collected', 'Rs. ' . number_format($cash, 2))
                ->description('Paid directly in cash')
                ->descriptionIcon('heroicon-m-currency-rupee')
                ->color('info'),
            Stat::make('Credit Balance Used', 'Rs. ' . number_format($credit, 2))
                ->description('College sponsored credit')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'),
        ];
    }
}
