<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registrationModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;



class redirectMemberForm extends Controller
{
    public function redirectMF($id){
        $registrationForm = registrationModel::findOrFail($id);
        $Proof_of_Billings_filePath = $registrationForm->proof_of_billing;
        $two_by_two_picture_filePath = $registrationForm->two_by_two_picture;
        $valid_id_filePath = $registrationForm->valid_id;

        $filesExist = true;
        if (empty($Proof_of_Billings_filePath) || !Storage::exists($Proof_of_Billings_filePath)) {
            $filesExist = false;
        }
        if (empty($two_by_two_picture_filePath) || !Storage::exists($two_by_two_picture_filePath)) {
            $filesExist = false;
        }
        if (empty($valid_id_filePath) || !Storage::exists($valid_id_filePath)) {
            $filesExist = false;
        }

        if (!$filesExist) {
            abort(404, "One or more files not found.");
        }
        $Review = $registrationForm;
        $Proof_of_Billings_FileContents = Storage::get($Proof_of_Billings_filePath);
        $two_by_two_picture_FileContents = Storage::get($two_by_two_picture_filePath);
        $valid_id_FileContents = Storage::get($valid_id_filePath);

        $Proof_of_Billings_MimeType = Storage::mimeType($Proof_of_Billings_filePath);
        $two_by_two_picture_MimeType = Storage::mimeType($two_by_two_picture_filePath);
        $valid_id_MimeType = Storage::mimeType($valid_id_filePath);

        $Proof_of_Billings_Base64 = base64_encode($Proof_of_Billings_FileContents);
        $two_by_two_picture_Base64 = base64_encode($two_by_two_picture_FileContents);
        $valid_id_Base64 = base64_encode($valid_id_FileContents);


        return view('Administrator.ViewMembershipForm', compact(
            'Proof_of_Billings_filePath','two_by_two_picture_filePath','valid_id_filePath',
            'Proof_of_Billings_MimeType','two_by_two_picture_MimeType','valid_id_MimeType',
            'Proof_of_Billings_Base64','two_by_two_picture_Base64','valid_id_Base64','Review'
        ));
    }
}
