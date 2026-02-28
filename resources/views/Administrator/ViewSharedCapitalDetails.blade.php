<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Shared Capital Details | GBLDC Admin</title>
    <link rel="stylesheet" href="output.css" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

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
          <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Shared Capital Details</h1>
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
    <!-- Title -->
    <div class="mb-8">
      <h2 class="text-2xl font-bold text-green-800">Shared Capital Details</h2>
      <p class="text-gray-700">View basic information about the member's shared capital.</p>
      <a href="{{route('Shared.Capital.List.View')}}" class="inline-flex items-center mt-1 px-3 py-1.5 rounded bg-green-100 text-green-800 hover:bg-green-200 transition-colors focus:outline-none focus:ring-2 focus:ring-green-400 shadow-sm mr-3">
        <i class="fa fa-arrow-left mr-2"></i> Back to List</a>
    </div>

    <!-- Details Card -->
    <div class="bg-white rounded-xl shadow p-8">
      <h3 class="text-2xl font-bold text-green-800 mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2a4 4 0 004 4h2a4 4 0 004-4z" /></svg>
        Member Information
      </h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <h4 class="text-lg font-semibold text-gray-800 mb-4">Personal Details</h4>
          <div class="space-y-3">
            <div>
              <label class="block text-sm font-medium text-gray-700">Member ID</label>
              <p class="text-gray-900">{{$sharedCapital->member_id}}</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Full Name</label>
              <p class="text-gray-900">{{$sharedCapital->last_name}}, {{$sharedCapital->first_name}} {{$sharedCapital->middle_name}}</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Phone</label>
              <p class="text-gray-900">{{$sharedCapital->phone}}</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Email</label>
              <p class="text-gray-900">{{$sharedCapital->email}}</p>
            </div>
          </div>
        </div>
        <div>
          <h4 class="text-lg font-semibold text-gray-800 mb-4">Address</h4>
          <div class="space-y-3">
            <div>
              <label class="block text-sm font-medium text-gray-700">Street Address</label>
              <p class="text-gray-900">{{$sharedCapital->street_address}}</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Barangay</label>
              <p class="text-gray-900">{{$sharedCapital->barangay}}</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">City</label>
              <p class="text-gray-900">{{$sharedCapital->city}}</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Province</label>
              <p class="text-gray-900">{{$sharedCapital->province}}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8">
        <h4 class="text-lg font-semibold text-gray-800 mb-4">Shared Capital Information</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700">Shared Capital Amount</label>
            <p class="text-gray-900 text-lg font-semibold">₱{{number_format($sharedCapital->shared_capital_amount, 2)}}</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Shared Capital Balance</label>
            <p class="text-gray-900 text-lg font-semibold">₱{{number_format($sharedCapital->shared_capital_amount_balance, 2)}}</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Date of Membership</label>
            <p class="text-gray-900">{{$sharedCapital->date_of_membership}}</p>
          </div>
        </div>
      </div>

      <div class="mt-8">
        <h4 class="text-lg font-semibold text-gray-800 mb-4">Additional Information</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700">Encoded By</label>
            <p class="text-gray-900">{{$sharedCapital->encoded_by}}</p>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Remarks</label>
            <p class="text-gray-900">{{$sharedCapital->remarks}}</p>
          </div>
        </div>
      </div>
    </div>

      </main>
      <script>
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
