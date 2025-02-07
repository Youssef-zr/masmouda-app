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
use Mpdf\Mpdf;

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
            $this->addCinPage($pdfFilePath, $mpdf);

            // Generate file name
            $fileName = __("members.member_info") . "_{$member->name}_{$member->created_at->format('Y')}.pdf";

            return $pdf->stream($fileName);
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    public function addCinPage($filePath, $mpdfInstance)
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

    public function exportCinCards()
    {
        // Step 1: Get all members
        $members = Member::all();  // You can limit the members if needed

        // Step 2: Create a new instance of Mpdf for merging
        $mpdf = new Mpdf();

        // Step 3: Loop through each member and add their CIN PDF to the merged file
        foreach ($members as $index => $member) {
            // Get the CIN PDF media for this member (assuming the media collection is 'cin_pdfs')
            $cinPdf = $member->getMedia(collectionName: 'cin_image')->first(); // Assuming one CIN PDF per member

            if ($cinPdf) {
                // Get the path of the CIN PDF file
                $pdfPath = $cinPdf->getPath();

                // Step 4: Import the CIN PDF into the merged document
                if ($index > 0) {
                    $mpdf->AddPage();  // Add a new page for each member's CIN PDF
                }

                // Import and add the first page of the CIN PDF (adjust if you have multi-page PDFs)
                $pageCount = $mpdf->SetSourceFile($pdfPath);

                for ($i = 1; $i <= $pageCount; $i++) {
                    $tplIdx = $mpdf->ImportPage($i);
                    $mpdf->UseTemplate($tplIdx);

                    if ($i < $pageCount) {
                        $mpdf->AddPage();  // Add a new page for each member's CIN PDF
                    }
                }
            }
        }

        // Step 5: Output the merged PDF (stream it to the browser)
        return $mpdf->Output('merged_cin_pdfs.pdf', 'I'); // 'I' will stream the file in the browser
    }

    public function exportCinCard($id)
    {
        try {
            // Decrypt member ID
            $decryptedId = Crypt::decryptString(payload: $id);

            // Retrieve member details
            $member = Member::findOrFail($decryptedId);
            $member->load(['role']);

            // Generate the main PDF
            $mpdf = new Mpdf();

            // Retrieve the PDF file path
            $pdfFilePath = $member->getFirstMediaPath("cin_image");
            $this->addCinPage(filePath: $pdfFilePath, mpdfInstance: $mpdf);

            // Generate file name
            $fileName = __("members.member_info") . "_{$member->name}}.pdf";

            return $mpdf->Output($fileName, 'I'); // 'I' will stream the file in the browser

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
}
