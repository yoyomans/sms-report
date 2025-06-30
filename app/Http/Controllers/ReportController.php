<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReportRepository;

class ReportController extends Controller
{
    protected ReportRepository $reports;

    public function __construct(ReportRepository $reports)
    {
        $this->reports = $reports;
    }

    public function providerSummaryReport()
    {
        $report = $this->reports->getProviderSummaryReport();

        return view('reports.providerSummaryReport', compact('report'));
    }
}
