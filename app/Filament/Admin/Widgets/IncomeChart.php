<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

use App\Models\Income;
use Carbon\Carbon;

class IncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Daily Income Trend (Last 7 Days)';

    public static function canView(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $labels[] = $date->format('M d');
            
            $amount = Income::whereDate('created_at', $date)->sum('amount');
            $data[] = $amount;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Income (Rs.)',
                    'data' => $data,
                    'backgroundColor' => '#4f46e5',
                    'borderColor' => '#4f46e5',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
