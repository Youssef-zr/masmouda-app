<?php

namespace App\Http\Controllers\Back\PDF;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PDFController extends Controller
{
    public function generateMemberPDF($id)
    {
        try {

            $decryptedId = Crypt::decryptString($id);

            $member = Member::find($decryptedId);
            $member->load("role");

            // return view("back.pdf.member-info", ["member" => $member]);

            $pdf = PDF::loadView('back.pdf.member-info', ['member' => $member]);

            $fileName = __("members.member_info")."_{$member->name}_{$member->created_at->format("Y")}.pdf";

            return $pdf->stream($fileName);
        } catch (Exception $e) {
            abort(404);
        }
    }
}
