<?php

namespace App\Services;

use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class GoogleAnalytics
{
    protected $analytics;

    public function __construct(Analytics $analytics)
    {
        $this->analytics = $analytics;
    }

    public function getWebsiteVisitors($days = 7)
    {
        return $this->analytics->fetchTotalVisitorsAndPageViews(Period::days($days));
    }
}
