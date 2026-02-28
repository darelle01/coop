<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Member Registration Form | GBLDC</title>
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
          <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Member Registration Form</h1>
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
        <form action="{{route('Admin.Submit.Mem.Regis')}}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-6 max-w-7xl mx-auto bg-white p-10 md:p-20 shadow-lg rounded-lg mb-10">
        @csrf
        <!-- Personal Information Section -->
        <h3 class="text-2xl font-medium text-teal-900">Personal Information</h3>
        <p class="text-gray-600 mb-4">Please fill out the form below with your personal information.</p>
       
        <!-- Name Fields -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="lastName" class="block text-black">Last Name<span class="text-red-500">*</span></label>
                <input id="lastName" name="last_name" type="text" placeholder="Last Name" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>
            <div>
                <label for="firstName" class="block text-black">First Name<span class="text-red-500">*</span></label>
                <input id="firstName" name="first_name" type="text" placeholder="First Name" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>
            <div>
                <label for="middleName" class="block text-black">Middle Name<span class="text-red-500">*</span></label>
                <input id="middleName" name="middle_name" type="text" placeholder="Middle Name" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>
        </div>
    
        <!-- Birth Details -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="birthPlace" class="block text-black">Place of Birth<span class="text-red-500">*</span></label>
                <input id="birthPlace" type="text" name="place_of_birth" placeholder="Place of Birth" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>
            <div>
                <label for="birthDate" class="block text-black">Birth Date<span class="text-red-500">*</span></label>
                <input id="birthDate" name="birthdate" type="date" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400 text-black" required onchange="calculateAge()">
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label for="age" class="block text-black">Age<span class="text-red-500">*</span></label>
                    <input id="age" name="age" type="number" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400 text-black bg-gray-100" readonly required>
                </div>
                 <div>
                    <label class="block text-black">Gender<span class="text-red-500">*</span></label>
                    <div class="flex gap-4 mt-2">
                        <label><input type="radio" name="gender" value="Male" class="mr-1 mt-0.5"> Male</label>
                        <label><input type="radio" name="gender" value="Female" class="mr-1 mt-0.5"> Female</label>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Religion, Nationality, Status -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-400">
            <div>
                <label for="religion" class="block text-black">Religion<span class="text-red-500">*</span></label>
                <select id="religion" name="religion" class="mt-2 text-black border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                    <option value="">Select Religion</option>
                    <option value="ROMAN CATHOLIC" >ROMAN CATHOLIC</option>
                    <option value="PROTESTANT" >PROTESTANT</option>
                    <option value="CHRISTIAN" >CHRISTIAN</option>
                    <option value="BAPTIST" >BAPTIST</option>
                    <option value="SEVENTH-DAY ADVENTIST" >SEVENTH-DAY ADVENTIST</option>
                    <option value="IGLESIA NI CRISTO" >IGLESIA NI CRISTO</option>
                    <option value="ADVENTIST" >ADVENTIST</option>
                    <option value="BUDDHISM" >BUDDHISM</option>
                    <option value="JESUS IS LORD MOVEMENT" >JESUS IS LORD MOVEMENT</option>
                    <option value="JEHOVAH'S WITNESSES" >JEHOVAH'S WITNESSES</option>
                    <option value="METHODIST" >METHODIST</option>
                    <option value="NON-SECTARIAN" >NON-SECTARIAN</option>
                    <option value="SAKSI NI BAHO" >SAKSI NI BAHO</option>
                    <option value="" >OTHER</option>
                </select>
            </div>
            <div>
                <label for="nationality" class="block text-black">Nationality<span class="text-red-500">*</span></label>
                <input id="nationality" name="nationality" type="text" placeholder="Nationality" class="mt-2 text-black border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>
            <div>
                <label for="civilStatus" class="block text-black">Civil Status<span class="text-red-500">*</span></label>
                <select id="civilStatus" name="civil_status" class="mt-2 text-black border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                    <option value="">Select Status</option>
                    <option value="SINGLE">SINGLE</option>
                    <option value="WIDOW">WIDOW</option>
                    <option value="MARRIED">MARRIED</option>
                    <option value="SEPARATED">SEPARATED</option>
                </select>
            </div>
        </div>
        <div class="md:col-span-2 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="email" class="block text-black font-medium">Email Address<span class="text-red-500">*</span></label>
                    <input id="email" name="email" type="email" placeholder="Email Address" class="border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div>
                    <label for="contact" class="block text-black">Contact Number<span class="text-red-500">*</span></label>
                    <div class="flex items-center">
                        <span class="px-2 text-black">+63</span>
                        <input id="contact" name="contact_number" type="tel" pattern="[0-9]{10}" maxlength="10" class="p-2 rounded-sm w-full border focus:outline-none focus:ring-2 focus:ring-green-400" required inputmode="numeric" placeholder="9123456789">
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-300">
    
        <!-- Home Address -->
        <h3 class="text-2xl font-medium text-teal-900">Home Address</h3>
        <label for="street" class="block text-black">Street Address<span class="text-red-500">*</span></label>
        <input id="street" type="text" name="street_address" placeholder="No. & Street" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-400">
            <div>
                <label for="province" class="block text-black">Province<span class="text-red-500">*</span></label>
                <select id="province" name="province" class="mt-2 border border-gray-300 text-black p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Select Province</option>
                    <option value="Bulacan">Bulacan</option>
                    <option value="Pampanga">Pampanga</option>
                    <option value="Bataan">Bataan</option>
                    <option value="Nueva Ecija">Nueva Ecija</option>
                    <option value="Tarlac">Tarlac</option>
                    <option value="Zambales">Zambales</option>
                    <option value="Aurora">Aurora</option>
                    <option value="">Other</option>
                </select>
            </div>
            <div>
                <label for="city" class="block text-black">City<span class="text-red-500">*</span></label>
                <select id="city" name="city" class="mt-2 border border-gray-300 text-black p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Select City</option>
                    <option value="Baliuag">Baliuag</option>
                    <option value="Malolos">Malolos</option>
                    <option value="Meycauayan">Meycauayan</option>
                    <option value="San Jose del Monte">San Jose del Monte</option>
                    <option value="Marilao">Marilao</option>
                    <option value="Santa Maria">Santa Maria</option>
                    <option value="Plaridel">Plaridel</option>
                    <option value="San Rafael">San Rafael</option>
                    <option value="San Ildefonso">San Ildefonso</option>
                    <option value="Guiguinto">Guiguinto</option>
                    <option value="Balagtas">Balagtas</option>
                    <option value="Bocaue">Bocaue</option>
                    <option value="Obando">Obando</option>
                    <option value="Bulakan">Bulakan</option>
                    <option value="Angat">Angat</option>
                    <option value="Norzagaray">Norzagaray</option>
                    <option value="Pulilan">Pulilan</option>
                    <option value="Hagonoy">Hagonoy</option>
                    <option value="Paombong">Paombong</option>
                    <option value="Calumpit">Calumpit</option>
                    <option value="Dona Remedios Trinidad">Dona Remedios Trinidad</option>
                    <option value="Bustos">Bustos</option>
                    <option value="Pandi">Pandi</option>
                    <option value="">Other</option>
                </select>
            </div>
            <div>
                <label for="barangay" class="block text-black">Barangay<span class="text-red-500">*</span></label>
                <select id="barangay" name="barangay" class="mt-2 border border-gray-300 text-black p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Select Barangay</option>
                    <option value="Baliuag">Baliuag</option>
                    <option value="Malolos">Malolos</option>
                    <option value="Meycauayan">Meycauayan</option>
                    <option value="San Jose del Monte">San Jose del Monte</option>
                    <option value="Marilao">Marilao</option>
                    <option value="Santa Maria">Santa Maria</option>
                    <option value="Plaridel">Plaridel</option>
                    <option value="San Rafael">San Rafael</option>
                    <option value="San Ildefonso">San Ildefonso</option>
                    <option value="Guiguinto">Guiguinto</option>
                    <option value="Balagtas">Balagtas</option>
                    <option value="Bocaue">Bocaue</option>
                    <option value="Obando">Obando</option>
                    <option value="Bulakan">Bulakan</option>
                    <option value="Angat">Angat</option>
                    <option value="Norzagaray">Norzagaray</option>
                    <option value="Pulilan">Pulilan</option>
                    <option value="Hagonoy">Hagonoy</option>
                    <option value="Paombong">Paombong</option>
                    <option value="Calumpit">Calumpit</option>
                    <option value="Dona Remedios Trinidad">Dona Remedios Trinidad</option>
                    <option value="Bustos">Bustos</option>
                    <option value="Pandi">Pandi</option>
                    <option value="">Other</option>
                </select>
            </div>
        </div>
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="yearsOfStay" class="block text-black">Years of Stay<span class="text-red-500">*</span></label>
                <input id="yearsOfStay" name="year_of_stay" type="text" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>
            <div>
                <label for="houseOwnership" class="block text-black">House Ownership<span class="text-red-500">*</span></label>
                <select id="houseOwnership" name="house_ownership" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                    <option value="">Select Ownership</option>
                    <option value="Owned">Owned</option>
                    <option value="Rented">Rented</option>
                    <option value="Living with Parents">Living with Parents</option>
                    <option value="">Other</option>
                </select>
                </div>
                <div>
                    <label for="zipCode" class="block text-black">Zip Code<span class="text-red-500">*</span></label>
                    <input id="zipCode" name="zip_code" type="text" placeholder="Zip Code" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
        </div>
        
        <hr class="my-6 border-gray-300">
        
        <!-- Emergency Contact -->
        <h3 class="text-2xl font-medium text-teal-900">Emergency Contact</h3>
        <p class="text-gray-600 mb-4">Please provide information for your emergency contact person.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="emergencyFullName" class="block text-black">Full Name<span class="text-red-500">*</span></label>
                <input id="emergencyFullName" name="ec_fullname" type="text" placeholder="Full Name" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>
            <div>
                <label class="block text-black">Gender<span class="text-red-500">*</span></label>
                <div class="flex gap-4 mt-2">
                    <label><input type="radio" name="ec_gender" value="Male" class="mr-1 mt-0.5" required> Male</label>
                    <label><input type="radio" name="ec_gender" value="Female" class="mr-1 mt-0.5"> Female</label>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="emergencyEmail" class="block text-black font-medium">Email Address</label>
                <input id="emergencyEmail" name="ec_email" type="email" placeholder="Email Address" class="border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div>
                <label for="emergencyContact" class="block text-black">Contact Number<span class="text-red-500">*</span></label>
                <div class="flex items-center">
                    <span class="px-2 text-black">+63</span>
                    <input id="emergencyContact" name="ec_contact_number" type="tel" pattern="[0-9]{10}" maxlength="10" class="p-2 rounded-sm w-full border focus:outline-none focus:ring-2 focus:ring-green-400" required inputmode="numeric" placeholder="9123456789">
                </div>
            </div>
        </div>
        
        <div>
            <label for="emergencyAddress" class="block text-black">Address<span class="text-red-500">*</span></label>
            <input id="emergencyAddress" name="ec_address" type="text" placeholder="Complete Address" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
        </div>
        
        <div>
            <label for="emergencyRelationship" class="block text-black">Relationship<span class="text-red-500">*</span></label>
            <select id="emergencyRelationship" name="ec_relationship" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                <option value="">Select Relationship</option>
                <option value="Parent">Parent</option>
                <option value="Spouse">Spouse</option>
                <option value="Sibling">Sibling</option>
                <option value="Child">Child</option>
                <option value="Relative">Relative</option>
                <option value="Friend">Friend</option>
                <option value="Colleague">Colleague</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <hr class="my-6 border-gray-300">
        
        <!-- Employment Information Section -->
        <h3 class="text-2xl font-medium text-teal-900">Employment Information</h3>
        <p class="text-sm text-gray-600">Please provide your employment information to help us understand your financial background.</p>
        
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-normal font-medium mb-1">Employment Status <span class="text-red-500">*</span></label>
                <select name="employment_status" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Select</option>
                    <option value="Employed">Employed</option>
                    <option value="Self Employed">Self-Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Retired">Retired</option>
                    <option value="Student">Student</option>
                    <option value="Freelancer">Freelancer</option>
                    <option value="OFW">OFW</option>
                    <option value="Part Time">Part-Time</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Seasonal">Seasonal</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="Homemaker">Homemaker</option>
                    <option value="Disabled">Disabled</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div>
                <label class="block text-normal font-medium mb-1">Source of Funds <span class="text-red-500">*</span></label>
                <select name="source_of_funds" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Select</option>
                    <option value="Salary">Salary</option>
                    <option value="Business">Business</option>
                    <option value="Pension">Pension</option>
                    <option value="Remittance">Remittance</option>
                    <option value="Investment">Investment</option>
                    <option value="Allowance">Allowance</option>
                    <option value="Rental Income">Rental Income</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-normal font-medium mb-1">Employer/Business Name <span class="text-red-500">*</span></label>
                <input type="text" name="employer_business_name" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Employer/Business Name">
            </div>
            <div>
                <label class="block text-normal font-medium mb-1">Occupation <span class="text-red-500">*</span></label>
                <select name="occupation" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Select Occupation</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Police Officer">Police Officer</option>
                    <option value="Firefighter">Firefighter</option>
                    <option value="Driver">Driver</option>
                    <option value="Salesperson">Salesperson</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Manager">Manager</option>
                    <option value="Clerk">Clerk</option>
                    <option value="Farmer">Farmer</option>
                    <option value="Fisherman">Fisherman</option>
                    <option value="Construction Worker">Construction Worker</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="Self-Employed">Self-Employed</option>
                    <option value="Student">Student</option>
                    <option value="Retired">Retired</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        
        <div>
            <label class="block text-normal font-medium mb-1">Company/Business Address <span class="text-red-500">*</span></label>
            <input type="text" name="company_business_address" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Company/Business Address">
        </div>
        
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-normal font-medium mb-1">Gross Monthly Income <span class="text-red-500">*</span></label>
                <select name="gross_monthly_income" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Select</option>
                    <option value="below 10000">Below ₱10,000</option>
                    <option value="10000 - 20000">₱10,000 - ₱20,000</option>
                    <option value="20001 - 30000">₱20,001 - ₱30,000</option>
                    <option value="30001 - 50000">₱30,001 - ₱50,000</option>
                    <option value="50001 - 100000">₱50,001 - ₱100,000</option>
                    <option value="above - 100000">Above ₱100,000</option>
                </select>
            </div>
            <div>
                <label class="block text-normal font-medium mb-1">Nature/Type of Employment/Business <span class="text-red-500">*</span></label>
                <select name="nature_type_of_employment_business" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Select</option>
                    <option value="Government">Government</option>
                    <option value="Private">Private</option>
                    <option value="Self-Employed">Self-Employed</option>
                    <option value="OFW">OFW</option>
                    <option value="Freelancer">Freelancer</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="Retired">Retired</option>
                    <option value="Student">Student</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Non-Profit/NGO">Non-Profit/NGO</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Part-Time">Part-Time</option>
                    <option value="Seasonal">Seasonal</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-normal font-medium mb-1">SSS/GSIS No. <span class="text-red-500">*</span></label>
                <input type="text" name="sss_gsis_no" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="SSS/GSIS No.">
            </div>
            <div>
                <label class="block text-normal font-medium mb-1">TIN No. <span class="text-red-500">*</span></label>
                <input type="text" name="tin_no" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="TIN No.">
            </div>
        </div>
        
        <hr class="my-6 border-gray-300">
        
        <!-- Attachments Section -->
        <h3 class="text-2xl font-medium mb-2 text-teal-900">Attachments</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- 2x2 Picture -->
            <div>
                <label class="block font-normal mb-1 text-normal">2x2 Picture <span class="text-red-500">*</span></label>
                <div class="flex items-center gap-3">
                    <input type="text" id="picName" class="border px-3 py-2 rounded w-72 mt-3" placeholder="2x2 Picture" readonly>
                    <input type="file" name="two_by_two_picture" id="picFile" class="text-sm cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" accept="image/*">
                    <button type="button" id="picRemove" class="hidden text-red-500 text-base">Remove</button>
                    <button type="button" id="picReplace" class="hidden text-blue-500 text-base">Replace</button>
                </div>
                <img id="picPreview" class="mt-2 w-32 h-32 object-cover rounded border hidden" />
            </div>
            <!-- Proof of Billing -->
            <div>
                <label class="block font-normal mb-1 text-normal">Proof of Billing <span class="text-red-500">*</span></label>
                <div class="flex items-center gap-3">
                    <input type="text" id="billingName" class="border px-3 py-2 rounded w-72 mt-3" placeholder="Proof of Billing" readonly>
                    <input type="file" name="proof_of_billing" id="billingFile" class="text-sm cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" accept="image/*">
                    <button type="button" id="billingRemove" class="hidden text-red-500 text-base">Remove</button>
                    <button type="button" id="billingReplace" class="hidden text-blue-500 text-base">Replace</button>
                </div>
                <img id="billingPreview" class="mt-2 w-32 h-32 object-cover rounded border hidden" />
            </div>
            <!-- Valid ID -->
            <div>
                <label class="block font-normal mb-1 text-normal">Valid ID <span class="text-red-500">*</span></label>
                <div class="flex items-center gap-3">
                    <input type="text" id="validIdName" class="border px-3 py-2 rounded w-72 mt-3" placeholder="Valid ID" readonly>
                    <input type="file" name="valid_id" id="validIdFile" class="text-sm cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" accept="image/*">
                    <button type="button" id="validIdRemove" class="hidden text-red-500 text-base">Remove</button>
                    <button type="button" id="validIdReplace" class="hidden text-blue-500 text-base">Replace</button>
                </div>
                <img id="validIdPreview" class="mt-2 w-32 h-32 object-cover rounded border hidden" />
            </div>
        </div>
        
        <p class="text-sm text-gray-500 mt-6">Please ensure all attachments are clear and legible.</p>
        <p class="text-sm text-gray-500 mt-2">Accepted file formats: JPG, PNG, PDF</p>
        
        <!-- Terms and Conditions -->
        <div class="md:col-span-2 flex items-start mt-10">
            <input type="checkbox" id="terms" required class="mt-1 mr-2">
            <label for="terms" class="text-sm text-gray-700">I confirm that all information provided is true and I agree to the <a href="#" class="text-green-700 underline">Terms & Conditions</a> of GBLDC.</label>
        </div>
        
       

        <!-- Button Area -->
        <div class="flex justify-between mt-6 font-light">
            <a href="{{route ('Manage.Members')}}" type="button" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Back</a>
            
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Submit</button>
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
    <script>
        function calculateAge() {
            const birthDateInput = document.getElementById('birthDate');
            const ageInput = document.getElementById('age');
            const birthDateValue = birthDateInput.value;
            if (!birthDateValue) {
            ageInput.value = '';
            return;
            }
            const today = new Date();
            const birthDate = new Date(birthDateValue);
            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
            }
            ageInput.value = age >= 0 ? age : '';
        }
    </script>
    </body>
</html>