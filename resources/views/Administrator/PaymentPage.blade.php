<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Payment | GBLDC</title>
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
          <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Payment</h1>
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
  <!-- Start Content Area -->
      <div class="max-w-7xl mx-auto px-4 py-8 ">
        <div class="flex items-start gap-8">
          <!-- Buttons container -->
          <div class="flex flex-col gap-4 min-w-[280px]">
           <form action="{{route ('Admin.dashboard')}}" method="GET" class="">
              <button class="inline-flex items-center px-3 py-1.5 rounded bg-green-100 text-green-800 hover:bg-green-200 transition-colors focus:outline-none focus:ring-2 focus:ring-green-400 shadow-sm mr-3">
              <i class="fa fa-arrow-left mr-2"></i> Back
              </button>
            </form>
            <button
              id="btn-generate-qrcode"
              type="button"
              class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors shadow-md flex items-center"
            >
              <i class="fas fa-qrcode mr-2"></i> Generate QR Code for GCash
            </button>

          </div>

        <div class="container mx-auto py-8 px-4">
          <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Transaction Entry Form</h1>
          
          <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 m-2 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if(session('Record-updated'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-2 rounded relative mb-4" role="alert">
                    <strong class="font-bold"></strong>
                    <span class="block sm:inline">{{ session('Record-updated') }}</span>
                </div>
            @endif
          
            <!-- Payment Form -->
              <form action="{{route ('Payment.Submit')}}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                  <!-- Grid for Member Name and Transaction Type -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <!-- Member Name -->
                      <div>
                          <label for="member_name" class="block mb-2 text-sm font-medium text-gray-700">Member ID</label>
                          <input type="text" id="member_name" name="member_id" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                      </div>
                      <!-- Loan Number -->
                      <div>
                          <label for="loan_no" class="block mb-2 text-sm font-medium text-gray-700">Loan Number</label>
                          <input type="text" id="loan_no" name="loan_number" 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                      </div>
                       <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" id="last_name" name="last_name" required 
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                        </div>

                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" id="first_name" name="first_name" required 
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                        </div>

                        <!-- Middle Name -->
                        <div>
                            <label for="middle_name" class="block mb-2 text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" id="middle_name" name="middle_name" 
                                class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                        </div>

                      <!-- Type of Transaction -->
                      <div>
                          <label for="transaction_type" class="block mb-2 text-sm font-medium text-gray-700">Type of Transaction</label>
                          <select id="transaction_type" name="transaction_type" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                              <option value="" disabled selected>Select Type</option>
                              <option value="Shared Capital">Shared Capital Payment</option>
                              <option value="Loan Payment">Loan Payment</option>
                              <option value="Time Deposit">Time Deposit</option>
                              <option value="Savings">Savings</option>
                              <option value="other">Other</option>
                          </select>
                      </div>
                  </div>

                  <!-- Grid for Payment Method and Payment Status -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <!-- Payment Method -->
                      <div>
                          <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-700">Payment Method</label>
                          <select id="payment_method" name="payment_method" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                              <option value="" disabled selected>Select Method</option>
                              <option value="cash">Cash</option>
                              <option value="Gcash">Gcash</option>
                              <option value="credit_card">Credit Card</option>
                              <option value="debit_card">Debit Card</option>
                              <option value="bank_transfer">Bank Transfer</option>
                              <option value="check">Check</option>
                              <option value="online_wallet">Online Wallet</option>
                          </select>
                      </div>

                      <!-- Paid On Time / Late / Early -->
                      <div>
                          <label for="payment_status" class="block mb-2 text-sm font-medium text-gray-700">Payment Status</label>
                          <select id="payment_status" name="payment_status" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                              <option value="" disabled selected>Select Status</option>
                              <option value="On-time">On Time</option>
                              <option value="Late">Late</option>
                              <option value="Early">Early</option>
                          </select>
                      </div>
                  </div>

                  <!-- Grid for Dates -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <!-- Date of Transaction -->
                      <div>
                          <label for="transaction_date" class="block mb-2 text-sm font-medium text-gray-700">Date of Transaction</label>
                          <input type="date" id="transaction_date" name="transaction_date" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                      </div>

                  </div>

                  <!-- Grid for Transaction Handler and Updater -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <!-- Name of Transaction Handler -->
                      <div>
                          <label for="txn_handler" class="block mb-2 text-sm font-medium text-gray-700">Name of Transaction Handler</label>
                          <input type="text" id="txn_handler" name="transaction_handler" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                      </div>

                      <!-- Name of Person Who Update/Save -->
                      <div>
                          <label for="updater" class="block mb-2 text-sm font-medium text-gray-700">Name of Person Who Update/Save</label>
                          <input type="text" id="updater" name="updater_name" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                      </div>
                  </div>

                  <!-- Grid for Reference Number and Amount -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <!-- Reference Number -->
                      <div>
                          <label for="reference_number" class="block mb-2 text-sm font-medium text-gray-700">Reference Number</label>
                          <input type="text" id="reference_number" name="reference_number" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                      </div>

                      <!-- Amount of Payment -->
                      <div>
                          <label for="payment_amount" class="block mb-2 text-sm font-medium text-gray-700">Amount of Payment</label>
                          <input type="number" id="payment_amount" name="payment_amount" step="0.01" min="0" required 
                              class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200">
                      </div>
                  </div>

                  <!-- Remarks -->
                  <div>
                      <label for="remarks" class="block mb-2 text-sm font-medium text-gray-700">Remarks</label>
                      <textarea id="remarks" name="remarks" rows="4" 
                          class="w-full px-4 py-2.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200"></textarea>
                  </div>

                  <!-- Grid for File Uploads -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <!-- Picture for Member Copy -->
                      <div>
                          <label class="block mb-2 text-sm font-medium text-gray-700">Picture for Member Copy</label>
                          <div class="flex items-center">
                              <label for="member_picture" class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200">
                                  Choose File
                              </label>
                              <span id="member_file_text" class="ml-3 text-sm text-gray-500">No file chosen</span>
                          </div>
                          <input type="file" id="member_picture" name="member_copy" accept="image/*" class="hidden">
                      </div>

                      <!-- Picture for Coop Copy -->
                      <div>
                          <label class="block mb-2 text-sm font-medium text-gray-700">Picture for Coop Copy</label>
                          <div class="flex items-center">
                              <label for="coop_picture" class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200">
                                  Choose File
                              </label>
                              <span id="coop_file_text" class="ml-3 text-sm text-gray-500">No file chosen</span>
                          </div>
                          <input type="file" id="coop_picture" name="admin_copy" accept="image/*" class="hidden">
                      </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="pt-4">
                      <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg focus:ring-4 focus:ring-blue-300 focus:outline-none transition-all duration-200">
                          Submit Transaction
                      </button>
                  </div>
              </form>
          </div>
      </div>
      </main>
      <script>
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