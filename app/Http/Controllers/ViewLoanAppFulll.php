<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanApplication;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ViewLoanAppFulll extends Controller
{
    public function ViewFullLoanApp($id)
    {
        $GetLoanForm = LoanApplication::findOrFail($id);

        // Image Path
        $g1FilePath = $GetLoanForm->g1_valid_id; 
        $g2FilePath = $GetLoanForm->g2_valid_id;
        $proofFilePath = $GetLoanForm->proof_of_income; 

       
        $filesExist = true;
        if (empty($g1FilePath) || !Storage::exists($g1FilePath)) {
            $filesExist = false;
        }
        if (empty($g2FilePath) || !Storage::exists($g2FilePath)) {
            $filesExist = false;
        }
        if (empty($proofFilePath) || !Storage::exists($proofFilePath)) {
            $filesExist = false;
        }

        if (!$filesExist) {
            abort(404, "One or more files not found.");
        }

        $Review = $GetLoanForm;

        $g1FileContents = Storage::get($g1FilePath);
        $g2FileContents = Storage::get($g2FilePath);
        $proofFileContents = Storage::get($proofFilePath);

        $g1MimeType = Storage::mimeType($g1FilePath);
        $g2MimeType = Storage::mimeType($g2FilePath);
        $proofMimeType = Storage::mimeType($proofFilePath);

        $g1Base64 = base64_encode($g1FileContents);
        $g2Base64 = base64_encode($g2FileContents);
        $proofBase64 = base64_encode($proofFileContents);

        return view("Administrator.LoanApplicationFormReview", compact(
            "g1Base64", "g2Base64", "proofBase64", 
            "g1MimeType", "g2MimeType", "proofMimeType",
            "g1FilePath", "g2FilePath", "proofFilePath","Review"
        ));
    }
}
