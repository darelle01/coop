<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>View Loan Record | GBLDC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      /* Custom styles for enhanced borders and green theme */
      .content-section {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background-color: white;
        margin-bottom: 1.5rem;
        overflow: hidden;
      }
      
      .section-header {
        background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
        color: white;
        padding: 14px 18px;
        margin-bottom: 0;
        font-size: 1.1rem;
      }
      
      .section-content {
        padding: 1.5rem;
      }
      
      .info-field {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
      }
      
      .info-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.25rem;
        font-size: 0.875rem;
      }
      
      .info-value {
        padding: 0.75rem;
        background-color: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        color: #4b5563;
      }
      
      .id-image {
        max-width: 100%;
        height: auto;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 8px;
        background-color: white;
      }
      
      .guarantor-section {
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
        background-color: #f9fafb;
      }
      
      .guarantor-header {
        color: #15803d;
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }
    </style>
  </head>
  <body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen">
    <!-- Header Section -->
    <header class="bg-white shadow-md fixed left-0 top-0 z-50 w-full">
      <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3 relative">
        <div class="flex items-center space-x-4">
          <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="GBLDC Logo" class="w-12 h-12 object-cover" />
          <h1 class="text-lg md:text-xl font-semibold text-green-900">GBLDC Loan</h1>
        </div>
        <div class="relative">
          <button id="user-menu-button" class="flex items-center gap-3 focus:outline-none bg-green-50 rounded-full p-1 pr-3 hover:bg-green-100 transition">
            <span class="hidden md:inline text-gray-700 font-medium">Admin</span>
            <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="Admin Avatar" class="w-10 h-10 rounded-full border-2 border-green-600 object-cover" />
            <i class="fas fa-chevron-down text-gray-600 text-sm"></i>
          </button>
          <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 py-2 hidden transition-all duration-200 ease-in-out z-50">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
              <i class="fas fa-user mr-2"></i>Profile
            </a>
            <a href="{{route ('Admin.manage')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
              <i class="fas fa-users-cog mr-2"></i>Manage User
            </a>
            <a href="admin-settings.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
              <i class="fas fa-cog mr-2"></i>Settings
            </a>
            <div class="border-t my-1 border-gray-200"></div>
            <a href="{{ route('Admin.Logout') }}"
              class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition">Logout</a>
          </div>
        </div>
      </div>
    </header>
    
    <main class="max-w-5xl mx-auto mt-28 p-6">
      <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-green-900 mb-2">Member Loan Record</h1>
        <p class="text-gray-700">View the current loan details and information.</p>
      </div>
      
      <!-- Action Buttons -->
      <div class="flex justify-between mb-6">
         <a href="{{route ('Loan.Records')}}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition flex items-center gap-2">
          Back to List
        </a>
       
      </div>

      <form action="{{route ('Loan.Approval')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$Review->id}}">
        <input type="hidden" name="last_name" value="{{$Review->last_name}}">
        <input type="hidden" name="first_name" value="{{$Review->first_name}}">
        <input type="hidden" name="middle_name" value="{{$Review->middle_name}}">
        
        <!-- Loan Terms Section -->
        <div class="content-section">
          <h2 class="section-header">
            <i class="fas fa-file-contract mr-2"></i>Loan Terms
          </h2>
          <div class="section-content grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="info-field">
              <span class="info-label">Loan Number</span>
              <input type="text" name="loan_number" readonly value="{{$Review->loan_number}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Loan Term</span>
              <input type="text" name="loan_term" readonly value="{{ $Review->loan_term }}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Loan Amount Granted</span>
              <input type="text" name="loan_amount" readonly value="{{$Review->loan_amount}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Due Amount</span>
              <input type="text" name="due_amount" readonly value="{{$Review->due_amount}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Frequency of Payment</span>
              <input type="text" name="frequency_of_payment" readonly value="{{$Review->frequency_of_payment}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Approved By</span>
              <input type="text" name="approved_by" readonly value="{{$Review->approved_by}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Encoded By</span>
              <input type="text" name="encoded_by" readonly value="{{$Review->encoded_by}}" class="info-value">
            </div>
          </div>
        </div>

        <!-- Personal Information -->
        <div class="content-section">
          <h2 class="section-header">
            <i class="fas fa-user mr-2"></i>Personal Information
          </h2>
          <div class="section-content grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="info-field">
              <span class="info-label">Full Name</span>
              <div class="info-value">{{$Review->last_name}}, {{$Review->first_name}} {{$Review->middle_name}}</div>
            </div>
            <div class="info-field">
              <span class="info-label">Birth Date</span>
              <input type="text" name="birthdate" readonly value="{{$Review->birthdate}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Place of Birth</span>
              <input type="text" name="place_of_birth" readonly value="{{$Review->place_of_birth}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Age</span>
              <input type="text" name="age" readonly value="{{$Review->age}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Gender</span>
              <input type="text" name="gender" readonly value="{{$Review->gender}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Religion</span>
              <input type="text" name="religion" readonly value="{{$Review->religion}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Nationality</span>
              <input type="text" name="nationality" readonly value="{{$Review->nationality}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Civil Status</span>
              <input type="text" name="civil_status" readonly value="{{$Review->civil_status}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Email Address</span>
              <input type="text" name="email" readonly value="{{$Review->email}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Contact Number</span>
              <input type="text" name="contact_number" readonly value="{{$Review->contact_number}}" class="info-value">
            </div>
          </div>
        </div>

        <!-- Home Address -->
        <div class="content-section">
          <h2 class="section-header">
            <i class="fas fa-home mr-2"></i>Home Address
          </h2>
          <div class="section-content grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="info-field">
              <span class="info-label">Street Address</span>
              <input type="text" name="street_address" readonly value="{{$Review->street_address}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Province</span>
              <input type="text" name="province" readonly value="{{$Review->province}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">City/Municipality</span>
              <input type="text" name="city_municipality" readonly value="{{$Review->city_municipality}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Barangay</span>
              <input type="text" name="barangay" readonly value="{{$Review->barangay}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Years of Stay</span>
              <input type="text" name="year_of_stay" readonly value="{{$Review->year_of_stay}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">House Ownership</span>
              <input type="text" name="house_ownership" readonly value="{{$Review->house_ownership}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Zip Code</span>
              <input type="text" name="zip_code" readonly value="{{$Review->zip_code}}" class="info-value">
            </div>
          </div>
        </div>

        <!-- Guarantors -->
        <div class="content-section">
          <h2 class="section-header">
            <i class="fas fa-user-friends mr-2"></i>Guarantor Information
          </h2>
          <div class="section-content">
            <!-- First Guarantor -->
            <div class="guarantor-section">
              <h3 class="guarantor-header">
                <i class="fas fa-user-check"></i>First Guarantor
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="info-field">
                  <span class="info-label">Full Name</span>
                  <input type="text" name="g1_fullname" readonly value="{{$Review->g1_fullname}}" class="info-value">
                </div>
                <div class="info-field">
                  <span class="info-label">Relationship</span>
                  <input type="text" name="g1_relationship" readonly value="{{$Review->g1_relationship}}" class="info-value">
                </div>
                <div class="info-field">
                  <span class="info-label">Contact Number</span>
                  <input type="text" name="g1_contact_number" readonly value="{{$Review->g1_contact_number}}" class="info-value">
                </div>
                <div class="info-field">
                  <span class="info-label">Address</span>
                  <input type="text" name="g1_address" readonly value="{{$Review->g1_address}}" class="info-value">
                </div>
                <div class="info-field md:col-span-2">
                  <span class="info-label">Valid ID Uploaded</span>
                  <img src="data:{{ $g1MimeType }};base64,{{ $g1Base64 }}" alt="First Guarantor Valid ID" class="id-image">
                </div>
              </div>
            </div>
            
            <!-- Second Guarantor -->
            <div class="guarantor-section">
              <h3 class="guarantor-header">
                <i class="fas fa-user-check"></i>Second Guarantor
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="info-field">
                  <span class="info-label">Full Name</span>
                  <input type="text" name="g2_fullname" readonly value="{{$Review->g2_fullname}}" class="info-value">
                </div>
                <div class="info-field">
                  <span class="info-label">Relationship</span>
                  <input type="text" name="g2_relationship" readonly value="{{$Review->g2_relationship}}" class="info-value">
                </div>
                <div class="info-field">
                  <span class="info-label">Contact Number</span>
                  <input type="text" name="g2_contact_number" readonly value="{{$Review->g2_contact_number}}" class="info-value">
                </div>
                <div class="info-field">
                  <span class="info-label">Address</span>
                  <input type="text" name="g2_address" readonly value="{{$Review->g2_address}}" class="info-value">
                </div>
                <div class="info-field md:col-span-2">
                  <span class="info-label">Valid ID Uploaded</span>
                  <img src="data:{{ $g2MimeType }};base64,{{ $g2Base64 }}" alt="Second Guarantor Valid ID" class="id-image">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Employment / Business Information -->
        <div class="content-section">
          <h2 class="section-header">
            <i class="fas fa-briefcase mr-2"></i>Employment / Business Information
          </h2>
          <div class="section-content grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="info-field">
              <span class="info-label">Employment Type</span>
              <input type="text" name="employment_type" readonly value="{{$Review->employment_type}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Employer / Business Name</span>
              <input type="text" name="employer_business_name" readonly value="{{$Review->employer_business_name}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Position / Nature of Business</span>
              <input type="text" name="position_nature_of_business" readonly value="{{$Review->position_nature_of_business}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Employer / Business Address</span>
              <input type="text" name="employer_business_address" readonly value="{{$Review->employer_business_address}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Monthly Income</span>
              <input type="text" name="monthly_income" readonly value="{{$Review->monthly_income}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Years in Service / Operation</span>
              <input type="text" name="year_in_service_operation" readonly value="{{$Review->year_in_service_operation}}" class="info-value">
            </div>
            <div class="info-field md:col-span-2">
              <span class="info-label">Proof of Income Uploaded</span>
              <img src="data:{{ $proofMimeType }};base64,{{ $proofBase64 }}" alt="Proof of Income" class="id-image">
            </div>
          </div>
        </div>

        <!-- Loan Details -->
        <div class="content-section">
          <h2 class="section-header">
            <i class="fas fa-file-invoice-dollar mr-2"></i>Loan Details
          </h2>
          <div class="section-content grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="info-field">
              <span class="info-label">Loan Type</span>
              <input type="text" name="loan_type" readonly value="{{ $Review->loan_type }}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">Loan Amount</span>
              <input type="text" readonly value="{{ $Review->loan_amount }}" class="info-value">
            </div>
            <div class="info-field md:col-span-2">
              <span class="info-label">Purpose of Loan</span>
              <input type="text" name="purpose_of_loan" readonly value="{{ $Review->purpose_of_loan }}" class="info-value">
            </div>
          </div>
        </div>

        <!-- Additional Information -->
        <div class="content-section">
          <h2 class="section-header">
            <i class="fas fa-info-circle mr-2"></i>Additional Information
          </h2>
          <div class="section-content grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="info-field">
              <span class="info-label">HR / Contact Person Name</span>
              <input type="text" name="hr_person_name" readonly value="{{$Review->hr_person_name}}" class="info-value">
            </div>
            <div class="info-field">
              <span class="info-label">HR / Contact Person Number</span>
              <input type="text" name="hr_person_number" readonly value="{{$Review->hr_person_number}}" class="info-value">
            </div>
          </div>
        </div>
      </form>
    </main>

    <footer class="max-w-7xl mx-auto p-4 text-center text-gray-500 text-sm mt-8">
      &copy; {{ date('Y') }} GBLDC. All rights reserved.
    </footer>

    <script>
      const userMenuBtn = document.getElementById("user-menu-button");
      const userMenu = document.getElementById("user-menu");

      userMenuBtn.addEventListener("click", (e) => {
        e.stopPropagation();
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