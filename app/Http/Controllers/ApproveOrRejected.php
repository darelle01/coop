<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registrationModel;
use Illuminate\Support\Facades\Auth;
use App\Models\officialmember;
use Illuminate\Support\Facades\Crypt;



class ApproveOrRejected extends Controller
{
    public function ApproveOrRejected(Request $request){
        $decision = $request->validate([
            'id' => 'required',
            'member_id' => 'required',
        ]);
        $memberid = $decision['member_id'];
        $find = registrationModel::where('id', $decision['id'])->first();

       $AddToOfficialList = [
            'last_name' => $find->last_name,
            'first_name' => $find->first_name,
            'middle_name' => $find->middle_name,
            'place_of_birth' => $find->place_of_birth,
            'birthdate' => $find->birthdate,
            'age' => $find->age,
            'gender' => $find->gender,
            'religion' => $find->religion,
            'nationality' => $find->nationality,
            'civil_status' => $find->civil_status,

            // Contact Information
            'email' => $find->email,
            'contact_number' => $find->contact_number,

            // Address
            'street_address' => $find->street_address,
            'province' => $find->province,
            'city' => $find->city,
            'barangay' => $find->barangay,

            // Additional Information
            'year_of_stay' => $find->year_of_stay,
            'house_ownership' => $find->house_ownership,
            'zip_code' => $find->zip_code,

            // Emergency Contact
            'ec_fullname' => $find->ec_fullname,
            'ec_gender' => $find->ec_gender,
            'ec_email' => $find->ec_email,
            'ec_contact_number' => $find->ec_contact_number,
            'ec_address' => $find->ec_address,
            'ec_relationship' => $find->ec_relationship,

            // Employment Information
            'employment_status' => $find->employment_status,
            'source_of_funds' => $find->source_of_funds,
            'employer_business_name' => $find->employer_business_name,
            'occupation' => $find->occupation,
            'company_business_address' => $find->company_business_address,
            'gross_monthly_income' => $find->gross_monthly_income,
            'nature_type_of_employment_business' => $find->nature_type_of_employment_business,
            'sss_gsis_no' => $find->sss_gsis_no,
            'tin_no' => $find->tin_no,

            // Attachments
            'proof_of_billing' => $find->proof_of_billing,
            'two_by_two_picture' => $find->two_by_two_picture,
            'valid_id' => $find->valid_id,
        ];
        $lastRecord = RegistrationModel::orderBy('id', 'desc')->first();

        if ($lastRecord && isset($lastRecord->member_number)) {
            $lastNumber = intval(substr($lastRecord->member_number, 2));
        } else {
            $lastNumber = 0;
        }

        $newNumber = $lastNumber + 1;

        $AddToOfficialList['member_number'] = 'M-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        $AddToOfficialList['member_id'] = $memberid;
        $AddToOfficialList['ApprovedBy'] = Auth::user()->email;
        $AddToOfficialList['username'] = $AddToOfficialList['email'];
        $AddToOfficialList['password'] = $AddToOfficialList['email'].$AddToOfficialList['age'];
        // 2x2 Picture Image handler
        if ($request->hasFile('two_by_two_picture')) {
            $file = $request->file('two_by_two_picture');
            $LastName = $request->last_name;
            $FirstName = $request->first_name;
            $MiddleName = $request->middle_name;
            $Filename = $LastName.$FirstName.$MiddleName.'.'.time().'.'.'two_by_two_picture'.$file->getClientOriginalExtension();
            $ImagePath = $file->storeAs('Two_by_Two_Picture', $Filename, 'local');
            $basic_info['two_by_two_picture'] = $ImagePath;
        }
        // Proof of Billing Image handler
        if ($request->hasFile('proof_of_billing')) {
            $file = $request->file('proof_of_billing');
            $LastName = $request->last_name;
            $FirstName = $request->first_name;
            $MiddleName = $request->middle_name;
            $Filename = $LastName.$FirstName.$MiddleName.'.'.time().'.'.'proof_of_billing'.$file->getClientOriginalExtension();
            $ImagePath = $file->storeAs('Proof_of_Billings', $Filename, 'local');
            $basic_info['proof_of_billing'] = $ImagePath;
        }
        // Proof of Billing Image handler
        if ($request->hasFile('valid_id')) {
            $file = $request->file('valid_id');
            $LastName = $request->last_name;
            $FirstName = $request->first_name;
            $MiddleName = $request->middle_name;
            $Filename = $LastName.$FirstName.$MiddleName.'.'.time().'.'.'valid_id'.$file->getClientOriginalExtension();
            $ImagePath = $file->storeAs('Valid_IDs', $Filename, 'local');
            $basic_info['valid_id'] = $ImagePath;
        }

        

        
        // dd($AddToOfficialList);
        officialmember::create($AddToOfficialList);
        
        $find->delete();

        return redirect()->back();
    }
}
