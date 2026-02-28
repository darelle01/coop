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

    <title>Payment Schedule | GBLDC </title>
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
          <h1 class="text-xl lg:text-2xl xl:text-3xl font-bold">Payment Schedule</h1>
          <p class="text-gray-600 text-sm lg:text-base">Here's your loan payment schedule.</p>
          <hr class="border-gray-300 mt-4 lg:mt-6">
        </div>

        <!-- Payment Schedule Section -->
        <div class="space-y-6">
          @if($type === 'loan' && $loanInfo)
          <!-- Loan Payment Schedule -->
          <div class="bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h2 class="text-lg lg:text-xl font-semibold text-teal-950 mb-4">Loan Payment Schedule</h2>

            @if($loanScheduleData['type'] == 'calendar')
              <!-- Calendar View for Daily/Weekly Loan -->
              <div class="mb-4">
                <h3 class="text-md font-medium mb-2">Payment Frequency: {{ ucfirst($loanScheduleData['frequency']) }}</h3>
                <p class="text-sm text-gray-600">Showing schedule for {{ date('F Y', strtotime($loanScheduleData['year'] . '-' . $loanScheduleData['month'] . '-01')) }}</p>
              </div>
              <div class="grid grid-cols-7 gap-2">
                <!-- Days of the week -->
                <div class="font-semibold text-center p-2">Sun</div>
                <div class="font-semibold text-center p-2">Mon</div>
                <div class="font-semibold text-center p-2">Tue</div>
                <div class="font-semibold text-center p-2">Wed</div>
                <div class="font-semibold text-center p-2">Thu</div>
                <div class="font-semibold text-center p-2">Fri</div>
                <div class="font-semibold text-center p-2">Sat</div>

                @php
                  $firstDayOfMonth = date('w', strtotime($loanScheduleData['year'] . '-' . $loanScheduleData['month'] . '-01'));
                  $daysInMonth = $loanScheduleData['days'];
                @endphp

                @for($i = 0; $i < $firstDayOfMonth; $i++)
                  <div class="p-2"></div>
                @endfor

                @foreach($loanScheduleData['paymentDays'] as $paymentDay)
                  <div class="p-2 text-center border rounded {{ $paymentDay['day'] == $currentDay && $loanScheduleData['month'] == $currentMonth && $loanScheduleData['year'] == $currentYear ? 'bg-blue-500 text-white font-bold' : ($paymentDay['isPaymentDay'] ? ($paymentDay['isOverdue'] ? 'bg-red-200 text-red-800' : ($paymentDay['paymentMade'] ? 'bg-green-200 text-green-800' : '')) : '') }}">
                    {{ $paymentDay['day'] }}
                  </div>
                @endforeach
              </div>
              <p class="text-xs text-gray-500 mt-4">Green highlighted days indicate potential payment dates based on your {{ $loanScheduleData['frequency'] }} schedule.</p>
            @else
              <!-- Monthly View for Loan -->
              <div class="mb-4">
                <h3 class="text-md font-medium mb-2">Payment Frequency: Monthly</h3>
                <p class="text-sm text-gray-600">Showing monthly payment schedule for the year.</p>
                <div class="flex gap-4 mt-2 text-xs">
                  <span class="flex items-center"><span class="w-3 h-3 bg-green-200 rounded mr-1"></span> Paid</span>
                  <span class="flex items-center"><span class="w-3 h-3 bg-red-200 rounded mr-1"></span> Overdue</span>
                  <span class="flex items-center"><span class="w-3 h-3 bg-gray-50 border rounded mr-1"></span> Future</span>
                </div>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($loanScheduleData['months'] as $index => $monthData)
                  @php
                    $bgClass = 'bg-gray-50';
                    $textClass = 'text-teal-950';
                    $subTextClass = 'text-gray-600';
                    $statusText = 'Payment due';
                    
                    if ($monthData['paymentMade']) {
                      $bgClass = 'bg-green-200';
                      $textClass = 'text-green-800';
                      $subTextClass = 'text-green-700';
                      $statusText = 'Paid';
                    } elseif ($monthData['isOverdue']) {
                      $bgClass = 'bg-red-200';
                      $textClass = 'text-red-800';
                      $subTextClass = 'text-red-700';
                      $statusText = 'Overdue';
                    } elseif ($monthData['isFuture']) {
                      $bgClass = 'bg-gray-50';
                      $statusText = 'Upcoming';
                    }
                    
                    // Highlight current month
                    if ($monthData['month'] == $currentMonth && $monthData['year'] == $currentYear) {
                      $bgClass = 'bg-blue-500';
                      $textClass = 'text-white';
                      $subTextClass = 'text-white';
                    }
                  @endphp
                  <div class="p-4 border rounded-lg {{ $bgClass }}">
                    <h4 class="font-semibold {{ $textClass }}">{{ $monthData['name'] }}</h4>
                    <p class="text-sm {{ $subTextClass }}">{{ $statusText }}</p>
                  </div>
                @endforeach
              </div>

            @endif
          </div>
          @elseif($type === 'shared_capital' && $sharedCapitalInfo)
          <!-- Shared Capital Payment Schedule -->
          <div class="bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h2 class="text-lg lg:text-xl font-semibold text-teal-950 mb-4">Shared Capital Payment Schedule</h2>

            @if($sharedCapitalScheduleData['type'] == 'calendar')
              <!-- Calendar View for Daily/Weekly Shared Capital -->
              <div class="mb-4">
                <h3 class="text-md font-medium mb-2">Payment Frequency: {{ ucfirst($sharedCapitalScheduleData['frequency']) }}</h3>
                <p class="text-sm text-gray-600">Showing schedule for {{ date('F Y', strtotime($sharedCapitalScheduleData['year'] . '-' . $sharedCapitalScheduleData['month'] . '-01')) }}</p>
              </div>
              <div class="grid grid-cols-7 gap-2">
                <!-- Days of the week -->
                <div class="font-semibold text-center p-2">Sun</div>
                <div class="font-semibold text-center p-2">Mon</div>
                <div class="font-semibold text-center p-2">Tue</div>
                <div class="font-semibold text-center p-2">Wed</div>
                <div class="font-semibold text-center p-2">Thu</div>
                <div class="font-semibold text-center p-2">Fri</div>
                <div class="font-semibold text-center p-2">Sat</div>

                @php
                  $firstDayOfMonth = date('w', strtotime($sharedCapitalScheduleData['year'] . '-' . $sharedCapitalScheduleData['month'] . '-01'));
                  $daysInMonth = $sharedCapitalScheduleData['days'];
                @endphp

                @for($i = 0; $i < $firstDayOfMonth; $i++)
                  <div class="p-2"></div>
                @endfor

                @for($day = 1; $day <= $daysInMonth; $day++)
                  <div class="p-2 text-center border rounded {{ $day == $currentDay && $sharedCapitalScheduleData['month'] == $currentMonth && $sharedCapitalScheduleData['year'] == $currentYear ? 'bg-blue-500 text-white font-bold' : '' }}">
                    {{ $day }}
                  </div>
                @endfor
              </div>
              <p class="text-xs text-gray-500 mt-4">Green highlighted days indicate potential payment dates based on your {{ $sharedCapitalScheduleData['frequency'] }} schedule.</p>
            @else
              <!-- Monthly View for Shared Capital -->
              <div class="mb-4">
                <h3 class="text-md font-medium mb-2">Payment Frequency: Monthly</h3>
                <p class="text-sm text-gray-600">Showing monthly payment schedule for the year.</p>
                <div class="flex gap-4 mt-2 text-xs">
                  <span class="flex items-center"><span class="w-3 h-3 bg-green-200 rounded mr-1"></span> Paid</span>
                  <span class="flex items-center"><span class="w-3 h-3 bg-red-200 rounded mr-1"></span> Overdue</span>
                  <span class="flex items-center"><span class="w-3 h-3 bg-gray-50 border rounded mr-1"></span> Future</span>
                </div>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($sharedCapitalScheduleData['months'] as $index => $monthData)
                  @php
                    $bgClass = 'bg-gray-50';
                    $textClass = 'text-teal-950';
                    $subTextClass = 'text-gray-600';
                    $statusText = 'Payment due';
                    
                    if ($monthData['paymentMade']) {
                      $bgClass = 'bg-green-200';
                      $textClass = 'text-green-800';
                      $subTextClass = 'text-green-700';
                      $statusText = 'Paid';
                    } elseif ($monthData['isOverdue']) {
                      $bgClass = 'bg-red-200';
                      $textClass = 'text-red-800';
                      $subTextClass = 'text-red-700';
                      $statusText = 'Overdue';
                    } elseif ($monthData['isFuture']) {
                      $bgClass = 'bg-gray-50';
                      $statusText = 'Upcoming';
                    }
                    
                    // Highlight current month
                    if ($monthData['month'] == $currentMonth && $monthData['year'] == $currentYear) {
                      $bgClass = 'bg-blue-500';
                      $textClass = 'text-white';
                      $subTextClass = 'text-white';
                    }
                  @endphp
                  <div class="p-4 border rounded-lg {{ $bgClass }}">
                    <h4 class="font-semibold {{ $textClass }}">{{ $monthData['name'] }}</h4>
                    <p class="text-sm {{ $subTextClass }}">{{ $statusText }}</p>
                  </div>
                @endforeach
              </div>

            @endif
          </div>
          @else
          <!-- Show both if no type specified or no data -->
          @if($loanInfo)
          <div class="bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h2 class="text-lg lg:text-xl font-semibold text-teal-950 mb-4">Loan Payment Schedule</h2>
            <p class="text-sm text-gray-600">No schedule data available.</p>
          </div>
          @endif
          @if($sharedCapitalInfo)
          <div class="bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h2 class="text-lg lg:text-xl font-semibold text-teal-950 mb-4">Shared Capital Payment Schedule</h2>
            <p class="text-sm text-gray-600">No schedule data available.</p>
          </div>
          @endif
          @endif
        </div>
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
