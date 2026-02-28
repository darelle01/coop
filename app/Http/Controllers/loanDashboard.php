<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\loan;
use App\Models\paymentModel;
class loanDashboard extends Controller
{
    public function view(){
        $fist_name = Auth::guard('officialmember')->user()->first_name;
        $middle_name = Auth::guard('officialmember')->user()->middle_name;
        $last_name = Auth::guard('officialmember')->user()->last_name;
        $email = Auth::guard('officialmember')->user()->email;
        $member_id = Auth::guard('officialmember')->user()->member_id;
        $gender = Auth::guard('officialmember')->user()->gender;
        $PaymentHistory = paymentModel::where('member_id', $member_id)->get();
        $loans = loan::where('member_id', $member_id)->get();

        $loanInfo = loan::where('member_id', $member_id)->where('loan_status', '!=', 'Fully Paid')->orderBy('created_at', 'desc')->first();
        $sharedCapitalInfo = \App\Models\sharedCapital::where('member_id', $member_id)->first();

        // Calculate current due amounts
        $currentDueLoan = $loanInfo ? $loanInfo->due_amount : 'Not set';
        $currentDueSharedCapital = $sharedCapitalInfo ? $sharedCapitalInfo->payment_amount_per_schedule : 'Not set';

        // Get payment start dates
        $loanPaymentStartDate = $loanInfo ? $loanInfo->payment_start_date : null;
        $sharedCapitalPaymentStartDate = $sharedCapitalInfo ? $sharedCapitalInfo->payment_start_date : null;

        // dd($loanInfo);
        return view('Members.LoanDashboard', compact('fist_name', 'middle_name', 'last_name','email','loanInfo','PaymentHistory','loans', 'sharedCapitalInfo', 'currentDueLoan', 'currentDueSharedCapital', 'loanPaymentStartDate', 'sharedCapitalPaymentStartDate', 'gender'));
    }

    public function paymentSchedule($type = null){
        $fist_name = Auth::guard('officialmember')->user()->first_name;
        $middle_name = Auth::guard('officialmember')->user()->middle_name;
        $last_name = Auth::guard('officialmember')->user()->last_name;
        $email = Auth::guard('officialmember')->user()->email;
        $member_id = Auth::guard('officialmember')->user()->member_id;
        $gender = Auth::guard('officialmember')->user()->gender;

        $currentDay = date('j');
        $currentMonth = date('n');
        $currentYear = date('Y');

        $loanInfo = null;
        $sharedCapitalInfo = null;
        $loanScheduleData = null;
        $sharedCapitalScheduleData = null;
        $paymentHistory = paymentModel::where('member_id', $member_id)->get();

        if ($type === 'loan' || $type === null) {
            $loanInfo = loan::where('member_id', $member_id)->first();
            if ($loanInfo) {
                // Generate loan schedule data based on frequency
                $loanScheduleData = $this->generateScheduleData($loanInfo->frequency_of_payment ?? 'monthly', $loanInfo->payment_start_date ?? null, $paymentHistory, 'Loan Payment');
            }
        }

        if ($type === 'shared_capital' || $type === null) {
            $sharedCapitalInfo = \App\Models\sharedCapital::where('member_id', $member_id)->first();
            if ($sharedCapitalInfo) {
                // Generate shared capital schedule data
                $sharedCapitalScheduleData = $this->generateScheduleData($sharedCapitalInfo->payment_frequency ?? 'monthly', $sharedCapitalInfo->payment_start_date ?? null, $paymentHistory, 'Shared Capital');
            }
        }

        return view('Members.PaymentSchedule', compact(
            'fist_name', 'middle_name', 'last_name', 'email',
            'loanInfo', 'sharedCapitalInfo', 'loanScheduleData', 'sharedCapitalScheduleData', 'type',
            'currentDay', 'currentMonth', 'currentYear', 'gender'
        ));
    }

