<?php

namespace App\Filament\Widgets;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // Categories
        $totalCategories = Category::count();
        $categoryChange = $this->calculatePercentageChange(Category::class);

        // Articles
        $totalArticles = Article::count();
        $articleChange = $this->calculatePercentageChange(Article::class);

        // Advertisements
        $totalAds = Advertise::count();
        $adChange = $this->calculatePercentageChange(Advertise::class);

        return [
            Stat::make('Total Categories', $totalCategories)
                ->description($this->formatChangeDescription($categoryChange))
                ->descriptionIcon($this->getChangeIcon($categoryChange))
                ->color($this->getChangeColor($categoryChange)),

            Stat::make('Total Articles', $totalArticles)
                ->description($this->formatChangeDescription($articleChange))
                ->descriptionIcon($this->getChangeIcon($articleChange))
                ->color($this->getChangeColor($articleChange)),

            Stat::make('Total Advertisements', $totalAds)
                ->description($this->formatChangeDescription($adChange))
                ->descriptionIcon($this->getChangeIcon($adChange))
                ->color($this->getChangeColor($adChange)),
        ];
    }

    /**
     * Calculate percentage change compared to previous 30 days
     */
    protected function calculatePercentageChange(string $model): float
    {
        $now = Carbon::now();
        $currentCount = $model::where('created_at', '>=', $now->clone()->subDays(30))->count();
        $previousCount = $model::where('created_at', '>=', $now->clone()->subDays(60))
            ->where('created_at', '<', $now->clone()->subDays(30))
            ->count();

        if ($previousCount === 0) {
            return $currentCount > 0 ? 100 : 0; // Avoid division by zero
        }

        return round((($currentCount - $previousCount) / $previousCount) * 100, 1);
    }

    protected function formatChangeDescription(float $change): string
    {
        $absChange = abs($change);
        return $change >= 0 
            ? "{$absChange}% increase" 
            : "{$absChange}% decrease";
    }

    protected function getChangeIcon(float $change): string
    {
        return $change >= 0 
            ? 'heroicon-m-arrow-trending-up' 
            : 'heroicon-m-arrow-trending-down';
    }

    protected function getChangeColor(float $change): string
    {
        return $change >= 0 ? 'success' : 'danger';
    }
}