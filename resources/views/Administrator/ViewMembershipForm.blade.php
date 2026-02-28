<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <title>Member Details | GBLDC Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome CDN for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}" />
</head>
<body class="bg-gray-50 font-sans text-gray-800 min-h-screen">

  <!-- Header -->
  <header class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">
      <div class="flex items-center space-x-4">
        <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="GBLDC Logo" class="w-12 h-12 object-cover" />
        <h1 class="text-teal-900 font-semibold text-xl md:text-2xl">GBLDC Admin Member Details</h1>
      </div>
      <div class="relative">
        <button id="user-menu-button" class="flex items-center gap-2 focus:outline-none cursor-pointer">
          <span class="hidden md:inline font-medium text-gray-700">Admin</span>
          <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="Admin Avatar" 
               class="w-10 h-10 rounded-full border-2 border-green-600 object-cover" />
          <i class="fas fa-chevron-down text-gray-600"></i>
        </button>
        <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded shadow-lg border border-gray-100 py-2 hidden transition duration-200 ease-in-out">
          <a href="#" class="block px-4 py-2 text-sm hover:bg-green-50 hover:text-green-700 text-gray-700">Profile</a>
          <a href="#" class="block px-4 py-2 text-sm hover:bg-green-50 hover:text-green-700 text-gray-700">Settings</a>
          <div class="border-t border-gray-200 my-1"></div>
          <a href="{{ route('Admin.Logout') }}"
              class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition">Logout</a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="pt-28 pb-12 max-w-5xl mx-auto px-6">
    
    <!-- Back Button -->
    <form action="{{ route('Manage.Members') }}" method="GET" class="mb-6">
      <button type="submit" 
              class="inline-flex items-center gap-2 rounded bg-green-100 text-green-800 hover:bg-green-200 px-3 py-1.5 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400">
        <i class="fa fa-arrow-left"></i> Back
      </button>
    </form>
    
    <section class="bg-white rounded-xl shadow p-6 space-y-8">

      <h2 class="text-3xl font-bold text-teal-900 mb-4">Member Details</h2>

      <!-- Status Badge & Registration Date -->
      <div class="flex flex-wrap items-center gap-4 mb-6">
        <div>
          <span class="text-gray-700 font-semibold">Status:</span>
          <span class="inline-block bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full font-semibold">Pending</span>
        </div>
        <div>
          <span class="text-gray-700 font-semibold">Registration send on: {{$Review->created_at}}</span> 
          <span></span>
        </div>
      </div>

      <!-- Basic Information -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Basic Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
          <div><span class="font-medium">Full Name: </span>{{$Review->last_name}}, {{$Review->first_name}} {{$Review->middle_name}}</div>
          <div><span class="font-medium">Place of Birth: </span>{{$Review->place_of_birth}}</div>
          <div><span class="font-medium">Birthdate: </span>{{$Review->birthdate}}</div>
          <div><span class="font-medium">Age: </span>{{$Review->age}}</div>
          <div><span class="font-medium">Gender: </span>{{$Review->gender}}</div>
          <div><span class="font-medium">Religion: </span>{{$Review->religion}}</div>
          <div><span class="font-medium">Nationality: </span>{{$Review->nationality}}</div>
          <div><span class="font-medium">Civil Status: </span>{{$Review->civil_status}}</div>
        </div>
      </div>

      <!-- Contact Information -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Contact Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
          <div><span class="font-medium">Email: </span>{{$Review->email}}</div>
          <div><span class="font-medium">Phone Number: </span>0{{$Review->contact_number}}</div>
        </div>
      </div>

      <!-- Address -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Address</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
          <div><span class="font-medium">Street Address: </span>{{$Review->street_address}}</div>
          <div><span class="font-medium">Barangay: </span>{{$Review->barangay}}</div>
          <div><span class="font-medium">City: </span>{{$Review->city}}</div>
          <div><span class="font-medium">Province: </span>{{$Review->province}}</div>
          <div><span class="font-medium">Zip Code: </span>{{$Review->zip_code}}</div>
          <div><span class="font-medium">Year of Stay: </span>{{$Review->year_of_stay}}</div>
          <div><span class="font-medium">House Ownership: </span>{{$Review->house_ownership}}</div>
        </div>
      </div>

      <!-- Emergency Contact -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Emergency Contact</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
          <div><span class="font-medium">Full Name: </span>{{$Review->ec_fullname}}</div>
          <div><span class="font-medium">Gender: </span>{{$Review->ec_gender}}</div>
          <div><span class="font-medium">Contact Number: </span>{{$Review->ec_contact_number}}</div>
          <div><span class="font-medium">email: </span>{{$Review->ec_email}}</div>
          <div><span class="font-medium">Address: </span>{{$Review->address}}</div>
          <div><span class="font-medium">Relationship: </span>{{$Review->ec_relationship}}</div>
        </div>
      </div>
      <!-- Employment Information -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Employment Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
          <div><span class="font-medium">Employment Status: </span>{{$Review->employment_status}}</div>
          <div><span class="font-medium">Source of Funds: </span>{{$Review->source_of_funds}}</div>
          <div><span class="font-medium">Employer/Business Name: </span>{{$Review->employer_business_name}}</div>
          <div><span class="font-medium">Occupation: </span>{{$Review->occupation}}</div>
          <div><span class="font-medium">Company or Business Address: </span>{{$Review->company_business_address}}</div>
          <div><span class="font-medium">Gross Monthly Income: </span>{{$Review->gross_monthly_income}}</div>
          <div><span class="font-medium">Nature/Type of Employment/Business: </span>{{$Review->nature_type_of_employment_business}}</div>
          <div><span class="font-medium">SSS/GSIS No: </span>{{$Review->sss_gsis_no}}</div>
          <div><span class="font-medium">TIN No: </span>{{$Review->tin_no}}</div>
        </div>
      </div>
      <!-- Attachments -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Attachments</h3>
        <div class="flex flex-wrap gap-6 text-gray-700">
          <div>
            <span class="font-medium">Proof of Billing:</span><br />
            <img src="data:{{ $Proof_of_Billings_MimeType }};base64,{{ $Proof_of_Billings_Base64 }}" alt="Proof of Billing">
          </div>
          <div>
            <span class="font-medium">2x2 Picture:</span><br />
            <img src="data:{{ $two_by_two_picture_MimeType }};base64,{{ $two_by_two_picture_Base64 }}" alt="2x2 Picture">
          </div>
          <div>
            <span class="font-medium">Valid ID:</span><br />
            <img src="data:{{ $valid_id_MimeType }};base64,{{ $valid_id_Base64 }}" alt="Valid ID">
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="mt-8 flex flex-wrap gap-4">
        <form action="{{route('Approve.member')}}" method="POST" class="inline">
          @csrf
          <input type="text" name="member_id" class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200" placeholder="Assign Member ID" required>
          <input type="hidden" name="id" value="{{$Review->id}}">
          <button type="submit"
                  class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow flex items-center gap-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            <i class="fas fa-check"></i> Approve
          </button>
        </form>
        <form action="{{route('Reject.member')}}" method="POST" class="inline">
          @csrf
          <input type="hidden" name="id" value="{{$Review->id}}">
          <button type="submit"
                  class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg shadow flex items-center gap-2 focus:outline-none focus:ring-2 focus:ring-red-400">
            <i class="fas fa-times"></i> Reject
          </button>
        </form>
      </div>

    </section>
  </main>

  <script>
    // Toggle User Menu
    const userMenuBtn = document.getElementById("user-menu-button");
    const userMenu = document.getElementById("user-menu");

    userMenuBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      userMenu.classList.toggle("hidden");
    });

    document.addEventListener("click", () => {
      userMenu.classList.add("hidden");
    });
  </script>
</body>
</html>