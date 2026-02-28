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

    <title>Loan History | GBLDC </title>
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
            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-blue-100 rounded-full flex items-center justify-center">
              <img src="path/images/Kristian.png" class="rounded-full :text-lg lg:text-xl"></img>
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
            <a href="{{ route('Member.Check.Loan.Status') }}" class="flex items-center p-3 lg:p-4 hover:bg-gray-200 rounded-lg font-medium text-sm lg:text-base transition-colors">
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
          <h1 class="text-xl lg:text-2xl xl:text-3xl font-bold">Loan History</h1>
          <p class="text-gray-600 text-sm lg:text-base">View all your loan records and details.</p>
          <hr class="border-gray-300 mt-4 lg:mt-6">
        </div>

        <!-- Loan History Table -->
        <section class="bg-white rounded-lg shadow-md p-4 lg:p-6">
          <h2 class="text-lg lg:text-xl font-semibold text-teal-950 mb-4">Your Loan Records</h2>
          <div class="table-container">
            <table class="w-full text-left border-collapse min-w-[600px]">
              <thead>
                <tr class="bg-gray-100 text-gray-600">
                  <th class="p-3 text-sm font-medium">Loan Number</th>
                  <th class="p-3 text-sm font-medium">Loan Amount</th>
                  <th class="p-3 text-sm font-medium">Loan Balance</th>
                  <th class="p-3 text-sm font-medium">Loan Term</th>
                  <th class="p-3 text-sm font-medium">Status</th>
                  <th class="p-3 text-sm font-medium">Date Applied</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($loans as $loan)
                  <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 text-sm font-medium">{{$loan->loan_number}}</td>
                    <td class="p-3 text-sm">Php {{$loan->loan_amount}}</td>
                    <td class="p-3 text-sm">Php {{$loan->loan_balance}}</td>
                    <td class="p-3 text-sm">{{$loan->loan_term}} months</td>
                    <td class="p-3 text-sm">
                      @if($loan->loan_status == 'active')
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                      @elseif($loan->loan_status == 'paid')
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">Paid</span>
                      @elseif($loan->loan_status == 'defaulted')
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">Defaulted</span>
                      @else
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-medium">{{ucfirst($loan->loan_status)}}</span>
                      @endif
                    </td>
                    <td class="p-3 text-sm">{{$loan->created_at ? $loan->created_at->format('M d, Y') : 'N/A'}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @if($loans->isEmpty())
              <div class="text-center py-8">
                <p class="text-gray-500">No loan records found.</p>
              </div>
            @endif
          </div>
        </section>
      </main>

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
    </script>
  </body>
</html>
