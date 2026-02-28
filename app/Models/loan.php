<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    protected $table = 'loanlist';

    protected $fillable = [
        'member_id',
        'last_name',
        'first_name',
        'middle_name',
        'place_of_birth',
        'birthdate',
        'age',
        'gender',
        'religion',
        'nationality',
        'civil_status',
        'email',
        'contact_number',
        'street_address',
        'province',
        'city_municipality',
        'barangay',
        'year_of_stay',
        'house_ownership',
        'zip_code',

        'employment_type',
        'employer_business_name',
        'position_nature_of_business',
        'employer_business_address',
        'monthly_income',
        'year_in_service_operation',
        'loan_rec_proof_of_income',

        'loan_number',
        'loan_type',
        'loan_amount',
        'loan_term',
        'frequency_of_payment',
        'payment_start_date',
        'purpose_of_loan',
        'loan_status',
        'loan_balance',

        'hr_person_name',
        'hr_person_number',

        'g1_fullname',
        'g1_relationship',
        'g1_contact_number',
        'g1_address',
        'loan_rec_g1_valid_id',

        'g2_fullname',
        'g2_relationship',
        'g2_contact_number',
        'g2_address',
        'loan_rec_g2_valid_id',

        'approved_by',
        'encoded_by',
        'due_amount'
    ];
    protected function casts(): array{
        return [
            'last_name' => 'encrypted',
            'first_name' => 'encrypted',
            'middle_name' => 'encrypted',
            'place_of_birth' => 'encrypted',
            'birthdate' => 'encrypted',
            'age' => 'encrypted',
            'gender' => 'encrypted',
            'religion' => 'encrypted',
            'nationality' => 'encrypted',
            'civil_status' => 'encrypted',
            'email' => 'encrypted',
            'contact_number' => 'encrypted',
            'street_address' => 'encrypted',
            'province' => 'encrypted',
            'city_municipality' => 'encrypted',
            'barangay' => 'encrypted',
            'year_of_stay' => 'encrypted',
            'house_ownership' => 'encrypted',
            'zip_code' => 'encrypted',

            // Employment Info
            'employment_type' => 'encrypted',
            'employer_business_name' => 'encrypted',
            'position_nature_of_business' => 'encrypted',
            'employer_business_address' => 'encrypted',
            'monthly_income' => 'encrypted',
            'year_in_service_operation' => 'encrypted',
            'loan_rec_proof_of_income' => 'encrypted',

            // Loan Details
            'loan_type' => 'encrypted',
            'loan_amount' => 'encrypted',
            'loan_term' => 'encrypted',
            'frequency_of_payment' => 'encrypted',
            'purpose_of_loan' => 'encrypted',
            'hr_person_name' => 'encrypted',
            'hr_person_number' => 'encrypted',
            'loan_status' => 'encrypted',
            'loan_balance' => 'encrypted',

            // First Guarantor
            'g1_fullname' => 'encrypted',
            'g1_relationship' => 'encrypted',
            'g1_contact_number' => 'encrypted',
            'g1_address' => 'encrypted',
            'loan_rec_g1_valid_id' => 'encrypted',

            // Second Guarantor
            'g2_fullname' => 'encrypted',
            'g2_relationship' => 'encrypted',
            'g2_contact_number' => 'encrypted',
            'g2_address' => 'encrypted',
            'loan_rec_g2_valid_id' => 'encrypted',

            'due_amount' => 'encrypted',
            'approved_by' => 'encrypted',
            'encoded_by' => 'encrypted',
        ];
    }

}