    private function generateScheduleData($frequency, $paymentStartDate = null, $paymentHistory = null, $paymentType = 'Payment') {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $frequency = strtolower($frequency);

        if (str_contains(strtolower($frequency), 'daily') || str_contains(strtolower($frequency), 'weekly')) {
            $paymentDays = [];
            $daysInMonth = date('t', strtotime("$currentYear-$currentMonth-01"));

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $isPaymentDay = false;
                $isOverdue = false;
                $paymentMade = false;

                // Determine if this is a payment day based on frequency and start date
                if ($paymentStartDate) {
                    $startDate = new \DateTime($paymentStartDate);
                    $currentDate = new \DateTime("$currentYear-$currentMonth-$day");

                    if (str_contains(strtolower($frequency), 'daily')) {
                        $isPaymentDay = ($currentDate >= $startDate);
                    } elseif (str_contains(strtolower($frequency), 'weekly')) {
                        $daysDiff = $startDate->diff($currentDate)->days;
                        $isPaymentDay = ($daysDiff % 7 == 0 && $currentDate >= $startDate);
                    }
                }

                // Check if payment was made for this day
                if ($paymentHistory && $isPaymentDay) {
                    $paymentDate = date('Y-m-d', strtotime("$currentYear-$currentMonth-$day"));
                    $paymentMade = $paymentHistory->where('transaction_date', $paymentDate)->where('transaction_type', $paymentType)->count() > 0;
                }

                // Check if payment is overdue (past due date and not paid)
                if ($isPaymentDay && !$paymentMade) {
                    $paymentDueDate = strtotime("$currentYear-$currentMonth-$day");
                    $today = strtotime(date('Y-m-d'));
                    $isOverdue = ($paymentDueDate < $today);
                }

                $paymentDays[] = [
                    'day' => $day,
                    'isPaymentDay' => $isPaymentDay,
                    'isOverdue' => $isOverdue,
                    'paymentMade' => $paymentMade
                ];
            }

            return [
                'type' => 'calendar',
                'frequency' => $frequency,
                'year' => $currentYear,
                'month' => $currentMonth,
                'days' => $daysInMonth,
                'paymentDays' => $paymentDays
            ];
        } else {
            // Monthly
            $months = [];
            $currentMonthNum = date('n');
            $currentYearNum = date('Y');
            
            for ($i = 0; $i < 12; $i++) {
                $monthDate = strtotime("+$i months", strtotime("$currentYear-01-01"));
                $monthName = date('F', $monthDate);
                $monthNum = date('n', $monthDate);
                $yearNum = date('Y', $monthDate);
                
                // Check if payment was made for this month
                $paymentMade = false;
                $isOverdue = false;
                $isFuture = false;
                
                if ($paymentHistory && $paymentStartDate) {
                    $startDate = new \DateTime($paymentStartDate);
                    $checkDate = new \DateTime("$yearNum-$monthNum-01");
                    
                    // Only check months after payment start date
                    if ($checkDate >= $startDate) {
                        // Check if payment exists for this month
                        foreach ($paymentHistory as $payment) {
                            $paymentDate = new \DateTime($payment->transaction_date);
                            if ($paymentDate->format('n') == $monthNum && 
                                $paymentDate->format('Y') == $yearNum &&
                                $payment->transaction_type == $paymentType) {
                                $paymentMade = true;
                                break;
                            }
                        }
                        
                        // Determine if overdue or future
                        if (!$paymentMade) {
                            if ($yearNum < $currentYearNum || 
                                ($yearNum == $currentYearNum && $monthNum < $currentMonthNum)) {
                                $isOverdue = true;
                            } elseif ($yearNum > $currentYearNum || 
                                      ($yearNum == $currentYearNum && $monthNum > $currentMonthNum)) {
                                $isFuture = true;
                            }
                        }
                    } else {
                        // Before payment start date - treat as future/unpaid
                        $isFuture = true;
                    }
                }
                
                $months[] = [
                    'name' => $monthName,
                    'month' => $monthNum,
                    'year' => $yearNum,
                    'paymentMade' => $paymentMade,
                    'isOverdue' => $isOverdue,
                    'isFuture' => $isFuture
                ];
            }
            
            return [
                'type' => 'monthly',
                'frequency' => 'monthly',
                'months' => $months,
                'currentMonth' => $currentMonthNum,
                'currentYear' => $currentYearNum
            ];
        }
    }

    public function loanHistory(){
        $fist_name = Auth::guard('officialmember')->user()->first_name;
        $middle_name = Auth::guard('officialmember')->user()->middle_name;
        $last_name = Auth::guard('officialmember')->user()->last_name;
        $email = Auth::guard('officialmember')->user()->email;
        $member_id = Auth::guard('officialmember')->user()->member_id;
        $loans = loan::where('member_id', $member_id)->get();

        return view('Members.MemberLoanHistory', compact('fist_name', 'middle_name', 'last_name','email','loans'));
    }

    public function fullPaymentHistory(){
        $fist_name = Auth::guard('officialmember')->user()->first_name;
        $middle_name = Auth::guard('officialmember')->user()->middle_name;
        $last_name = Auth::guard('officialmember')->user()->last_name;
        $email = Auth::guard('officialmember')->user()->email;
        $member_id = Auth::guard('officialmember')->user()->member_id;
        $gender = Auth::guard('officialmember')->user()->gender;
        
        // Get ALL payment history (both Loan Payments and Shared Capital)
        $allPayments = paymentModel::where('member_id', $member_id)
            ->orderBy('transaction_date', 'desc')
            ->get();

        return view('Members.FullPaymentHistory', compact('fist_name', 'middle_name', 'last_name', 'email', 'allPayments', 'gender'));
    }

    public function checkLoanStatus(){
        $fist_name = Auth::guard('officialmember')->user()->first_name;
        $middle_name = Auth::guard('officialmember')->user()->middle_name;
        $last_name = Auth::guard('officialmember')->user()->last_name;
        $email = Auth::guard('officialmember')->user()->email;
        $member_id = Auth::guard('officialmember')->user()->member_id;

        // Get current active loan (not fully paid)
        $currentLoan = loan::where('member_id', $member_id)
            ->where('loan_status', '!=', 'Fully Paid')
            ->orderBy('created_at', 'desc')
            ->first();

        // Get payment history for current loan
        $loanPaymentHistory = null;
        if ($currentLoan) {
            $loanPaymentHistory = paymentModel::where('member_id', $member_id)
                ->where('transaction_type', 'Loan Payment')
                ->where('loan_number', $currentLoan->loan_number)
                ->orderBy('transaction_date', 'desc')
                ->get();
        }

        // Calculate loan progress
        $loanProgress = 0;
        $totalPaid = 0;
        if ($currentLoan && $currentLoan->loan_amount > 0) {
            $totalPaid = $currentLoan->loan_amount - $currentLoan->loan_balance;
            $loanProgress = ($totalPaid / $currentLoan->loan_amount) * 100;
        }

        return view('Members.CheckLoanStatus', compact(
            'fist_name', 'middle_name', 'last_name', 'email',
            'currentLoan', 'loanPaymentHistory', 'loanProgress', 'totalPaid'
        ));
    }

    public function underConstruction(){
        return view('Members.UnderConstruction');
    }

}
