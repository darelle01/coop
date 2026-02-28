<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Add Record | GBLDC</title>
    <link rel="stylesheet" href="output.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <!-- DataTables CSS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

      <!-- DataTables JS -->
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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
          <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Add Record</h1>
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
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 py-2 hidden transition-all duration-200 ease-in-out z-50">
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
  <div class="mb-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
          {{-- shared capital --}}
          <form action="{{route('Find.Member')}}" method="GET" 
                class="transaction-card bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center transition-all duration-300 hover:shadow-lg hover:translate-y-1 border border-teal-100">
          
            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center mb-3">
              <i class="fas fa-hand-holding-usd text-teal-600 text-xl"></i>
            </div>
            <h3 class="font-medium text-teal-800 text-center">Shared Capital</h3>
            <p class="text-xs text-gray-500 mt-1 text-center">Manage member shares</p>

            {{-- hide --}}
            <div class="search-box hidden w-full mt-3">
              <input type="text" name="member_id" 
                    class="border border-gray-300 rounded px-2 py-1 w-full text-sm text-center"
                    placeholder="Enter Member Fullname">
              <button type="submit" 
                      class="mt-3 bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium px-4 py-1.5 rounded w-full">
                Search
              </button>
            </div>
          </form>



        <!-- Loan -->
        <form action="" method="POST" 
      class="transaction-card1 bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center transition-all duration-300 hover:shadow-lg hover:translate-y-1 border border-teal-100">
  @csrf
  <!-- Icon -->
  <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3">
    <i class="fas fa-university text-blue-600 text-xl"></i>
  </div>

  <!-- Title -->
  <h3 class="font-medium text-teal-800 text-center">Loan</h3>
  <p class="text-xs text-gray-500 mt-1 text-center">Create loan record</p>

  {{-- hide --}}
  <div class="search-box hidden w-full mt-3">
    <input type="text" name="member_id" 
          class="border border-gray-300 rounded px-2 py-1 w-full text-sm text-center"
          placeholder="Enter Member ID">
    <button type="submit" 
            class="mt-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-1.5 rounded w-full">
      Search
    </button>
  </div>
</form>


          <!-- Savings -->
          <form action="" method="POST" 
      class="transaction-card2 bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center transition-all duration-300 hover:shadow-lg hover:translate-y-1 border border-teal-100">
  @csrf
  <!-- Icon -->
  <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3">
    <i class="fas fa-university text-green-600 text-xl"></i>
  </div>

  <!-- Title -->
  <h3 class="font-medium text-teal-800 text-center">Savings</h3>
  <p class="text-xs text-gray-500 mt-1 text-center">Create savings</p>

  {{-- hide --}}
  <div class="search-box hidden w-full mt-3">
    <input type="text" name="member_id" 
          class="border border-gray-300 rounded px-2 py-1 w-full text-sm text-center"
          placeholder="Enter Member ID">
    <button type="submit" 
            class="mt-3 bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-1.5 rounded w-full">
      Search
    </button>
  </div>
</form>



        <!-- Time Deposit --><form action="" method="POST" 
      class=" transaction-card3 bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center transition-all duration-300 hover:shadow-lg hover:translate-y-1 border border-teal-100">
  @csrf
  <!-- Icon -->
  <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
    <i class="fas fa-chart-line text-purple-600 text-xl"></i>
  </div>

  <!-- Title -->
  <h3 class="font-medium text-teal-800 text-center">Time Deposit</h3>
  <p class="text-xs text-gray-500 mt-1 text-center">Create time deposits</p>

  {{-- hide --}}
  <div class="search-box hidden w-full mt-3">
    <input type="text" name="member_id" 
          class="border border-gray-300 rounded px-2 py-1 w-full text-sm text-center"
          placeholder="Enter Member ID">
    <button type="submit" 
            class="mt-3 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium px-4 py-1.5 rounded w-full">
      Search
    </button>
  </div>
</form>



    </div>
  </div>
 @if(session('error'))
                <div class=" w-full bg-red-100 border border-red-400 text-center text-red-700 w-2 px-4 py-3 m-2 rounded relative mb-4" role="alert">
                    <strong class="font-bold"></strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>  
            @endif
