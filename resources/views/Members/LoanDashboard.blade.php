<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}">
        <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../src/javascript/loan-dashboard.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode/1.5.3/qrcode.min.js"></script>

    <title>Loan Dashboard | GBLDC </title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      /* Custom animations */
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }
      .animate-fadeIn {
        animation: fadeIn 0.3s ease-in-out;
      }
      
      /* Mobile menu slide animation */
      .sidebar-transition {
        transition: transform 0.3s ease-in-out;
      }
      
      /* Ensure tables are scrollable on mobile */
      .table-container {
        overflow-x: auto;
      }
    </style>
  </head>
  <body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex relative">
      <!-- Mobile Menu Overlay -->
      <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>
      
      <!-- Mobile Menu Button -->
      <button id="mobileMenuBtn" class="fixed top-4 left-4 z-50 lg:hidden bg-white p-2 rounded-md shadow-md">
        <i class="fas fa-bars text-gray-600"></i>
      </button>

      <!-- Sidebar -->
      <aside id="sidebar" class="w-80 lg:w-1/5 bg-white h-screen p-3 lg:p-5 shadow-lg flex flex-col fixed lg:relative z-50 transform -translate-x-full lg:translate-x-0 sidebar-transition">
        <!-- Close button for mobile -->
        <button id="closeSidebarBtn" class="self-end mb-4 lg:hidden">
          <i class="fas fa-times text-gray-600"></i>
        </button>
        
        <!-- Logo Section -->
        <div class="flex items-center space-x-2 lg:space-x-3 mb-4">
          <div class="w-12 h-12 lg:w-16 lg:h-16 rounded-full flex items-center justify-center">
            <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" class="text-xl lg:text-2xl"></img>
          </div>
          <h1 class="text-xl lg:text-3xl font-bold tracking-wider text-gray-800">GBLDC</h1>
        </div>
        
        <!-- User Profile -->
        <div class="mb-6">
          <div class="flex items-center space-x-3 mb-4 p-2 bg-gray-50 rounded-lg">
            <div class="w-12 h-12 lg:w-16 lg:h-16 rounded-full flex items-center justify-center overflow-hidden {{ strtolower($gender) == 'female' ? 'bg-pink-100' : 'bg-blue-100' }}">
              @if(strtolower($gender) == 'female')
                <!-- Female Default Profile Icon -->
                <svg class="w-10 h-10 lg:w-12 lg:h-12 text-pink-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                </svg>
              @else
                <!-- Male Default Profile Icon -->
                <svg class="w-10 h-10 lg:w-12 lg:h-12 text-blue-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                </svg>
              @endif
            </div>
            <div class="flex-1 min-w-0">
              <p class="font-semibold text-sm lg:text-base truncate">{{$fist_name}} {{$middle_name}} {{$last_name}}</p>
              <p class="text-xs lg:text-sm text-gray-500 truncate">{{$email}}</p>
            </div>
          </div>


          
          <!-- Navigation -->
          <nav class="flex flex-col gap-1 lg:gap-2">
            <a href="{{route ('Member.Landing')}}" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fa-solid fa-list"></i>
              <span class="truncate">Home</span>
            </a>
            <a href="http://localhost:8000/GBLDC-Member-Loan-Dashboard" class="flex items-center p-3 lg:p-4 bg-green-500 text-white rounded-lg font-medium text-sm lg:text-base">
              <i class="fa-solid fa-house mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Loan Dashboard</span>
            </a>
            <a href="{{ route('Member.Check.Loan.Status') }}" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fa-solid fa-money-bill-wave mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Check Loan Status</span>
            </a>



            <a href="{{ route('Under.Construction') }}" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fas fa-envelope mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Contact Us</span>
            </a>
            <a href="{{ route('Under.Construction') }}" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fas fa-question-circle mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">FAQ</span>
            </a>
            <a href="{{ route('Under.Construction') }}" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fas fa-cog mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Account Settings</span>
            </a>

            <a href="#" onclick="openLogoutModal()" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fas fa-sign-out-alt mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Logout</span>
            </a>
            </a>
          </nav>
          
          <!-- App Download Section -->
          <div
                    class="mt-6 lg:mt-10 text-center p-4 bg-green-50 rounded-lg">
                    <h2
                        class="text-sm lg:text-base font-bold text-green-800">Get
                        the App Now</h2>
                    <div
                        class="w-16 h-16 lg:w-20 lg:h-20 rounded-lg flex items-center justify-center mx-auto mt-2">
                        <img
                            src="{{asset('images/logocoop-removebg-preview-2.png')}}" />
                    </div>
                    <a
                        href="https://play.google.com/store" target="_blank"
                        class="w-full inline-block mt-3 px-4 py-2 bg-green-600 text-white rounded-lg font-medium text-sm hover:bg-green-700 transition-colors text-center">
                        Download from Google Play
                    </a>
                    <a
                        href="https://www.apple.com/app-store/" target="_blank"
                        class="w-full inline-block mt-2 px-4 py-2 bg-gray-800 text-white rounded-lg font-medium text-sm hover:bg-gray-900 transition-colors text-center">
                        Download from App Store
                    </a>
                    <p class="text-xs text-gray-500 mt-3">
                        Example links. Replace with your app's store URLs.
                    </p>
                </div>
        </div>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 p-4 lg:p-6 ml-0 lg:ml-0">
        <!-- Welcome Section -->
        <div class="mt-12 lg:mt-0 mb-6">
          <h1 class="text-xl lg:text-2xl xl:text-3xl font-bold">Welcome, {{$fist_name}} {{$last_name}}</h1>
          <p class="text-gray-600 text-sm lg:text-base">Here's your loan status and payment details.</p>
          <hr class="border-gray-300 mt-4 lg:mt-6">
        </div>

        <!-- Loan Status and Credit Score -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6 mb-6">
          <!-- Loan Details Card -->
          <section class="lg:col-span-2 bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h2 class="text-lg lg:text-xl font-semibold text-teal-950 mb-4">Loan Details</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <p class="text-gray-500 text-xs lg:text-sm">Loan Number:</p>
                <p class="text-gray-800 font-bold text-sm lg:text-base">{{{$loanInfo->loan_number ?? '0'}}}</p>
              </div>
              <div>
                <p class="text-gray-500 text-xs lg:text-sm">Approved Amount:</p>
                <p class="text-gray-800 font-bold text-sm lg:text-base">Php {{$loanInfo->loan_amount ?? '0'}}</p>
              </div>
              <div>
                <p class="text-gray-500 text-xs lg:text-sm">Interest Rate:</p>
                <p class="text-gray-800 font-bold text-sm lg:text-base">5%</p>
              </div>
              <div>
                <p class="text-gray-500 text-xs lg:text-sm">Repayment Period:</p>
                <p class="text-gray-800 font-bold text-sm lg:text-base">{{$loanInfo->loan_term ?? 'Not set'}}</p>
              </div>
              
            </div>
          </section>
        </div>

        <!-- Payment Status & Loan History Section (side by side on large screens) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
          <!-- Payment Status Section -->
          <section class="bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h2 class="text-lg lg:text-xl font-semibold text-teal-950 mb-4">Repayment Status</h2>
            @php
            $lastLoanPayment = null;
            $lastSharedPayment = null;
            foreach ($PaymentHistory as $payment) {
                if ($payment->transaction_type == 'Loan Payment' && (!$lastLoanPayment || strtotime($payment->transaction_date) > strtotime($lastLoanPayment))) {
                    $lastLoanPayment = $payment->transaction_date;
                } elseif ($payment->transaction_type == 'Shared Capital' && (!$lastSharedPayment || strtotime($payment->transaction_date) > strtotime($lastSharedPayment))) {
                    $lastSharedPayment = $payment->transaction_date;
                }
            }
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
              <div id="loan-payment-div" class="p-3 bg-gray-50 rounded-lg" data-frequency="{{$loanInfo->frequency_of_payment ?? ''}}" data-last-payment="{{ $lastLoanPayment }}" data-start-date="{{ $loanPaymentStartDate }}">
                <p class="text-gray-700 text-sm font-medium">Loan Payment:</p>
                <p class="text-gray-600 text-sm">{{$loanInfo->frequency_of_payment ?? 'Not set'}} - Due Amount: PHP {{$loanInfo->due_amount ?? 'Not set'}}</p>
              </div>
              <div id="shared-capital-div" class="p-3 bg-gray-50 rounded-lg" data-frequency="{{$sharedCapitalInfo->payment_frequency ?? ''}}" data-last-payment="{{ $lastSharedPayment }}" data-start-date="{{ $sharedCapitalPaymentStartDate }}">
                <p class="text-gray-700 text-sm font-medium">Shared Capital Payment:</p>
                <p class="text-gray-600 text-sm">{{$sharedCapitalInfo->payment_frequency ?? 'Not set'}} - Due Amount: PHP {{$sharedCapitalInfo->payment_amount_per_schedule ?? 'Not set'}}</p>
              </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
              <button id="makePaymentBtn" class="bg-green-600 text-white rounded-lg py-3 px-6 hover:bg-green-700 transition-colors font-medium flex-1 sm:flex-none">
                <i class="fas fa-credit-card mr-2"></i>Make a Payment
              </button>
              <button id="paymentScheduleBtn" onclick="openPaymentScheduleModal()" class="bg-green-600 text-white rounded-lg py-3 px-6 hover:bg-green-700 transition-colors font-medium flex-1 sm:flex-none">
                <i class="fas fa-calendar mr-2"></i>Payment Schedule
              </button>
            </div>
          </section>
          <!-- Loan History Record Card -->
          <section class="bg-white p-2 lg:p-2 rounded-lg shadow-md text-center flex flex-col items-center justify-center mb-1">
            <h2 class="text-base lg:text-lg font-bold mb-4 mt-3 text-teal-950">Loan History Record</h2>
            <div class="w-full table-container">
              <table class="w-full text-left border-collapse min-w-[300px]">
                <thead>
                  <tr class="bg-gray-100 text-gray-600">
                    <th class="p-2 text-xs font-medium">Loan ID</th>
                    <th class="p-2 text-xs font-medium">Amount</th>
                    <th class="p-2 text-xs font-medium">Balance</th>
                    <th class="p-2 text-xs font-medium">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($loans as $loan)
                    <tr class="border-t hover:bg-gray-50">
                    <td class="p-2 text-xs">{{$loan->loan_number}}</td>
                    <td class="p-2 text-xs font-medium">{{$loan->loan_amount}}</td>
                    <td class="p-2 text-xs font-medium">{{$loan->loan_balance}}</td>
                    <td class="p-2 text-xs">{{$loan->loan_status}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
            <!-- View Full History Link -->
            <a href="{{ route('Member.Loan.History') }}" class="mt-4 text-green-600 text-xs font-medium hover:underline mb-3">View Full History</a>


          </section>
        </div>

        <!-- Payment History Table -->
        <section class="bg-white rounded-lg shadow-md p-4 lg:p-6">
          <h2 class="text-lg lg:text-xl font-semibold text-teal-950 mb-4">Payment History</h2>
          <div class="table-container">
            <table class="w-full text-left border-collapse min-w-[500px]" id="paymentHistoryTable">
              <thead>
                <tr class="bg-gray-100 text-gray-600">
                  <th class="p-3 text-sm font-medium">Transaction Type</th>
                  <th class="p-3 text-sm font-medium">Amount</th>
                  <th class="p-3 text-sm font-medium">Mode of Payment</th>
                  <th class="p-3 text-sm font-medium">Status</th>
                  <th class="p-3 text-sm font-medium">Date</th>
                  <th class="p-3 text-sm font-medium">Reference #</th>
                </tr>
              </thead>
              <tbody id="paymentHistoryBody">
                @foreach ($PaymentHistory as $payment)
                <tr class="border-t hover:bg-gray-50">
                  <td class="p-3 text-sm">{{$payment->transaction_type}}</td>
                  <td class="p-3 text-sm">{{{$payment->payment_amount}}}</td>
                  <td class="p-3 text-sm">{{$payment->payment_method}}</td>
                  <td class="p-3 text-sm ">{{$payment->payment_status}}</td>
                  <td class="p-3 text-sm">{{$payment->transaction_date}}</td>
                  <td class="p-3 text-sm">{{$payment->reference_number}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- View Full History Link - Center Bottom -->
          <div class="flex justify-center mt-4">
            <a href="{{ route('Full.Payment.History') }}" class="text-green-600 text-sm font-medium hover:underline">View Full History</a>
          </div>

        </section>

      </main>

      <!-- Payment Modal -->
      <div id="paymentModal" class="fixed inset-0 flex items-center justify-center hidden z-50 p-4">
        <div class="bg-white rounded-lg p-6 lg:p-8 w-full max-w-md shadow-xl">
          <h2 class="text-xl font-bold text-gray-800 mb-2">Make a Payment</h2>
          <p class="text-sm text-gray-600 mb-6">Enter your payment details to proceed.</p>
          <form id="paymentForm" class="space-y-4">
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-2">Amount (PHP):</label>
              <input id="paymentAmount" type="number" value="4375" required 
                     class="w-full p-3 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none transition-colors">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-2">Payment Method:</label>
              <select id="paymentMethod" 
                      class="w-full p-3 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none transition-colors">
                <option value="card">Credit/Debit Card</option>
                <option value="gcash">Gcash</option>
              </select>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 pt-4">
              <button id="cancelPayment" type="button" 
                      class="flex-1 bg-gray-300 text-gray-800 rounded-lg py-3 px-4 hover:bg-gray-400 transition-colors font-medium">
                Cancel
              </button>
              <button id="submitPayment" type="submit" 
                      class="flex-1 bg-green-600 text-white rounded-lg py-3 px-4 hover:bg-green-700 transition-colors font-medium">
                Pay Now
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Payment Schedule Selection Modal -->
      <div id="paymentScheduleModal" class="fixed inset-0 z-[60] flex items-center justify-center hidden">
        <div id="paymentScheduleModalContent" class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 transform transition-all duration-300 relative z-[61]">
          <div class="text-center">
            <!-- Icon -->
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
              <i class="fas fa-calendar text-green-600 text-xl"></i>
            </div>

            <!-- Title -->
            <h3 class="text-lg font-medium text-gray-900 mb-2">
              Select Payment Schedule Type
            </h3>

            <!-- Message -->
            <p class="text-sm text-gray-500 mb-6">
              Choose which payment schedule you want to view.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-2 justify-center">
              <a href="{{ route('Payment.Schedule', ['type' => 'loan']) }}"
                class="px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 inline-block text-center">
                <i class="fas fa-money-bill-wave mr-2"></i>Loan Schedule
              </a>
              <a href="{{ route('Payment.Schedule', ['type' => 'shared_capital']) }}"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 inline-block text-center">
                <i class="fas fa-piggy-bank mr-2"></i>Shared Capital Schedule
              </a>
            </div>
            <div class="mt-4">
              <button onclick="closePaymentScheduleModal()"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200 w-full">
                Cancel
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Logout Confirmation Modal -->
      <div id="logout-modal"
        class="fixed inset-0 z-[60] flex items-center justify-center hidden">
        <div id="logout-modal-content"
          class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 transform transition-all duration-300 relative z-[61]">
          <div class="text-center">
            <!-- Icon -->
            <div
              class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
              <i class="fas fa-sign-out-alt text-red-600 text-xl"></i>
            </div>

            <!-- Title -->
            <h3 class="text-lg font-medium text-gray-900 mb-2">
              Confirm Logout
            </h3>

            <!-- Message -->
            <p class="text-sm text-gray-500 mb-6">
              Are you sure you want to logout? You will need to sign in again
              to
              access your account.
            </p>

            <!-- Buttons -->
            <div
              class="flex flex-col sm:flex-row gap-3 sm:gap-2 justify-center">
              <button onclick="closeLogoutModal()"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                Cancel
              </button>
              <a href="{{ route('Member.Logout') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200 inline-block text-center">
                Logout
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- QR Code Modal -->
      <div id="qrCodeModal" class="fixed inset-0 flex items-center justify-center hidden z-50 p-4">
        <div class="bg-white rounded-lg p-6 lg:p-8 w-full max-w-md shadow-xl">
          <h2 class="text-xl font-bold text-gray-800 mb-2 text-center">GCash Payment QR Code</h2>
          <p class="text-sm text-gray-600 mb-6 text-center">Scan this QR code to make payment via GCash.</p>
          <div class="flex justify-center mb-6">
            <div id="qrcode" class="border border-gray-300 p-4 rounded-lg"></div>
          </div>
          <div class="text-center">
            <button id="closeQrModal" class="bg-green-600 text-white rounded-lg py-3 px-6 hover:bg-green-700 transition-colors font-medium">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Logout Modal Functions
      function openLogoutModal() {
        document.getElementById('logout-modal').classList.remove('hidden');
      }

      function closeLogoutModal() {
        document.getElementById('logout-modal').classList.add('hidden');
      }

      // Payment Schedule Modal Functions
      function openPaymentScheduleModal() {
        document.getElementById('paymentScheduleModal').classList.remove('hidden');
      }

      function closePaymentScheduleModal() {
        document.getElementById('paymentScheduleModal').classList.add('hidden');
      }

      // Close modals when clicking outside
      document.getElementById('logout-modal').addEventListener('click', function(e) {
        if (e.target === this) {
          closeLogoutModal();
        }
      });

      document.getElementById('paymentScheduleModal').addEventListener('click', function(e) {
        if (e.target === this) {
          closePaymentScheduleModal();
        }
      });

      // Function to check payment status and update background colors
      function checkPaymentDue() {
        const now = new Date();
        const currentMonth = now.getMonth();
        const currentYear = now.getFullYear();

        // Helper function to check if payment was made recently based on start date and frequency
        function hasRecentPayment(lastPaymentDate, frequency, startDate) {
          if (!lastPaymentDate) return false;
          const lastPayment = new Date(lastPaymentDate);
          const timeDiff = now - lastPayment;
          const daysDiff = timeDiff / (1000 * 3600 * 24);

          if (frequency.includes('daily')) {
            return daysDiff < 1; // Paid today
          } else if (frequency.includes('weekly')) {
            return daysDiff < 7; // Paid within last week
          } else if (frequency.includes('monthly')) {
            // Check if payment was made in the current month based on start date
            if (startDate) {
              const startDateObj = new Date(startDate);
              const startMonth = startDateObj.getMonth();
              const startYear = startDateObj.getFullYear();

              // Calculate months since start date
              const monthsSinceStart = (currentYear - startYear) * 12 + (currentMonth - startMonth);

              // Check if payment was made for the current period
              const lastPaymentMonth = lastPayment.getMonth();
              const lastPaymentYear = lastPayment.getFullYear();
              const paymentMonthsSinceStart = (lastPaymentYear - startYear) * 12 + (lastPaymentMonth - startMonth);

              return paymentMonthsSinceStart >= monthsSinceStart;
            } else {
              return lastPayment.getMonth() === currentMonth && lastPayment.getFullYear() === currentYear; // Paid this month
            }
          }
          return false;
        }

        // Check Loan Payment
        const loanDiv = document.getElementById('loan-payment-div');
        const loanFrequency = loanDiv.getAttribute('data-frequency').toLowerCase();
        const loanLastPayment = loanDiv.getAttribute('data-last-payment');
        const loanStartDate = loanDiv.getAttribute('data-start-date');
        const loanHasRecentPayment = hasRecentPayment(loanLastPayment, loanFrequency, loanStartDate);

        // Reset classes
        loanDiv.classList.remove('bg-red-50', 'bg-green-50');

        if (loanFrequency === 'not set' || loanFrequency === '') {
          // Keep default gray background if no loan
          loanDiv.classList.add('bg-gray-50');
        } else if (loanHasRecentPayment) {
          loanDiv.classList.add('bg-green-50'); // Green if paid
        } else {
          loanDiv.classList.add('bg-red-50'); // Red if not paid
        }

        // Check Shared Capital Payment
        const sharedDiv = document.getElementById('shared-capital-div');
        const sharedFrequency = sharedDiv.getAttribute('data-frequency').toLowerCase();
        const sharedLastPayment = sharedDiv.getAttribute('data-last-payment');
        const sharedStartDate = sharedDiv.getAttribute('data-start-date');
        const sharedHasRecentPayment = hasRecentPayment(sharedLastPayment, sharedFrequency, sharedStartDate);

        // Reset classes
        sharedDiv.classList.remove('bg-red-50', 'bg-green-50');

        if (sharedFrequency === 'not set' || sharedFrequency === '') {
          // Keep default gray background if no shared capital
          sharedDiv.classList.add('bg-gray-50');
        } else if (sharedHasRecentPayment) {
          sharedDiv.classList.add('bg-green-50'); // Green if paid
        } else {
          sharedDiv.classList.add('bg-red-50'); // Red if not paid
        }
      }

      // Run the check on page load
      document.addEventListener('DOMContentLoaded', checkPaymentDue);
    </script>
  </body>
</html>
