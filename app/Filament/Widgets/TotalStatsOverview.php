<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Project; // Assuming your Project model exists
use App\Models\Employee; // Assuming your Employee model exists

class TotalStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Assuming you have models to count these
        $totalProjects = Project::count(); // Get the total project count
        $totalEmployees = Employee::count(); // Get the total employee count
        $totalProjectCount = Project::count(); // Example: active project count

        return [
            Stat::make('Total Projects', $totalProjects), // Add total project count
            Stat::make('Total Employees', $totalEmployees), // Add total employee count
            Stat::make('Active Projects', $totalProjectCount), // Add active project count
        ];
    }
}