<!-- ✅ Member List Section -->
<div class="mt-10 bg-white shadow-md rounded-lg p-6 border border-gray-200">
  <h2 class="text-lg font-semibold text-teal-900 mb-4">Member List</h2>

  <!-- Member Table -->
  <div class="overflow-x-auto">
    <table id="membersTable" class="display responsive nowrap w-full text-sm border border-green-100 rounded-lg">
      <thead>
        <tr class="bg-green-100 text-green-900">
          <th>Member ID</th>
          <th>Fullname</th>
          <th>Contact</th>
          <th>Address</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Members as $Member)
        <tr>
          <td class="px-5">{{$Member->member_id}}</td>
          <td class="px-5">{{$Member->last_name}}, {{$Member->first_name}} {{$Member->middle_name}}</td>
          <td class="px-5">0{{$Member->contact_number}}</td>
          <td class="px-5">{{$Member->street_address}}, {{$Member->barangay}}, {{$Member->city}}, {{$Member->province}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
  <div class="flex justify-center mt-2">
    <form action="{{route ('Admin.dashboard')}}" method="GET" class="">
          <button class="inline-flex items-center px-3 py-1.5 rounded bg-green-100 text-green-800 hover:bg-green-200 transition-colors focus:outline-none focus:ring-2 focus:ring-green-400 shadow-sm mr-3">
          <i class="fa fa-arrow-left mr-2"></i> Back
          </button>
        </form>
  </div>

<script>
  $(document).ready(function() {
    $('#membersTable').DataTable();

    // ✅ When user clicks "Select", auto-fill Member ID field
    $(document).on('click', '.select-member', function() {
      let memberId = $(this).data('id');
      let memberName = $(this).data('name');

      // Example: fill the first input field
      document.querySelector("input[placeholder='enter member id']").value = memberId;

      alert("Selected: " + memberName + " (ID: " + memberId + ")");
    });
  });
</script>


<script>
  // Fill member ID when clicking row
  function fillMemberId(id) {
    // Example: always put ID into the first input (Shared Capital)
    document.querySelectorAll("input[placeholder='enter member id']").forEach(input => {
      input.value = id;
    });
  }
</script>

    
    <script>
      // Counter animation
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

      // Initialize counters when they come into view
    

      // User menu toggle
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

      // Shared Capital Form Handling
      const sharedCapitalForm = document.getElementById('shared-capital-form');
      
      if (sharedCapitalForm) {
        sharedCapitalForm.addEventListener('submit', function(e) {
          e.preventDefault();
          
          // Basic validation
          const memberId = document.getElementById('member_number').value;
          const shared_capital_amount = document.getElementById('shared_capital_amount').value;
          
          if (!memberId || !shared_capital_amount) {
            alert('Please fill in all required fields.');
            return;
          }
          
          // In a real application, you would send this data to your server
          console.log('Form submitted with data:', {
            memberId: memberId,
            memberName: document.getElementById('member_number').value,
            contactNumber: document.getElementById('contact-number').value,
            transactionDate: document.getElementById('transaction_date').value,
            shared_capital_amount: shared_capital_amount,
            transactionType: document.getElementById('frequency_of_payment').value,
            referenceNumber: document.getElementById('reference-number').value,
            notes: document.getElementById('notes').value
          });
          
          // Show success message (in a real app, you might use a toast notification)
          alert('Shared capital record added successfully!');
          
          // Reset the form
          sharedCapitalForm.reset();
        });
      }
    </script>
    <script>
  document.querySelectorAll(".transaction-card").forEach(card => {
    card.addEventListener("click", function(e) {
      // Don’t toggle if clicking inside input or button
      if (e.target.tagName === "INPUT" || e.target.tagName === "BUTTON") return;

      let searchBox = this.querySelector(".search-box");
      searchBox.classList.toggle("hidden");
    });
  });
</script>

{{-- loan --}}
<script>
  document.querySelectorAll(".transaction-card1").forEach(card => {
    card.addEventListener("click", function(e) {
      // Don't toggle if clicking inside input or button
      if (e.target.tagName === "INPUT" || e.target.tagName === "BUTTON") return;

      let searchBox = this.querySelector(".search-box");
      searchBox.classList.toggle("hidden");
    });
  });
</script>
{{-- savings --}}
<script>
  document.querySelectorAll(".transaction-card2").forEach(card => {
    card.addEventListener("click", function(e) {
      // Don't toggle if clicking inside input or button
      if (e.target.tagName === "INPUT" || e.target.tagName === "BUTTON") return;

      let searchBox = this.querySelector(".search-box");
      searchBox.classList.toggle("hidden");
    });
  });
</script>
{{-- Time deposit --}}

<script>
  document.querySelectorAll(".transaction-card3").forEach(card => {
    card.addEventListener("click", function(e) {
      // Don't toggle if clicking inside input or button
      if (e.target.tagName === "INPUT" || e.target.tagName === "BUTTON") return;

      let searchBox = this.querySelector(".search-box");
      searchBox.classList.toggle("hidden");
    });
  });
</script>
  </body>
</html>