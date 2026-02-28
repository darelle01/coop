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
    </div>
  </header>

  <!-- Main Content -->
  <main class="pt-28 pb-12 max-w-5xl mx-auto px-6">
    
    <!-- Back Button -->
    <form action="{{ route('Member.List') }}" method="GET" class="mb-6">
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
          <span class="text-gray-700 font-semibold">Accepted on: {{$Member->created_at}}</span>
          <br> 
          <span class="text-gray-700 font-semibold">Approved by: {{$Member->ApprovedBy}}</span>
        </div>
      </div>

      <!-- Basic Information -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Basic Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
          <div><span class="font-medium">Full Name: </span>{{$Member->last_name}}, {{$Member->first_name}} {{$Member->middle_name}}</div>
          <div><span class="font-medium">Place of Birth: </span>{{$Member->place_of_birth}}</div>
          <div><span class="font-medium">Birthdate: </span>{{$Member->birthdate}}</div>
          <div><span class="font-medium">Age: </span>{{$Member->age}}</div>
          <div><span class="font-medium">Gender: </span>{{$Member->gender}}</div>
          <div><span class="font-medium">Religion: </span>{{$Member->religion}}</div>
          <div><span class="font-medium">Nationality: </span>{{$Member->nationality}}</div>
          <div><span class="font-medium">Civil Status: </span>{{$Member->civil_status}}</div>
        </div>
      </div>

      <!-- Contact Information -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Contact Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
          <div><span class="font-medium">Email: </span>{{$Member->email}}</div>
          <div><span class="font-medium">Phone Number: </span>0{{$Member->contact_number}}</div>
        </div>
      </div>

      <!-- Address -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Address</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
          <div><span class="font-medium">Street Address: </span>{{$Member->street_address}}</div>
          <div><span class="font-medium">Barangay: </span>{{$Member->barangay}}</div>
          <div><span class="font-medium">City: </span>{{$Member->city}}</div>
          <div><span class="font-medium">Province: </span>{{$Member->province}}</div>
          <div><span class="font-medium">Zip Code: </span>{{$Member->zip_code}}</div>
          <div><span class="font-medium">Year of Stay: </span>{{$Member->year_of_stay}}</div>
          <div><span class="font-medium">House Ownership: </span>{{$Member->house_ownership}}</div>
        </div>
      </div>

      <!-- Emergency Contact -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Emergency Contact</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
          <div><span class="font-medium">Full Name: </span>{{$Member->ec_fullname}}</div>
          <div><span class="font-medium">Gender: </span>{{$Member->ec_gender}}</div>
          <div><span class="font-medium">Contact Number: </span>{{$Member->ec_contact_number}}</div>
          <div><span class="font-medium">email: </span>{{$Member->ec_email}}</div>
          <div><span class="font-medium">Address: </span>{{$Member->address}}</div>
          <div><span class="font-medium">Relationship: </span>{{$Member->ec_relationship}}</div>
        </div>
      </div>
      <!-- Employment Information -->
      <div>
        <h3 class="text-xl font-semibold text-teal-800 mb-3 border-b border-green-200 pb-1">Employment Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
          <div><span class="font-medium">Employment Status: </span>{{$Member->employment_status}}</div>
          <div><span class="font-medium">Source of Funds: </span>{{$Member->source_of_funds}}</div>
          <div><span class="font-medium">Employer/Business Name: </span>{{$Member->employer_business_name}}</div>
          <div><span class="font-medium">Occupation: </span>{{$Member->occupation}}</div>
          <div><span class="font-medium">Company or Business Address: </span>{{$Member->company_business_address}}</div>
          <div><span class="font-medium">Gross Monthly Income: </span>{{$Member->gross_monthly_income}}</div>
          <div><span class="font-medium">Nature/Type of Employment/Business: </span>{{$Member->nature_type_of_employment_business}}</div>
          <div><span class="font-medium">SSS/GSIS No: </span>{{$Member->sss_gsis_no}}</div>
          <div><span class="font-medium">TIN No: </span>{{$Member->tin_no}}</div>
        </div>
      </div>
      <!-- Attachments -->
      {{-- <div>
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
      </div> --}}

      <!-- Action Buttons -->


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