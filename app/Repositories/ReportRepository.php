<?php

namespace App\Repositories;

use App\Models\Message;

class ReportRepository
{
    public function getProviderSummaryReport()
    {
        return Message::select('provider_id')
            ->with('provider')
            ->selectRaw('COUNT(*) as total')
            ->selectRaw('COUNT(DISTINCT student_contact_id) as unique_recipients')
            ->selectRaw("ROUND(SUM(status = 'DELIVERED') / COUNT(*) * 100, 2) as read_rate")
            ->groupBy('provider_id')
            ->get();
    }
}
