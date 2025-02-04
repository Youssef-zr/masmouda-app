<?php

namespace App\Http\Controllers\Back\PDF;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Strategies\Members\IDecisionGenerator;
use App\Strategies\Members\MonthlyDecisionGenerator;
use App\Strategies\Members\YearlyDecisionGenerator;
use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\Crypt;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;


class MemberPDFController extends Controller
{
    public function generateMemberPDF($id)
    {
        try {

            $decryptedId = Crypt::decryptString($id);

            $member = Member::find($decryptedId);
            $member->load(['role']);

            $pdf = PDF::loadView('back.pdf.members.single-info', ['member' => $member]);
            $fileName = __("members.member_info") . "_{$member->name}_{$member->created_at->format("Y")}.pdf";

            return $pdf->stream($fileName);
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }


    public function exportMembers()
    {
        try {

            $members = Member::active('enabled')->get();
            $members->load(['role']);

            $pdf = PDF::loadView('back.pdf.members.export-list', ['members' => $members]);
            $fileName = __("members.members_list") . "_{$members->first()->created_at->format("Y")}.pdf";

            return $pdf->stream($fileName);
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }


    public function generateDecisions($type)
    {
        try {
            $members = Member::active('enabled')
                ->with('role')->get();


            if ($members->isEmpty()) {
                abort(404, __("No active members found."));
            }

            // Select the appropriate strategy based on the type
            $generator = $this->getDecisionGenerator($type);

            // Generate the PDF using the selected strategy
            $pdf = $generator->generate($members);
            return $pdf->stream($generator->getFileName());
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    private function getDecisionGenerator($type): IDecisionGenerator
    {
        switch ($type) {
            case 'yearly':
                return new YearlyDecisionGenerator();
            case 'monthly':
                return new MonthlyDecisionGenerator();
            default:
                throw new InvalidArgumentException(__("Invalid decision type."));
        }
    }
}
