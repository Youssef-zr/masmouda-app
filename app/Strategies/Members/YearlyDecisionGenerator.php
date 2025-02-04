<?php
namespace App\Strategies\Members;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;


class YearlyDecisionGenerator implements IDecisionGenerator
{
    public function generate($members)
    {
        $pdf= PDF::loadView('back.pdf.members.paiment-decision-yearly', ['members' => $members]);
        return $pdf;
    }

    public function getFileName(): string
    {
        return __("members.members_decision_list_yearly") . "_" . now()->format("Y") . ".pdf";
    }
}

