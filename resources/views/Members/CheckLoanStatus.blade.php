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

    <title>Check Loan Status | GBLDC </title>
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

      /* Progress bar animation */
      @keyframes progressFill {
        from { width: 0%; }
        to { width: var(--progress-width); }
      }
      .progress-fill {
        animation: progressFill 1s ease-out forwards;
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
            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-blue-100 rounded-full flex items-center justify-center">
              <img src="{{asset('images/profile.png')}}" alt="Profile" class="rounded-full w-full h-full object-cover"></img>
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
            <a href="{{route('Loan.Dashboard')}}" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base">
              <i class="fa-solid fa-house mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Loan Dashboard</span>
            </a>
            <a href="{{ route('Member.Check.Loan.Status') }}" class="flex items-center p-3 lg:p-4 bg-green-500 text-white rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fa-solid fa-money-bill-wave mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Check Loan Status</span>
            </a>
            <a href="contact-us.html" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fas fa-envelope mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Contact Us</span>
            </a>
            <a href="user-faq.html" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fas fa-question-circle mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">FAQ</span>
            </a>
            <a href="account-settings.html" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fas fa-cog mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Account Settings</span>
            </a>
            <a href="#" onclick="openLogoutModal()" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
              <i class="fas fa-sign-out-alt mr-2 lg:mr-3 w-4"></i>
              <span class="truncate">Logout</span>
            </a>
          </nav>

          <!-- App Download Section -->
          <div class="mt-6 lg:mt-10 text-center p-4 bg-green-50 rounded-lg">
            <h2 class="text-sm lg:text-base font-bold text-green-800">Get the App Now</h2>
            <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-lg flex items-center justify-center mx-auto mt-2">
              <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" />
            </div>
            <a href="https://play.google.com/store" target="_blank" class="w-full inline-block mt-3 px-4 py-2 bg-green-600 text-white rounded-lg font-medium text-sm hover:bg-green-700 transition-colors text-center">
              Download from Google Play
            </a>
            <a href="https://www.apple.com/app-store/" target="_blank" class="w-full inline-block mt-2 px-4 py-2 bg-gray-800 text-white rounded-lg font-medium text-sm hover:bg-gray-900 transition-colors text-center">
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
          <h1 class="text-xl lg:text-2xl xl:text-3xl font-bold">Check Loan Status</h1>
          <p class="text-gray-600 text-sm lg:text-base">View all details of your current loan.</p>
          <hr class="border-gray-300 mt-4 lg:mt-6">
        </div>

        @if($currentLoan)
        <!-- Loan Status Overview Card -->
        <div class="bg-white rounded-lg shadow-md p-4 lg:p-6 mb-6">
          <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-4">
            <h2 class="text-lg lg:text-xl font-semibold text-teal-950">Current Loan Status</h2>
            <span class="mt-2 lg:mt-0 px-4 py-2 rounded-full text-sm font-medium 
              @if($currentLoan->loan_status == 'Active' || $currentLoan->loan_status == 'active') bg-green-100 text-green-800
              @elseif($currentLoan->loan_status == 'Pending' || $currentLoan->loan_status == 'pending') bg-yellow-100 text-yellow-800
              @elseif($currentLoan->loan_status == 'Approved' || $currentLoan->loan_status == 'approved') bg-blue-100 text-blue-800
              @else bg-gray-100 text-gray-800 @endif">
              {{ $currentLoan->loan_status }}
            </span>
          </div>

          <!-- Progress Bar -->
          <div class="mb-6">
            <div class="flex justify-between text-sm mb-2">
              <span class="text-gray-600">Loan Progress</span>
              <span class="font-medium text-gray-800">{{ number_format($loanProgress, 2) }}% Paid</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3">
              <div class="bg-green-600 h-3 rounded-full progress-fill" style="--progress-width: {{ $loanProgress }}%; width: {{ $loanProgress }}%"></div>
            </div>
            <div class="flex justify-between text-xs text-gray-500 mt-1">
              <span>Php {{ number_format($totalPaid, 2) }} paid</span>
              <span>Php {{ number_format($currentLoan->loan_amount, 2) }} total</span>
            </div>
          </div>
        </div>

        <!-- Loan Details Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 mb-6">
          <!-- Basic Loan Information -->
          <section class="bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h3 class="text-md lg:text-lg font-semibold text-teal-950 mb-4 flex items-center">
              <i class="fas fa-file-invoice-dollar mr-2 text-green-600"></i>
              Loan Information
            </h3>
            <div class="space-y-3">
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Loan Number:</span>
                <span class="font-medium text-sm">{{ $currentLoan->loan_number }}</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Loan Type:</span>
                <span class="font-medium text-sm">{{ $currentLoan->loan_type }}</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Loan Amount:</span>
                <span class="font-medium text-sm text-green-600">Php {{ number_format($currentLoan->loan_amount, 2) }}</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Current Balance:</span>
                <span class="font-medium text-sm text-red-600">Php {{ number_format($currentLoan->loan_balance, 2) }}</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Loan Term:</span>
                <span class="font-medium text-sm">{{ $currentLoan->loan_term }} months</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Interest Rate:</span>
                <span class="font-medium text-sm">5%</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Payment Frequency:</span>
                <span class="font-medium text-sm">{{ $currentLoan->frequency_of_payment }}</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Due Amount:</span>
                <span class="font-medium text-sm">Php {{ number_format($currentLoan->due_amount, 2) }}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-500 text-sm">Payment Start Date:</span>
                <span class="font-medium text-sm">{{ $currentLoan->payment_start_date ? date('M d, Y', strtotime($currentLoan->payment_start_date)) : 'Not set' }}</span>
              </div>
            </div>
          </section>

          <!-- Purpose & Additional Info -->
          <section class="bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h3 class="text-md lg:text-lg font-semibold text-teal-950 mb-4 flex items-center">
              <i class="fas fa-info-circle mr-2 text-green-600"></i>
              Additional Details
            </h3>
            <div class="space-y-3">
              <div class="border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm block mb-1">Purpose of Loan:</span>
                <span class="font-medium text-sm">{{ $currentLoan->purpose_of_loan ?? 'Not specified' }}</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Date Applied:</span>
                <span class="font-medium text-sm">{{ $currentLoan->created_at ? $currentLoan->created_at->format('M d, Y') : 'N/A' }}</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Approved By:</span>
                <span class="font-medium text-sm">{{ $currentLoan->approved_by ?? 'Pending' }}</span>
              </div>
              <div class="flex justify-between border-b border-gray-100 pb-2">
                <span class="text-gray-500 text-sm">Encoded By:</span>
                <span class="font-medium text-sm">{{ $currentLoan->encoded_by ?? 'N/A' }}</span>
              </div>
            </div>
          </section>
        </div>

        <!-- Guarantor Information -->
        <div class="bg-white rounded-lg shadow-md p-4 lg:p-6 mb-6">
          <h3 class="text-md lg:text-lg font-semibold text-teal-950 mb-4 flex items-center">
            <i class="fas fa-users mr-2 text-green-600"></i>
            Guarantor Information
          </h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- First Guarantor -->
            <div class="p-3 bg-gray-50 rounded-lg">
              <h4 class="font-medium text-sm text-gray-700 mb-2">First Guarantor</h4>
              <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                  <span class="text-gray-500">Name:</span>
                  <span class="font-medium">{{ $currentLoan->g1_fullname ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-500">Relationship:</span>
                  <span class="font-medium">{{ $currentLoan->g1_relationship ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-500">Contact:</span>
                  <span class="font-medium">{{ $currentLoan->g1_contact_number ?? 'N/A' }}</span>
                </div>
              </div>
            </div>

            <!-- Second Guarantor -->
            <div class="p-3 bg-gray-50 rounded-lg">
              <h4 class="font-medium text-sm text-gray-700 mb-2">Second Guarantor</h4>
              <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                  <span class="text-gray-500">Name:</span>
                  <span class="font-medium">{{ $currentLoan->g2_fullname ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-500">Relationship:</span>
                  <span class="font-medium">{{ $currentLoan->g2_relationship ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-500">Contact:</span>
                  <span class="font-medium">{{ $currentLoan->g2_contact_number ?? 'N/A' }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Payment History -->
        <section class="bg-white rounded-lg shadow-md p-4 lg:p-6 mb-6">
          <h3 class="text-md lg:text-lg font-semibold text-teal-950 mb-4 flex items-center">
            <i class="fas fa-history mr-2 text-green-600"></i>
            Payment History for This Loan
          </h3>
          <div class="table-container">
            <table class="w-full text-left border-collapse min-w-[500px]">
              <thead>
                <tr class="bg-gray-100 text-gray-600">
                  <th class="p-3 text-sm font-medium">Date</th>
                  <th class="p-3 text-sm font-medium">Amount</th>
                  <th class="p-3 text-sm font-medium">Method</th>
                  <th class="p-3 text-sm font-medium">Status</th>
                  <th class="p-3 text-sm font-medium">Reference #</th>
                </tr>
              </thead>
              <tbody>
                @if($loanPaymentHistory && $loanPaymentHistory->count() > 0)
                  @foreach($loanPaymentHistory as $payment)
                  <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 text-sm">{{ $payment->transaction_date }}</td>
                    <td class="p-3 text-sm font-medium text-green-600">Php {{ number_format($payment->payment_amount, 2) }}</td>
                    <td class="p-3 text-sm">{{ $payment->payment_method }}</td>
                    <td class="p-3 text-sm">
                      <span class="px-2 py-1 rounded-full text-xs font-medium 
                        @if($payment->payment_status == 'Completed' || $payment->payment_status == 'completed') bg-green-100 text-green-800
                        @elseif($payment->payment_status == 'Pending' || $payment->payment_status == 'pending') bg-yellow-100 text-yellow-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ $payment->payment_status }}
                      </span>
                    </td>
                    <td class="p-3 text-sm">{{ $payment->reference_number }}</td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500 text-sm">
                      No payment records found for this loan.
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </section>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 mb-6">
          <a href="{{ route('Payment.Schedule', ['type' => 'loan']) }}" class="bg-green-600 text-white rounded-lg py-3 px-6 hover:bg-green-700 transition-colors font-medium text-center flex items-center justify-center">
            <i class="fas fa-calendar mr-2"></i>View Payment Schedule
          </a>
          <a href="{{ route('Loan.Dashboard') }}" class="bg-gray-600 text-white rounded-lg py-3 px-6 hover:bg-gray-700 transition-colors font-medium text-center flex items-center justify-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
          </a>
        </div>

        @else
        <!-- No Active Loan Message -->
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
          <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-gray-100 mb-4">
            <i class="fas fa-money-bill-wave text-gray-400 text-2xl"></i>
          </div>
          <h3 class="text-lg font-medium text-gray-900 mb-2">No Active Loan</h3>
          <p class="text-sm text-gray-500 mb-6">You currently don't have any active loans. All your loans have been fully paid or you haven't applied for a loan yet.</p>
          <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('Member.Loan.History') }}" class="bg-green-600 text-white rounded-lg py-3 px-6 hover:bg-green-700 transition-colors font-medium text-center">
              <i class="fas fa-history mr-2"></i>View Loan History
            </a>
            <a href="{{ route('Redirecting.LoanApp') }}" class="bg-blue-600 text-white rounded-lg py-3 px-6 hover:bg-blue-700 transition-colors font-medium text-center">
              <i class="fas fa-plus mr-2"></i>Apply for New Loan
            </a>
          </div>
        </div>
        @endif
      </main>

      <!-- Logout Confirmation Modal -->
      <div id="logout-modal" class="fixed inset-0 z-[60] flex items-center justify-center hidden">
        <div id="logout-modal-content" class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4 transform transition-all duration-300 relative z-[61]">
          <div class="text-center">
            <!-- Icon -->
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
              <i class="fas fa-sign-out-alt text-red-600 text-xl"></i>
            </div>

            <!-- Title -->
            <h3 class="text-lg font-medium text-gray-900 mb-2">
              Confirm Logout
            </h3>

            <!-- Message -->
            <p class="text-sm text-gray-500 mb-6">
              Are you sure you want to logout? You will need to sign in again to access your account.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-2 justify-center">
              <button onclick="closeLogoutModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                Cancel
              </button>
              <a href="{{ route('Member.Logout') }}" class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200 inline-block text-center">
                Logout
              </a>
            </div>
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

      // Close modal when clicking outside
      document.getElementById('logout-modal').addEventListener('click', function(e) {
        if (e.target === this) {
          closeLogoutModal();
        }
      });

      // Mobile menu functionality
      const mobileMenuBtn = document.getElementById('mobileMenuBtn');
      const closeSidebarBtn = document.getElementById('closeSidebarBtn');
      const sidebar = document.getElementById('sidebar');
      const mobileOverlay = document.getElementById('mobileOverlay');

      if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', () => {
          sidebar.classList.remove('-translate-x-full');
          mobileOverlay.classList.remove('hidden');
        });
      }

      if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', () => {
          sidebar.classList.add('-translate-x-full');
          mobileOverlay.classList.add('hidden');
        });
      }

      if (mobileOverlay) {
        mobileOverlay.addEventListener('click', () => {
          sidebar.classList.add('-translate-x-full');
          mobileOverlay.classList.add('hidden');
        });
      }
    </script>
  </body>
</html>
