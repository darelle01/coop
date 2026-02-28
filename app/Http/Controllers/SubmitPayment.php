<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Models\SharedCapital;
use Illuminate\Support\Facades\Log;

class SubmitPayment extends Controller
{
    public function pay(Request $request)
    {
        //  dd($request);
        // Custom validation for reference_number uniqueness with encrypted field
        $request->validate([
            'loan_number' => 'nullable|string',
            'member_id' => 'required|string',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'transaction_type' => 'required|string',
            'payment_method' => 'required|string',
            'payment_status' => 'required|string',
            'transaction_date' => 'required|date',
            'transaction_handler' => 'required|string',
            'updater_name' => 'required|string',
            'reference_number' => 'required|string',
            'payment_amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
            'admin_copy' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'member_copy' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
       
        // Check reference_number uniqueness manually for encrypted field
        $existingPayment = PaymentModel::where('reference_number', $request->reference_number)->first();
        if ($existingPayment) {
            return redirect()->back()->with('error', 'Reference number already exists. Please use a unique reference number.');
        }

        $pay = $request->all();

        Log::info('Validation passed, data: ' . json_encode($pay));

        // Handle file uploads (common for all transaction types)
        if ($request->hasFile('admin_copy')) {
            $file = $request->file('admin_copy');
            $filename = $request->last_name . $request->first_name . $request->middle_name . '.' . time() . '.admin_copy.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('Admin_Copy', $filename, 'local');
            $pay['admin_copy'] = $imagePath;
        }

        if ($request->hasFile('member_copy')) {
            $file = $request->file('member_copy');
            $filename = $request->last_name . $request->first_name . $request->middle_name . '.' . time() . '.member_copy.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('Member_Copy', $filename, 'local');
            $pay['member_copy'] = $imagePath;
        }

        // Case 1: Loan payment without loan number (error)
        if ($pay['loan_number'] === null && $pay['transaction_type'] === 'Loan Payment') {
            return redirect()->back()->with('error', 'You need to provide Loan number.');
        }

        // Case 2: Loan payment with loan number
        elseif ($pay['loan_number'] !== null && $pay['transaction_type'] === 'Loan Payment') {
            $findLoanRecord = Loan::where('loan_number', $pay['loan_number'])->first();

            if (!$findLoanRecord) {
                return redirect()->back()->with('error', 'Loan record not found for this loan number.');
            }

            try {
                // Update loan balance
                $findLoanRecord->loan_balance -= $pay['payment_amount'];
                $findLoanRecord->save();

                // Create payment record
                PaymentModel::create($pay);
                Log::info('Loan payment created successfully');
                return redirect()->back()->with('Record-updated', 'Loan payment recorded successfully.');
            } catch (\Exception $e) {
                Log::error('Loan payment creation failed: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to record loan payment. Please try again.');
            }
        }

        // Case 3: Non-loan payment without loan number
        elseif ($pay['loan_number'] === null && $pay['transaction_type'] !== 'Loan Payment') {

            // Remove loan_number for non-loan payments
            unset($pay['loan_number']);

            switch ($pay['transaction_type']) {
                case 'Shared Capital':
                    $findSharedCapitalRecord = SharedCapital::where('member_id', $pay['member_id'])->first();

                    if (!$findSharedCapitalRecord) {
                        return redirect()->back()->with('error', 'Shared capital record not found for this member.');
                    }

                    try {
                        // Update shared capital
                        $findSharedCapitalRecord->shared_capital_amount -= $pay['payment_amount'];
                        $findSharedCapitalRecord->save();

                        // Create payment record
                        PaymentModel::create($pay);
                        Log::info('Shared capital payment created successfully');
                        return redirect()->back()->with('Record-updated', 'Shared capital payment recorded successfully.');
                    } catch (\Exception $e) {
                        Log::error('Shared capital payment creation failed: ' . $e->getMessage());
                        return redirect()->back()->with('error', 'Failed to record shared capital payment. Please try again.');
                    }
                    break;

                case 'Time Deposit':
                    try {
                        // Add time deposit logic here
                        PaymentModel::create($pay);
                        Log::info('Time deposit payment created successfully');
                        return redirect()->back()->with('Record-updated', 'Time deposit recorded successfully.');
                    } catch (\Exception $e) {
                        Log::error('Time deposit payment creation failed: ' . $e->getMessage());
                        return redirect()->back()->with('error', 'Failed to record time deposit. Please try again.');
                    }
                    break;

                case 'Savings':
                    try {
                        // Add savings logic here
                        PaymentModel::create($pay);
                        Log::info('Savings payment created successfully');
                        return redirect()->back()->with('Record-updated', 'Savings payment recorded successfully.');
                    } catch (\Exception $e) {
                        Log::error('Savings payment creation failed: ' . $e->getMessage());
                        return redirect()->back()->with('error', 'Failed to record savings payment. Please try again.');
                    }
                    break;

                default:
                    return redirect()->back()->with('error', 'Unknown transaction type.');
            }
        }

        // Case 4: Non-loan payment with loan number (error)
        elseif ($pay['loan_number'] !== null && $pay['transaction_type'] !== 'Loan Payment') {
            return redirect()->back()->with('error', 'No need for Loan number for this transaction type.');
        }
        
        // Fallback error
        return redirect()->back()->with('error', 'Invalid transaction parameters.');
    }
}
