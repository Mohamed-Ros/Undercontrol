<?php

namespace App\Filament\Resources\NoneResource\Widgets;
use App\Models\Course;
use App\Models\Achievement;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
     protected function getStats(): array
    {
        return [
            Stat::make('عدد الكورسات', Course::count())
                ->description('إجمالي الكورسات المتاحة')
                ->color('success'),

            Stat::make('عدد المسابقات', Achievement::count())
                ->description('إجمالي المسابقات المنشورة')
                ->color('warning'),

            Stat::make('عدد المشاريع', Project::count())
                ->description('إجمالي المشاريع المضافة')
                ->color('info'),
        ];
            }

}
