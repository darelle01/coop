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
        {{-- Shared Capital Form --}}
  <form action="{{route ('Save.Shared.Capital')}}" method="POST" class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
  @csrf

  <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Shared Capital Form</h2>
    {{-- messeage --}}
    @if(session('success'))
          <div class="bg-green-100 border-t-4 border-green-500 text-green-700 p-4 mb-6 rounded-md">
            <p class="font-semibold">{{ session('success') }}</p>
          </div>
        @endif
  <!-- Personal Information -->
  <fieldset class="mb-8">
    <legend class="text-xl font-semibold mb-4 border-b border-gray-300 pb-2 text-gray-700">Personal Information</legend>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div>
        <label for="last_name" class="block text-gray-700 font-medium mb-1">
          Last Name <span class="text-red-600">*</span>
        </label>
        <input type="text" name="last_name" id="last_name" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="{{ $details->last_name }}">
        @error('last_name')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="first_name" class="block text-gray-700 font-medium mb-1">
          First Name <span class="text-red-600">*</span>
        </label>
        <input type="text" name="first_name" id="first_name" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="{{ $details->first_name }}">
        @error('first_name')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="middle_name" class="block text-gray-700 font-medium mb-1">
          Middle Name
        </label>
        <input type="text" name="middle_name" id="middle_name"
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="{{ $details->middle_name }}">
        @error('middle_name')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
    </div>
  </fieldset>

  <!-- Address -->
<fieldset class="mb-8">
  <legend class="text-xl font-semibold mb-4 border-b border-gray-300 pb-2 text-gray-700">Address</legend>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <label for="street_address" class="block text-gray-700 font-medium mb-1">
        Street Address <span class="text-red-600">*</span>
      </label>
      <input type="text" name="street_address" id="street_address" required
        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="{{ $details->street_address }}">
      @error('street_address')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="barangay" class="block text-gray-700 font-medium mb-1">
        Barangay <span class="text-red-600">*</span>
      </label>
      <input type="text" name="barangay" id="barangay" required
        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="{{ $details->barangay }}">
      @error('barangay')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="city" class="block text-gray-700 font-medium mb-1">
        City <span class="text-red-600">*</span>
      </label>
      <input type="text" name="city" id="city" required
        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="{{ $details->city }}">
      @error('city')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="province" class="block text-gray-700 font-medium mb-1">
        Province <span class="text-red-600">*</span>
      </label>
      <input type="text" name="province" id="province" required
        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="{{ $details->province }}">
      @error('province')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
  </div>
</fieldset>


  <!-- Contact Information -->
  <fieldset class="mb-8">
    <legend class="text-xl font-semibold mb-4 border-b border-gray-300 pb-2 text-gray-700">Contact Information</legend>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="phone" class="block text-gray-700 font-medium mb-1">
          Phone Number <span class="text-red-600">*</span>
        </label>
        <input type="text" name="phone" id="phone" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="{{ $details->contact_number }}">
        @error('phone')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="mt-6">
      <label for="email" class="block text-gray-700 font-medium mb-1">
        Email Address <span class="text-red-600">*</span>
      </label>
      <input type="email" name="email" id="email" required
        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="{{ $details->email }}">
      @error('email')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
  </fieldset>

  <!-- Shared Capital and Membership Date -->
  <fieldset class="mb-8">
    <legend class="text-xl font-semibold mb-4 border-b border-gray-300 pb-2 text-gray-700">Membership Details</legend>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="shared_capital_amount" class="block text-gray-700 font-medium mb-1">
          Amount of Shared Capital <span class="text-red-600">*</span>
        </label>
        <input type="number" name="shared_capital_amount" id="shared_capital_amount" step="0.01" min="0" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="">
        @error('shared_capital_amount')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="date_of_membership" class="block text-gray-700 font-medium mb-1">
          Date of Membership <span class="text-red-600">*</span>
        </label>
        <input type="date" name="date_of_membership" id="date_of_membership" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="">
        @error('date_of_membership')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
    </div>
  </fieldset>

  <!-- Member ID, Encoded By, Remarks, Record Creation Date -->
  <fieldset class="mb-8">
    <legend class="text-xl font-semibold mb-4 border-b border-gray-300 pb-2 text-gray-700">Administrative Information</legend>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="member_id" class="block text-gray-700 font-medium mb-1">
          Member ID <span class="text-red-600">*</span>
        </label>
        <input type="text" name="member_id" id="member_id" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="{{ $details->member_id }}">
        @error('member_id')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="encoded_by" class="block text-gray-700 font-medium mb-1">
          Encoded By / Staff Name <span class="text-red-600">*</span>
        </label>
        <input type="text" name="encoded_by" id="encoded_by" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="">
        @error('encoded_by')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="mt-6">
      <label for="remarks" class="block text-gray-700 font-medium mb-1">
        Remarks
      </label>
      <textarea name="remarks" id="remarks" rows="3"
        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">{{ old('remarks') }}</textarea>
      @error('remarks')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mt-6">
      <label for="record_creation_date" class="block text-gray-700 font-medium mb-1">
        Date of Membership / Record Creation
      </label>
      <input type="date" name="record_creation_date" id="record_creation_date"
        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="{{ old('record_creation_date', date('Y-m-d')) }}">
      @error('record_creation_date')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
  </fieldset>

  <!-- Payment Schedule -->
  <fieldset class="mb-8">
    <legend class="text-xl font-semibold mb-4 border-b border-gray-300 pb-2 text-gray-700">Payment Schedule</legend>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="payment_frequency" class="block text-gray-700 font-medium mb-1">
          Payment Frequency <span class="text-red-600">*</span>
        </label>
        <select name="payment_frequency" id="payment_frequency" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="">Select Frequency</option>
          <option value="monthly">Monthly</option>
          <option value="weekly">Weekly</option>
          <option value="daily">Daily</option>
        </select>
        @error('payment_frequency')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="payment_amount_per_schedule" class="block text-gray-700 font-medium mb-1">
          Payment Amount per Schedule <span class="text-red-600">*</span>
        </label>
        <input type="number" name="payment_amount_per_schedule" id="payment_amount_per_schedule" step="0.01" min="0" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="">
        @error('payment_amount_per_schedule')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="payment_start_date" class="block text-gray-700 font-medium mb-1">
          Payment Start Date <span class="text-red-600">*</span>
        </label>
        <input type="date" name="payment_start_date" id="payment_start_date" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="">
        @error('payment_start_date')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="number_of_payments" class="block text-gray-700 font-medium mb-1">
          Number of Payments <span class="text-red-600">*</span>
        </label>
        <input type="number" name="number_of_payments" id="number_of_payments" min="1" required
          class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="">
        @error('number_of_payments')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
    </div>
  </fieldset>

  <!-- Submit Button -->
  <div class="flex justify-between">
    <a href="{{route ('Add.Transactions')}}" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Back</a>
    <button type="submit"
      class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
      Submit Registration
    </button>
  </div>
</form>

        
          
        
        
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