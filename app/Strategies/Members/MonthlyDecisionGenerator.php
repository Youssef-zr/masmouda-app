<?php
namespace App\Strategies\Members;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Carbon\Carbon;

class MonthlyDecisionGenerator implements IDecisionGenerator
{
    public function generate($members)
    {
        $pdf = PDF::loadView('back.pdf.members.paiment-decision-monthly', ['members' => $members]);
        return $pdf;
    }

    public function getFileName(): string
    {
        return __("members.members_decision_list_monthly") . "_" . Carbon::now()->endOfMonth()->format("Y-m-d") . ".pdf";
    }
}

