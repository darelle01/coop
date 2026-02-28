<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard | GBLDC</title>
    <link rel="stylesheet" href="output.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/png"
      href={{asset('images/logocoop-removebg-preview-2.png')}}>
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen">
    <!-- Header Section -->
    <header class="bg-white shadow-md fixed left-0 top-0 z-50 w-full">
      <div
        class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3 relative">
        <div class="flex items-center space-x-4">
          <img src={{asset('images/logocoop-removebg-preview-2.png')}}
            alt="GBLDC Logo" class="w-12 h-12 object-cover" />
          <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Admin
            Dashboard</h1>
        </div>
        <div class="relative">
          <button id="user-menu-button"
            class="flex items-center gap-3 focus:outline-none">
            <span
              class="hidden md:inline text-gray-700 font-medium">Admin</span>
            <img src={{asset('images/logocoop-removebg-preview-2.png')}}
              alt="Admin Avatar"
              class="w-10 h-10 rounded-full border-2 border-green-600 object-cover" />
            <i class="fas fa-chevron-down text-gray-600 text-sm"></i>
          </button>
          <div id="user-menu"
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 py-2 hidden transition-all duration-200 ease-in-out">
            <a href="#"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">Profile</a>
            <a href="{{route ('Admin.manage')}}"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">Manage User</a>
            <a href="admin-settings.html"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">Settings</a>
            <div class="border-t my-1 border-gray-200"></div>
            <a href="{{ route('Admin.Logout') }}"
              class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition">Logout</a>
          </div>
        </div>
      </div>
    </header>

    <main class="pt-28 pb-12 px-4 max-w-7xl mx-auto">
      <!-- Welcome Banner -->
      <div
        class="bg-green-100 rounded-xl shadow flex flex-col md:flex-row items-center justify-between p-6 mb-8">
        <div>
          <h2 class="text-2xl font-bold text-green-800 mb-1">Welcome,
            Admin!</h2>
          <p class="text-gray-700">Monitor and manage users, applications, and
            cooperative data.</p>
        </div>
        <img src={{asset('images/logocoop-removebg-preview-2.png')}} alt="Admin Hero"
          class="w-32 h-32 object-cover rounded-full mt-4 md:mt-0" />
      </div>

      <!-- Quick Stats -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
          <i class="fas fa-users text-3xl text-green-600 mb-2"></i>
          <div class="text-2xl font-bold" data-target="{{$officialMembersTotal}}"></div>
          <div class="text-gray-600">Total Users</div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
          <i
            class="fas fa-file-invoice-dollar text-3xl text-green-600 mb-2"></i>
          <div class="text-2xl font-bold" data-target="{{$loanapplicationsTotal}}"></div>
          <div class="text-gray-600">Pending Loan Applications</div>
        </div>

        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
          <i class="fas fa-piggy-bank text-3xl text-green-600 mb-2"></i>
          <div class="text-2xl font-bold" data-target="{{$total}}">0</div>
          <div class="text-gray-600">Shared Capital (Up to This Month)</div>

        </div>

        <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
          <i class="fas fa-hands-helping text-3xl text-green-600 mb-2"></i>
          <div class="text-2xl font-bold" data-target="{{$ApprovedLoansTotal}}">0</div>
          <div class="text-gray-600">Approved Loans (This Month)</div>
        </div>

      </div>

      <!-- Loan Reports Section -->
      <div class="mb-6">
        <h3 class="text-xl font-bold text-teal-900 mb-4 flex items-center">
          <i class="fas fa-chart-line text-green-600 mr-2"></i>
          Loan Reports
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
          <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border-l-4 border-green-500">
            <i class="fas fa-check-circle text-3xl text-green-600 mb-2"></i>
            <div class="text-2xl font-bold" data-target="{{$totalActiveLoans}}">0</div>
            <div class="text-gray-600 text-sm text-center">Total Active Loans</div>
          </div>
          <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border-l-4 border-blue-500">
            <i class="fas fa-money-bill-wave text-3xl text-blue-600 mb-2"></i>
            <div class="text-2xl font-bold" data-target="{{$totalLoanAmountDisbursed}}">0</div>
            <div class="text-gray-600 text-sm text-center">Total Loan Amount Disbursed</div>
          </div>
          <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border-l-4 border-orange-500">
            <i class="fas fa-wallet text-3xl text-orange-600 mb-2"></i>
            <div class="text-2xl font-bold" data-target="{{$outstandingBalance}}">0</div>
            <div class="text-gray-600 text-sm text-center">Outstanding Balance</div>
          </div>
          <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border-l-4 border-purple-500">
            <i class="fas fa-undo-alt text-3xl text-purple-600 mb-2"></i>
            <div class="text-2xl font-bold" data-target="{{$repaidAmount}}">0</div>
            <div class="text-gray-600 text-sm text-center">Repaid Amount</div>
          </div>
          <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border-l-4 border-red-500">
            <i class="fas fa-exclamation-triangle text-3xl text-red-600 mb-2"></i>
            <div class="text-2xl font-bold" data-target="{{$overdueAmount}}">0</div>
            <div class="text-gray-600 text-sm text-center">Overdue Amount</div>
          </div>
        </div>
      </div>

      <!-- Navigation Tabs -->

      <div class="mb-8">
        <nav class="flex space-x-4 border-b border-green-200 pb-2">
          <a href="#"
            class="text-green-700 font-semibold border-b-2 border-green-600 pb-2 transition-colors duration-200">Overview</a>
          <a href="{{route('Manage.Members')}}"
            class="text-gray-600 hover:text-green-700 transition-colors duration-200">Members Registration</a>
          <a href="{{route('LoanApp.list')}}"
            class="text-gray-600 hover:text-green-700 transition-colors duration-200">Loans Applications</a>
          <a href="{{route('Payment.Page')}}"
            class="text-gray-600 hover:text-green-700 transition-colors duration-200">Payment</a>
          <a href="{{route('Add.Transactions')}}"
            class="text-gray-600 hover:text-green-700 transition-colors duration-200">Add Transactions</a>
          <a href="{{route('Shared.Capital.List.View')}}"
            class="text-gray-600 hover:text-green-700 transition-colors duration-200">Shared Capital</a>
          <a href="admin-settings.html"
            class="text-gray-600 hover:text-green-700 transition-colors duration-200">Settings</a>
        </nav>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
        <!-- Recent Loan Applications Table -->
        <div class="bg-white rounded-xl shadow p-6 mb-10">
          <h3
            class="text-lg font-semibold text-teal-900 mb-4 flex items-center justify-between">
            Recent Registration Forms
            <a href="{{route ('Manage.Members')}}" class="ml-4 text-green-600 px-3 py-1 text-sm"
              type="button">
              See Full View
            </a>
          </h3>
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead>
                <tr class="bg-green-100 text-green-900">
                  <th class="py-2 px-4 text-left">Name</th>
                  <th class="py-2 px-4 text-left">Email-Address</th>
                  <th class="py-2 px-4 text-left">Contact</th>
                </tr>
              </thead>
              <tbody>
              @foreach($registrations as $registration)
                <tr>
                  <td class="py-2 px-4">{{$registration->last_name}}, {{$registration->first_name}} {{$registration->middle_name}}</td>
                  <td class="py-2 px-4">{{$registration->email}}</td>
                  <td class="py-2 px-4">0{{$registration->contact_number}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- Recent Loan Applications Table -->
        <div class="bg-white rounded-xl shadow p-6 mb-10">
          <h3
            class="text-lg font-semibold text-teal-900 mb-4 flex items-center justify-between">
            Loan Applications
            <a href="{{route('LoanApp.list')}}" class="ml-4 text-green-600 px-3 py-1 text-sm"
              type="button">
              See Full View
            </a>
          </h3>
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead>
                <tr class="bg-green-100 text-green-900">
                  <th class="py-2 px-4 text-left">Name</th>
                  <th class="py-2 px-4 text-left">Loan</th>
                  <th class="py-2 px-4 text-left">Contact</th>
                </tr>
              </thead>
              <tbody>
              @foreach($loanapplications as $loanapplication)
                <tr>
                  <td class="py-2 px-4">{{$loanapplication->last_name}}, {{$loanapplication->first_name}} {{$loanapplication->middle_name}}</td>
                  <td class="py-2 px-4">{{$loanapplication->loan_amount}}</td>
                  <td class="py-2 px-4">{{$loanapplication->contact_number}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- Recent Loan Applications Table -->
        <div class="bg-white rounded-xl shadow p-6 mb-10">
          <h3
            class="text-lg font-semibold text-teal-900 mb-4 flex items-center justify-between">
            Approved Loans
            <a href="{{route('Loan.Records')}}" class="ml-4 text-green-600 px-3 py-1 text-sm"
              type="button">
              See Full View
            </a>
          </h3>
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead>
                <tr class="bg-green-100 text-green-900">
                  <th class="py-2 px-4 text-left">Loan #</th>
                  <th class="py-2 px-4 text-left">Name</th>
                  <th class="py-2 px-4 text-left">Loan Amount</th>
                  <th class="py-2 px-4 text-left">Contact</th>
                </tr>
              </thead>
              <tbody>
              @foreach($ApprovedLoans as $ApprovedLoan)
                <tr>
                  <td class="py-2 px-4">{{$ApprovedLoan->loan_number}}</td>
                  <td class="py-2 px-4">{{$ApprovedLoan->last_name}}, {{$ApprovedLoan->first_name}} {{$ApprovedLoan->middle_name}}</td>
                  <td class="py-2 px-4">{{$ApprovedLoan->loan_amount}}</td>
                  <td class="py-2 px-4">0{{$ApprovedLoan->contact_number}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- Realtime Chart Section -->
        <div class="flex justify-center items-center mb-10" hidden>
          <div class="w-full max-w-xl bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-teal-900 mb-4">Loan
              Application Activity</h3>
            <canvas id="realtimeChart" height="100"></canvas>
          </div>
        </div>
        <!-- Recent Users Table -->
        <div class="bg-white rounded-xl shadow p-6 mb-10">
          <h3
            class="text-lg font-semibold text-teal-900 mb-4 flex items-center justify-between">
            Official Members
            <a href="{{route ('Member.List')}}" class="ml-4 text-green-600 px-3 py-1 text-sm"
              type="button">
              See Full View
            </a>
          </h3>
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead>
                <tr class="bg-green-100 text-green-900">
                  <th class="py-2 px-4 text-left">Name</th>
                  <th class="py-2 px-4 text-left">Email</th>
                  <th class="py-2 px-4 text-left">Contact Number</th>
                  <th class="py-2 px-4 text-left">Joined</th>
                </tr>
              </thead>
              <tbody>
              @foreach($officialMembers as $officialMember)
                <tr>
                  <td class="py-2 px-4">{{$officialMember->last_name}}, {{$officialMember->first_name}} {{$officialMember->middle_name}}</td>
                  <td class="py-2 px-4">{{$officialMember->email}}</td>
                  <td class="py-2 px-4">0{{$officialMember->contact_number}}</td>
                  <td class="py-2 px-4">{{$officialMember->created_at}}</td>
                </tr>
              @endforeach             
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('realtimeChart').getContext('2d');
    const data = {
      labels: Array.from({length: 20}, (_, i) => ''),
      datasets: [{
        label: 'Active Users',
        data: Array.from({length: 20}, () => Math.floor(Math.random() * 100) + 50),
        borderColor: '#16a34a',
        backgroundColor: 'rgba(22,163,74,0.1)',
        tension: 0.4,
        fill: true,
        pointRadius: 0
      }]
    };
    const config = {
      type: 'line',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        },
        scales: {
          x: { display: false },
          y: { beginAtZero: true }
        }
      }
    };
    const realtimeChart = new Chart(ctx, config);

    setInterval(() => {
      data.datasets[0].data.push(Math.floor(Math.random() * 100) + 50);
      data.datasets[0].data.shift();
      realtimeChart.update();
    }, 1500);

    const counters = document.querySelectorAll('[data-target]');

    const animateCounter = (counter) => {
      const target = +counter.getAttribute('data-target');
      const duration = 1000; // 1 second
      const stepTime = 20; // 20ms
      const steps = duration / stepTime;
      const increment = target / steps;
      let current = 0;

      const updateCounter = () => {
        current += increment;
        if (current < target) {
          counter.innerText = Math.ceil(current).toLocaleString();
          setTimeout(updateCounter, stepTime);
        } else {
          counter.innerText = target.toLocaleString();
        }
      };

      updateCounter();
    };

    counters.forEach(animateCounter);
    const userMenuBtn = document.getElementById("user-menu-button");
    const userMenu = document.getElementById("user-menu");

  userMenuBtn.addEventListener("click", (e) => {
    e.stopPropagation(); // Prevents the click from bubbling to document
    userMenu.classList.toggle("hidden");
  });

  document.addEventListener("click", (e) => {
    if (!userMenu.contains(e.target) && !userMenuBtn.contains(e.target)) {
      userMenu.classList.add("hidden");
    }
  });
  </script>
  </body>
</html>
