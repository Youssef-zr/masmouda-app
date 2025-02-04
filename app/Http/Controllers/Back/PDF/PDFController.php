<?php

namespace App\Http\Controllers\Back\PDF;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Carbon\Carbon;

class PDFController extends Controller
{
    public function generateMemberPDF($id)
    {
        try {

            $decryptedId = Crypt::decryptString($id);

            $member = Member::find($decryptedId);
            $member->load(['role']);

            $pdf = PDF::loadView('back.pdf.member-info', ['member' => $member]);
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

            $pdf = PDF::loadView('back.pdf.members-list-export', ['members' => $members]);
            $fileName = __("members.members_list") . "_{$members->first()->created_at->format("Y")}.pdf";

            return $pdf->stream($fileName);
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
    public function generateCommitments($type)
    {
        try {

            $members = Member::active('enabled')->get();
            $members->load(['role']);

            if ($type == 'yearly') {
                $pdf = PDF::loadView('back.pdf.members-paiment-decision-yearly', ['members' => $members]);
                $fileName = __("members.members_commitments_list_yearly") . "_{$members->first()->created_at->format("Y")}.pdf";
            } else if("monthly") {
                $pdf = PDF::loadView('back.pdf.members-paiment-decision-monthly', ['members' => $members]);
                $fileName = __("members.members_commitments_list_monthly") .Carbon::now()->endOfMonth()->format("Y/m/d") . "_.pdf";
            }

            return $pdf->stream($fileName);
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}
