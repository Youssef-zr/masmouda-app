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
            // Decrypt member ID
            $decryptedId = Crypt::decryptString($id);

            // Retrieve member details
            $member = Member::findOrFail($decryptedId);
            $member->load(['role']);

            // Generate the main PDF
            $pdf = PDF::loadView('back.pdf.members.single-info', ['member' => $member]);
            $mpdf = $pdf->getMpdf();

            // Retrieve the PDF file path
            $pdfFilePath = $member->getFirstMediaPath("cin_image");
            $this->addCinPage($pdfFilePath,$mpdf);

            // Generate file name
            $fileName = __("members.member_info") . "_{$member->name}_{$member->created_at->format('Y')}.pdf";

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
            $fileName = __(key: "members.members_list") . "_{$members->first()->created_at->format("Y")}.pdf";

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
        $decision = match ($type) {
            "yearly" => new YearlyDecisionGenerator(),
            'monthly' => new MonthlyDecisionGenerator(),
            default => throw new InvalidArgumentException(__("Invalid decision type."))
        };

        return $decision;
    }

    public function addCinPage($filePath,$mpdfInstance)
    {

        if ($filePath && file_exists($filePath)) {
            // Get number of pages in the imported PDF
            $pageCount = $mpdfInstance->SetSourceFile($filePath);

            for ($i = 1; $i <= $pageCount; $i++) {
                // Import the page
                $tplId = $mpdfInstance->ImportPage($i);
                $size = $mpdfInstance->GetTemplateSize($tplId); // Get dimensions of the imported page

                // Set new page to match the imported PDF page size
                $mpdfInstance->AddPageByArray([
                    'orientation' => ($size['width'] > $size['height']) ? 'L' : 'P', // Landscape or Portrait
                    'width' => $size['width'],
                    'height' => $size['height']
                ]);

                // Use the template with correct scaling
                $mpdfInstance->UseTemplate($tplId);
            }
        }
    }
}
