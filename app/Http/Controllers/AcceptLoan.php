<?php

namespace App\Http\Controllers;

use App\Models\loan;
use Illuminate\Http\Request;
use App\Models\LoanApplication;

class AcceptLoan extends Controller
{
    public function SaveLoan(Request $request){
        $AcceptLoan = $request->validate([
            'id' => 'required|integer',
            'loan_number' => 'string|required',
            'loan_term' => 'string|required',
            'frequency_of_payment' => 'string|required',
            'payment_start_date' => 'required|date',
            'loan_amount' => 'required|integer',
            'due_amount' => 'required|integer',
            'approved_by' => 'required|string',
            'encoded_by' => 'required|string',
        ]);

        $ApplicationRecord = LoanApplication::where('id' , $AcceptLoan['id'])->first();

        $CreateLoan = [];
        $CreateLoan['loan_number'] = $AcceptLoan['loan_number'];
        $CreateLoan['member_id'] = $ApplicationRecord['member_id'];
        $CreateLoan['last_name'] = $ApplicationRecord['last_name'];
        $CreateLoan['first_name'] = $ApplicationRecord['first_name'];
        $CreateLoan['middle_name'] = $ApplicationRecord['middle_name'];
        $CreateLoan['place_of_birth'] = $ApplicationRecord['place_of_birth'];
        $CreateLoan['birthdate'] = $ApplicationRecord['birthdate'];
        $CreateLoan['age'] = $ApplicationRecord['age'];
        $CreateLoan['gender'] = $ApplicationRecord['gender'];
        $CreateLoan['religion'] = $ApplicationRecord['religion'];
        $CreateLoan['nationality'] = $ApplicationRecord['nationality'];
        $CreateLoan['civil_status'] = $ApplicationRecord['civil_status'];
        $CreateLoan['email'] = $ApplicationRecord['email'];
        $CreateLoan['contact_number'] = $ApplicationRecord['contact_number'];
        $CreateLoan['street_address'] = $ApplicationRecord['street_address'];
        $CreateLoan['province'] = $ApplicationRecord['province'];
        $CreateLoan['city_municipality'] = $ApplicationRecord['city_municipality'];
        $CreateLoan['barangay'] = $ApplicationRecord['barangay'];
        $CreateLoan['year_of_stay'] = $ApplicationRecord['year_of_stay'];
        $CreateLoan['house_ownership'] = $ApplicationRecord['house_ownership'];
        $CreateLoan['zip_code'] = $ApplicationRecord['zip_code'];

        $CreateLoan['employment_type'] = $ApplicationRecord['employment_type'];
        $CreateLoan['employer_business_name'] = $ApplicationRecord['employer_business_name'];
        $CreateLoan['position_nature_of_business'] = $ApplicationRecord['position_nature_of_business'];
        $CreateLoan['employer_business_address'] = $ApplicationRecord['employer_business_address'];
        $CreateLoan['monthly_income'] = $ApplicationRecord['monthly_income'];
        $CreateLoan['year_in_service_operation'] = $ApplicationRecord['year_in_service_operation'];
        $CreateLoan['loan_rec_proof_of_income'] = $ApplicationRecord['proof_of_income'];
        
        $CreateLoan['loan_type'] = $ApplicationRecord['loan_type'];
        $CreateLoan['loan_amount'] = $AcceptLoan['loan_amount'];
        $CreateLoan['loan_term'] = $ApplicationRecord['loan_term'];
        $CreateLoan['frequency_of_payment'] = $AcceptLoan['frequency_of_payment'];
        $CreateLoan['payment_start_date'] = $AcceptLoan['payment_start_date'];
        $CreateLoan['loan_balance'] = $AcceptLoan['loan_amount'];
        $CreateLoan['purpose_of_loan'] = $ApplicationRecord['purpose_of_loan'];
        $CreateLoan['loan_status'] = 'Ongoing';

        $CreateLoan['hr_person_name'] = $ApplicationRecord['hr_person_name'];
        $CreateLoan['hr_person_number'] = $ApplicationRecord['hr_person_number'];

        $CreateLoan['g1_fullname'] = $ApplicationRecord['g1_fullname'];
        $CreateLoan['g1_relationship'] = $ApplicationRecord['g1_relationship'];
        $CreateLoan['g1_contact_number'] = $ApplicationRecord['g1_contact_number'];
        $CreateLoan['g1_address'] = $ApplicationRecord['g1_address'];
        $CreateLoan['loan_rec_g1_valid_id'] = $ApplicationRecord['g1_valid_id'];

        $CreateLoan['g2_fullname'] = $ApplicationRecord['g2_fullname'];
        $CreateLoan['g2_relationship'] = $ApplicationRecord['g2_relationship'];
        $CreateLoan['g2_contact_number'] = $ApplicationRecord['g2_contact_number'];
        $CreateLoan['g2_address'] = $ApplicationRecord['g2_address'];
        $CreateLoan['loan_rec_g2_valid_id'] = $ApplicationRecord['g2_valid_id'];
        
        $CreateLoan['approved_by'] = $AcceptLoan['approved_by'];
        $CreateLoan['encoded_by'] = $AcceptLoan['encoded_by'];
        $CreateLoan['due_amount'] = $AcceptLoan['due_amount'];

       // First Guarantor ID Image handler
        if ($request->hasFile('loan_rec_g1_valid_id')) {
            $file = $request->file('loan_rec_g1_valid_id');
            $FullName = $request->g1_fullname;
            $Filename = $FullName .'.'.time().'.'.'Loan_Rec_First_Guarantor_Valid_ID'.$file->getClientOriginalExtension();
            $ImagePath = $file->storeAs('Loan_Rec_G1_Valid_ID', $Filename, 'local');
            $LoanApplicationForm['loan_rec_g1_valid_id'] = $ImagePath;
        }
        // Second Guarantor ID Image handler 
        if ($request->hasFile('loan_rec_g2_valid_id')) {
            $file = $request->file('loan_rec_g2_valid_id');
            $FullName = $request->g2_fullname;
            $Filename = $FullName .'.'.time().'.'.'Loan_Second_Guarantor_Valid_ID'.$file->getClientOriginalExtension();
            $ImagePath = $file->storeAs('Loan_Rec_G2_Valid_ID', $Filename, 'local');
            $LoanApplicationForm['loan_rec_g2_valid_id'] = $ImagePath;
        }
        // Proof of Income Image handler
        if ($request->hasFile('loan_rec_proof_of_income')) {
            $file = $request->file('loan_rec_proof_of_income');
            $LastName = $request->last_name;
            $FirstName = $request->first_name;
            $MiddleName = $request->middle_name;
            $Filename = $LastName.'_'.$FirstName.'_'.$MiddleName.'.'.time().'.'.'Loan_Rec_Proof_of_Income'.$file->getClientOriginalExtension();
            $ImagePath = $file->storeAs('Loan_Rec_Proof_of_Income', $Filename, 'local');
            $LoanApplicationForm['loan_rec_proof_of_income'] = $ImagePath;
        }
        // dd($CreateLoan);
        loan::create($CreateLoan);
        $ApplicationRecord->delete();
        return redirect()->route('LoanApp.list')->with('success', 'You successfully add new loan.');
    }
}
