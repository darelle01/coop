<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome for Icons -->
    <script src="https://kit.fontawesome.com/e588cb9d47.js"
      crossorigin="anonymous"></script>
    <link rel="icon" type="image/png"
      href="{{asset('images/logocoop-removebg-preview-2.png')}}" sizes="512x512" />
    <link href="../src/animation/animation.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap"
      rel="stylesheet">    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src={{asset("js/dropdown.js")}}></script>
    <script src={{asset("js/landingpage.js")}}></script>
    <script src={{asset("/js/landingpage-user.js")}}></script>
    <title>Loan Application | GBLDC</title>
  </head>

  <body class="bg-white text-gray-800 scroll-smooth"
    style="font-family: Outfit;">
    <!-- Header Section -->
    <header
      class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-sm shadow-sm border-b border-gray-100">
      <div
        class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3 lg:py-0">
        <!-- Logo Section - Responsive sizing -->
        <a href="{{route ('Member.Landing')}}"
          class="flex items-center gap-2 sm:gap-3 py-1 sm:py-2 flex-shrink-0">
          <img src="{{asset('images/logocoop-removebg-preview-2.png')}}"
            alt="GBLDC Logo"
            class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 object-contain">
          <span
            class="font-semibold text-base sm:text-lg lg:text-xl text-green-700 tracking-tight whitespace-nowrap">GBLDC</span>
        </a>

        <!-- Desktop Navigation -->
        <nav
          class="hidden lg:flex items-center gap-1 xl:gap-4 text-sm xl:text-base font-medium">
          <a href="{{route ('Member.Landing')}}"
            class="px-2 xl:px-3 py-2 rounded-md hover:bg-green-50 hover:text-green-700 transition-colors duration-200">Home</a>

          <!-- Products & Services Dropdown -->
          <div class="relative group">
            <button
              class="flex items-center gap-1 px-2 xl:px-3 py-2 rounded-md hover:bg-green-50 hover:text-green-700 transition-colors duration-200 focus:outline-none">
              <span class="whitespace-nowrap">Product &
                Services</span>
              <i
                class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180 duration-200"></i>
            </button>
            <div
              class="absolute left-0 top-full mt-2 w-48 bg-white border border-gray-100 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-20">
              <a href="loan-products.html"
                class="block px-4 py-3 hover:bg-green-50 hover:text-green-700 rounded-t-lg transition-colors">Loans</a>
              <a href="deposit.html"
                class="block px-4 py-3 hover:bg-green-50 hover:text-green-700 transition-colors">Deposits</a>
              <a href="savings-page.html"
                class="block px-4 py-3 hover:bg-green-50 hover:text-green-700 rounded-b-lg transition-colors">Savings</a>
            </div>
          </div>

          <!-- About Dropdown -->
          <div class="relative group">
            <button
              class="flex items-center gap-1 px-2 xl:px-3 py-2 rounded-md hover:bg-green-50 hover:text-green-700 transition-colors duration-200 focus:outline-none">
              <span>About</span>
              <i
                class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180 duration-200"></i>
            </button>
            <div
              class="absolute left-0 top-full mt-2 w-56 bg-white border border-gray-100 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-20">
              <a href="about-gbldc.html"
                class="block px-4 py-3 hover:bg-green-50 hover:text-green-700 rounded-t-lg transition-colors">About
                GBLDC</a>
              <a href="#"
                class="block px-4 py-3 hover:bg-green-50 hover:text-green-700 transition-colors">Mission
                & Vision</a>
              <a href="board-of-directors.html"
                class="block px-4 py-3 hover:bg-green-50 hover:text-green-700 transition-colors">Board
                of Directors</a>
              <a href="committee-officers.html"
                class="block px-4 py-3 hover:bg-green-50 hover:text-green-700 rounded-b-lg transition-colors">Committee
                Officers</a>
            </div>
          </div>

          <a href="news&events.html"
            class="px-2 xl:px-3 py-2 rounded-md hover:bg-green-50 hover:text-green-700 transition-colors duration-200 whitespace-nowrap">News
            & Events</a>
        </nav>

        <!-- Desktop CTA Button -->
        <div class="hidden lg:flex items-center">
          <div class="ml-4">
            <div class="relative group">
              <a href="#" title="User Profile"
                onclick="toggleProfileDropdown(event)"
                class="flex items-center gap-2">
                <img
                  src="{{asset('images/logocoop-removebg-preview-2.png')}}"
                  alt="User Avatar"
                  class="w-12 h-12 rounded-full object-cover shadow-sm hover:ring-2 hover:ring-green-400 transition-all duration-200 cursor-pointer">
                <i
                  class="fas fa-chevron-down text-gray-500 text-base">
                </a></i>
              <!-- Desktop Profile Dropdown Menu -->
              <div id="profile-dropdown"
                class="absolute right-0 mt-2 w-72 p-4 bg-white rounded-lg shadow-lg border z-30 hidden animate-fade-in">
                <div
                  class="flex items-center px-4 py-2 text-gray-800 font-semibold mb-2 break-all">
                  <?php echo isset($_SESSION['user_name']) ?
                  htmlspecialchars($_SESSION['user_name']) :
                  ''; ?>
                </div>
                <a href="{{route ('Loan.Dashboard')}}"
                  class="block px-4 text-gray-800 hover:bg-green-200 rounded-md p-2 transition-colors">Loan
                  Dashboard</a>
                <a href="account-settings.html"
                  class="block px-4 py-2 text-gray-800 hover:bg-green-200 rounded-md p-2 transition-colors">Settings</a>
                <a href="help.html"
                  class="block px-4 py-2 text-gray-800 hover:bg-green-200 rounded-md p-2 transition-colors">Help
                  & Support</a>
                <div class="border-t my-1">
                  <a href="index.html"
                    onclick="openLogoutModal(event)"
                    class="block px-4 py-2 hover:bg-green-200 rounded-md p-2 transition-colors">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Mobile menu button -->
        <button id="mobile-menu-btn"
          class="lg:hidden flex items-center justify-center w-10 h-10 rounded-full hover:bg-green-50 transition-colors duration-200"
          onclick="toggleMobileMenu()">
          <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor"
            class="w-6 h-6 transition-transform duration-200">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg id="close-icon" xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor"
            class="w-6 h-6 hidden transition-transform duration-200">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Mobile Navigation Menu -->
      <div id="mobile-menu"
        class="lg:hidden absolute top-full left-0 w-full bg-white border-b border-gray-100 shadow-lg transform -translate-y-full invisible transition-all duration-300 z-40">
        <nav class="px-4 sm:px-6 py-4 space-y-1">
          <!-- Mobile Home Link -->
          <a href="{{route ('Member.Landing')}}"
            class="block px-4 py-3 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors font-medium">
            Home
          </a>

          <!-- Mobile Products & Services -->
          <div class="space-y-1">
            <button onclick="toggleDropdownProductsMobile(event)"
              class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors font-medium text-left">
              <span>Product & Services</span>
              <i id="products-chevron"
                class="fas fa-chevron-down text-sm transition-transform duration-200"></i>
            </button>
            <div id="dropdown-menu-products-mobile"
              class="hidden ml-4 space-y-1">
              <a href="loan-products.html"
                class="block px-4 py-2 rounded-lg hover:bg-green-100 hover:text-green-700 transition-colors text-sm">Loans</a>
              <a href="deposit.html"
                class="block px-4 py-2 rounded-lg hover:bg-green-100 hover:text-green-700 transition-colors text-sm">Deposits</a>
              <a href="savings-page.html"
                class="block px-4 py-2 rounded-lg hover:bg-green-100 hover:text-green-700 transition-colors text-sm">Savings</a>
            </div>
          </div>

          <!-- Mobile About -->
          <div class="space-y-1">
            <button onclick="toggleDropdownMobileAbout(event)"
              class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors font-medium text-left">
              <span>About</span>
              <i id="about-chevron"
                class="fas fa-chevron-down text-sm transition-transform duration-200"></i>
            </button>
            <div id="dropdown-menu-about-mobile"
              class="hidden ml-4 space-y-1">
              <a href="about-gbldc.html"
                class="block px-4 py-2 rounded-lg hover:bg-green-100 hover:text-green-700 transition-colors text-sm">About
                GBLDC</a>
              <a href="#"
                class="block px-4 py-2 rounded-lg hover:bg-green-100 hover:text-green-700 transition-colors text-sm">Mission
                & Vision</a>
              <a href="board-of-directors.html"
                class="block px-4 py-2 rounded-lg hover:bg-green-100 hover:text-green-700 transition-colors text-sm">Board
                of Directors</a>
              <a href="committee-officers.html"
                class="block px-4 py-2 rounded-lg hover:bg-green-100 hover:text-green-700 transition-colors text-sm">Committee
                Officers</a>
            </div>
          </div>

          <!-- Mobile News & Events -->
          <a href="news&events.html"
            class="block px-4 py-3 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors font-medium">
            News & Events
          </a>
           <!-- Mobile User Profile -->
                <div class="border-t pt-4 mt-4">
                    <div class="flex items-center px-4 py-2 mb-2">
                      <img src="https://via.placeholder.com/32x32/22c55e/ffffff?text=U" 
                           alt="User Avatar"
                           class="w-8 h-8 rounded-full object-cover mr-3">
                      <span class="font-medium text-gray-800">
                        <?php echo isset($_SESSION['user_name']) ?
                        htmlspecialchars($_SESSION['user_name']) :
                        ''; ?>
                      </span>
                    </div>
                    <a href="{{route ('Loan.Dashboard')}}" class="block px-4 py-2 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors text-sm">Loan Dashboard</a>
                    <a href="account-settings.html" class="block px-4 py-2 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors text-sm">Settings</a>
                    <a href="help.html" class="block px-4 py-2 rounded-lg hover:bg-green-50 hover:text-green-700 transition-colors text-sm">Help & Support</a>
                    <a href="#" onclick="openLogoutModal(event)" class="block px-4 py-2 rounded-lg hover:bg-red-50 hover:text-red-700 transition-colors text-sm">Logout</a>
                </div>
        </nav>
      </div>
    </header>

            <!-- Progress Indicator -->
            <div class="max-w-7xl mx-auto mt-24 p-4 sm:p-6 md:p-7">
                <h2
                    class="text-center text-3xl sm:text-4xl font-semibold text-gray-800 block">Loan
                    Application</h2>
                <p class="text-center text-black mt-3">Please fill out the form
                    below to apply for a loan.</p>
            </div>
            <!-- Main Content -->
            <div id="validationModal"
                class="fixed inset-0 items-center flex justify-center hidden">
                <div
                    class="bg-white p-8 rounded-md shadow-lg max-w-md w-2/5 z-50 animate-fade-in-down">
                    <h3
                        class="text-lg font-semibold text-gray-800 mb-4">Missing
                        Required Fields</h3>
                    <p class="text-gray-600 mb-4">Please fill out the
                        following required fields before proceeding:</p>
                    <ul id="missingFieldsList"
                        class="custom-asterisk-list list-inside text-red-500 mb-4"></ul>
                    <button onclick="closeModal()"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Close</button>
                </div>
            </div>

            <!-- Form start -->
            <form action="{{route ('Loan.Submit')}}" method="POST" enctype="multipart/form-data"
                class="mt-4 space-y-6 max-w-7xl mx-auto bg-white p-10 md:p-20 shadow-lg rounded-lg mb-10">
                @csrf
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-center text-green-700 px-4 py-3 m-2 rounded relative mb-4" role="alert">
                    <strong class="font-bold"></strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-center text-red-700 px-4 py-3 m-2 rounded relative mb-4" role="alert">
                    <strong class="font-bold"></strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
                <!-- Branch -->
                <h3 class="text-2xl font-medium text-teal-900">Personal
                    Information</h3>
                <p class="text-gray-600 mb-4">Please fill out the form below
                    with your personal information.</p>
                <!-- Name Fields -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div>
        <label for="lastName" class="block text-black">Last Name<span class="text-red-500">*</span></label>
        <input id="lastName" name="last_name" type="text"
            placeholder="Last Name" value="{{ optional($AutoComplete)->last_name }}"
            class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
    </div>
    <div>
        <label for="firstName" class="block text-black">First Name<span class="text-red-500">*</span></label>
        <input id="firstName" name="first_name" type="text"
            placeholder="First Name" value="{{ optional($AutoComplete)->first_name }}"
            class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
    </div>
    <div>
        <label for="middleName" class="block text-black">Middle Name<span class="text-red-500">*</span></label>
        <input id="middleName" name="middle_name" type="text"
            placeholder="Middle Name" value="{{ optional($AutoComplete)->middle_name }}"
            class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
    </div>
</div>

<!-- Birth Details -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div>
        <label for="birthPlace" class="block text-black">Place of Birth<span class="text-red-500">*</span></label>
        <input id="birthPlace" name="place_of_birth" type="text"
            placeholder="Place of Birth" value="{{ optional($AutoComplete)->place_of_birth }}"
            class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
    </div>
    <div>
        <label for="birthDate" class="block text-black">Birth Date<span class="text-red-500">*</span></label>
        <input id="birthDate" name="birthdate" type="date" value="{{ optional($AutoComplete)->birthdate }}"
            class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400 text-black"
            required onchange="calculateAge()">
    </div>
    <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1">
            <label for="age" class="block text-black">Age<span class="text-red-500">*</span></label>
            <input id="age" name="age" type="number" value="{{ optional($AutoComplete)->age }}"
                class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400 text-black bg-gray-100"
                readonly required>
        </div>
        <div>
            <label class="block text-black">Gender <span class="text-red-500">*</span></label>
            <div class="flex gap-4 mt-2">
                <label>
                    <input type="radio" name="gender" value="Male"
                        {{ (old('gender', optional($AutoComplete)->gender ?? '') == 'Male') ? 'checked' : '' }}
                        class="mr-1 mt-0.5">
                    Male
                </label>
                <label>
                    <input type="radio" name="gender" value="Female"
                        {{ (old('gender', optional($AutoComplete)->gender ?? '') == 'Female') ? 'checked' : '' }}
                        class="mr-1 mt-0.5">
                    Female
                </label>
            </div>
        </div>
    </div>
</div>

<!-- Religion, Nationality, Status -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-400">
    <div>
        <label for="religion" class="block text-black">Religion<span class="text-red-500">*</span></label>
        <select id="religion" name="religion"
            class="mt-2 text-black border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
            <option value="{{ optional($AutoComplete)->religion }}">{{ optional($AutoComplete)->religion }}</option>
            <option value="ROMAN CATHOLIC">ROMAN CATHOLIC</option>
            <option value="PROTESTANT">PROTESTANT</option>
            <option value="CHRISTIAN">CHRISTIAN</option>
            <option value="BAPTIST">BAPTIST</option>
            <option value="SEVENTH-DAY ADVENTIST">SEVENTH-DAY ADVENTIST</option>
            <option value="IGLESIA NI CRISTO">IGLESIA NI CRISTO</option>
            <option value="ADVENTIST">ADVENTIST</option>
            <option value="BUDDHISM">BUDDHISM</option>
            <option value="JESUS IS LORD MOVEMENT">JESUS IS LORD MOVEMENT</option>
            <option value="JEHOVAH'S WITNESSES">JEHOVAH'S WITNESSES</option>
            <option value="METHODIST">METHODIST</option>
            <option value="SAKSI NI BAHO">SAKSI NI BAHO</option>
            <option value="NON-SECTARIAN">NON-SECTARIAN</option>
            <option value="OTHER">OTHER</option>
        </select>
    </div>
    <div>
        <label for="nationality" class="block text-black">Nationality<span class="text-red-500">*</span></label>
        <input id="nationality" name="nationality" type="text"
            placeholder="Nationality" value="{{ optional($AutoComplete)->nationality }}"
            class="mt-2 text-black border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
    </div>
    <div>
        <label for="civilStatus" class="block text-black">Civil Status<span class="text-red-500">*</span></label>
        <select id="civilStatus" name="civil_status"
            class="mt-2 text-black border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
            <option value="{{ optional($AutoComplete)->civil_status }}">{{ optional($AutoComplete)->civil_status }}</option>
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
            <input id="email" name="email" type="email" placeholder="Email Address" value="{{ optional($AutoComplete)->email }}"
                class="border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400"
                required>
        </div>
        <div>
            <label for="contact" class="block text-black">Contact Number<span class="text-red-500">*</span></label>
            <div class="flex items-center">
                <span class="px-2 text-black">+63</span>
                <input id="contact" name="contact_number" type="tel" pattern="[0-9]{10}" maxlength="10"
                    value="{{ optional($AutoComplete)->contact_number }}"
                    class="p-2 rounded-sm w-full border focus:outline-none focus:ring-2 focus:ring-green-400"
                    required inputmode="numeric" placeholder="9123456789">
            </div>
        </div>
    </div>
</div>

              <hr class="my-6 border-gray-300">

              <!-- Home Address -->
              <h3 class="text-2xl font-medium text-teal-900">Home Address</h3>
              <label for="street" class="block text-black">Street Address<span class="text-red-500">*</span></label>
              <input id="street" name="street_address" type="text" placeholder="No. & Street" value="{{ optional($AutoComplete)->street_address }}"
                  class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>

              <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-400">
                  <div>
                      <label for="province" class="block text-black">Province<span class="text-red-500">*</span></label>
                      <select id="province" name="province"
                          class="mt-2 border border-gray-300 text-black p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          <option value="{{ optional($AutoComplete)->province }}">{{ optional($AutoComplete)->province }}</option>
                      </select>
                  </div>
                  <div>
                      <label for="city" class="block text-black">City/Municipality<span class="text-red-500">*</span></label>
                      <select id="city" name="city_municipality"
                          class="mt-2 border border-gray-300 text-black p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          <option value="{{ optional($AutoComplete)->city }}">{{ optional($AutoComplete)->city }}</option>
                      </select>
                  </div>
                  <div>
                      <label for="barangay" class="block text-black">Barangay<span class="text-red-500">*</span></label>
                      <select id="barangay" name="barangay"
                          class="mt-2 border border-gray-300 text-black p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          <option value="{{ optional($AutoComplete)->barangay }}">{{ optional($AutoComplete)->barangay }}</option>
                      </select>
                  </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <div>
                      <label for="yearsOfStay" class="block text-black">Years of Stay<span class="text-red-500">*</span></label>
                      <input id="yearsOfStay" name="year_of_stay" type="text" value="{{ optional($AutoComplete)->year_of_stay }}"
                          class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                  </div>
                  <div>
                      <label for="houseOwnership" class="block text-black">House Ownership<span class="text-red-500">*</span></label>
                      <select id="houseOwnership" name="house_ownership"
                          class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          <option value="{{ optional($AutoComplete)->house_ownership }}">{{ optional($AutoComplete)->house_ownership }}</option>
                          <option value="Owned">Owned</option>
                          <option value="Rented">Rented</option>
                          <option value="Living with Parents">Living with Parents</option>
                          <option value="Other">Other</option>
                      </select>
                  </div>
                  <div>
                      <label for="zipCode" class="block text-black">Zip Code<span class="text-red-500">*</span></label>
                      <input id="zipCode" name="zip_code" type="text" placeholder="Zip Code" value="{{ optional($AutoComplete)->zip_code }}"
                          class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                  </div>
              </div>

              <!-- Guarantor 1 --->
              <h2 class="text-2xl font-medium text-teal-900">First Guarantor Information</h2>
              <p class="text-gray-600 mb-6">Please provide details of your first guarantor (co-maker).</p>
        
              <div>
                  <label for="guarantorName" class="block text-black font-medium">Full Name<span class="text-red-500">*</span></label>
                  <input id="guarantorName" name="g1_fullname" type="text" placeholder="Full Name" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div>
                  <label for="relationship" class="block text-black font-medium">Relationship to Borrower <span class="text-red-500">*</span></label>
                  <input id="relationship" name="g1_relationship" type="text" placeholder="e.g. Friend, Co-worker, Relative" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label for="guarantorContact" class="block text-black font-medium">Contact Number <span class="text-red-500">*</span></label>
                    <input id="guarantorContact" name="g1_contact_number" maxlength="11 type="tel" placeholder="09XXXXXXXXX" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                  </div>
                  <div>
                    <label for="guarantorAddress" class="block text-black font-medium">Address <span class="text-red-500">*</span></label>
                    <input id="guarantorAddress" name="g1_address" type="text" placeholder="Address" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                  </div>
                </div>
                <div>
                  <label for="guarantorId" class="block text-black font-medium">Upload Valid ID <span class="text-red-500">*</span></label>
                  <input id="guarantorId" name="g1_valid_id" type="file" accept="image/*" class="mt-2 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                </div>
                <!-- Guarantor 2 -->
                <h2 class="text-2xl font-medium text-teal-900">Second Guarantor Information</h2>
              <p class="text-gray-600 mb-6">Please provide details of your second guarantor (co-maker).</p>
                @csrf
                          @method('POST')
                          <div>
                  <label for="guarantorName" class="block text-black font-medium">Full Name<span class="text-red-500">*</span></label>
                  <input id="guarantorName" name="g2_fullname" type="text" placeholder="Full Name" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div>
                  <label for="relationship" class="block text-black font-medium">Relationship to Borrower <span class="text-red-500">*</span></label>
                  <input id="relationship" name="g2_relationship" type="text" placeholder="e.g. Friend, Co-worker, Relative" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label for="guarantorContact" class="block text-black font-medium">Contact Number <span class="text-red-500">*</span></label>
                    <input id="guarantorContact" name="g2_contact_number" maxlength="11 type="tel" placeholder="09XXXXXXXXX" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                  </div>
                  <div>
                    <label for="guarantorAddress" class="block text-black font-medium">Address <span class="text-red-500">*</span></label>
                    <input id="guarantorAddress" name="g2_address" type="text" placeholder="Address" class="mt-2 border border-gray-300 p-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                  </div>
                </div>
                <div>
                  <label for="guarantorId" class="block text-black font-medium">Upload Valid ID <span class="text-red-500">*</span></label>
                  <input id="guarantorId" name="g2_valid_id" type="file" accept="image/*,application/pdf" class="mt-2 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                </div>
                <div>
                <!-- Employment/Business Information -->
                <h2 class="text-2xl font-medium text-teal-900">Employment / Business Information</h2>
                      <p class="text-gray-600 mb-6">Please provide details about your source of income.</p>
                  
                      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                          <div>
                              <label for="employmentType" class="block text-black font-medium mb-1">Employment Type <span class="text-red-500">*</span></label>
                              <select id="employmentType" name="employment_type" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400 bg-white" required>
                                  <option value="">Select Employment Type</option>
                                  <option value="employed">Employed</option>
                                  <option value="self-employed">Self-Employed</option>
                                  <option value="business-owner">Business Owner</option>
                              </select>
                          </div>
                          
                          <div>
                              <label for="employerBusinessName" class="block text-black font-medium mb-1">Employer / Business Name <span class="text-red-500">*</span></label>
                              <input id="employerBusinessName" name="employer_business_name" type="text" placeholder="e.g., ABC Corporation / Dela Cruz Sari-Sari Store" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          </div>
                          
                          <div>
                              <label for="positionNature" class="block text-black font-medium mb-1">Position / Nature of Business <span class="text-red-500">*</span></label>
                              <input id="positionNature" name="position_nature_of_business" type="text" placeholder="e.g., Software Engineer / Retail Store" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          </div>
                          
                          <div class="md:col-span-2">
                              <label for="employerAddress" class="block text-black font-medium mb-1">Employer / Business Address <span class="text-red-500">*</span></label>
                              <input id="employerAddress" name="employer_business_address" type="text" placeholder="Complete address" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          </div>
                          
                          <div>
                              <label for="monthlyIncome" class="block text-black font-medium mb-1">Monthly Income <span class="text-red-500">*</span></label>
                              <div class="relative">
                                  <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">₱</span>
                                  <input id="monthlyIncome" name="monthly_income" type="number" min="0" step="0.01" placeholder="0.00" class="border border-gray-300 p-3 pl-8 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                              </div>
                              <p class="text-xs text-gray-500 mt-1">Enter amount in Philippine Peso</p>
                          </div>
                          
                          <div>
                              <label for="yearsService" class="block text-black font-medium mb-1">Years in Service / Operation <span class="text-red-500">*</span></label>
                              <input id="yearsService" name="year_in_service_operation" type="text" placeholder="e.g., 3 years" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          </div>
                          
                          <div class="md:col-span-2 lg:col-span-1">
                              <label for="proofOfIncome" class="block text-black font-medium mb-1">Proof of Income <span class="text-red-500">*</span></label>
                              <input id="proofOfIncome" name="proof_of_income" type="file" accept="image/*" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                              <p class="text-xs text-gray-500 mt-1">Upload: Payslip, COE, ITR, Business Permit, etc.</p>
                          </div>
                          
                      </div>

                      <div class="border-t border-gray-200 pt-8 mt-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Loan Details</h3>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                          <div>
                            <label for="loanType" class="block text-black font-medium mb-6">Loan Type <span class="text-red-500">*</span></label>
                            <select id="loanType" name="loan_type" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400 bg-white" required>
                              <option value="">Select Loan Type</option>
                              <option value="personal-loan">Personal Loan</option>
                              <option value="business-loan">Business Loan</option>
                              <option value="mortgage-loan">Mortgage Loan</option>
                              <option value="auto-loan">Auto Loan</option>
                            </select>
                          </div>
                          
                          <div>
                            <label for="loanAmount" class="block text-black font-medium mb-6">Loan Amount <span class="text-red-500">*</span></label>
                            <input id="loanAmount" name="loan_amount" type="number" min="0" step="0.01" placeholder="0.00 PHP" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          </div>
                          
                          <div>
                            <label for="loanTerm" class="block text-black font-medium mb-6">Loan Term <span class="text-red-500">*</span></label>
                            <input id="loanTerm" name="loan_term" type="text" placeholder="" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          </div>
                          
                          <div>
                            <label for="loanPurpose" class="block text-black font-medium mb-6">Purpose of Loan <span class="text-red-500">*</span></label>
                            <input id="loanPurpose" name="purpose_of_loan" type="text" placeholder="e.g., Home Renovation, Business Expansion" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400" required>
                          </div>
                        </div>
                      </div>

                      <!-- Additional Information Section -->
                      <div class="border-t border-gray-200 pt-8 mt-8">
                          <h3 class="text-lg font-semibold text-gray-800 mb-4">Additional Information (Optional)</h3>
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                              <div>
                                  <label for="contactPersonHR" class="block text-black font-medium mb-1">HR/Contact Person Name</label>
                                  <input id="contactPersonHR" name="hr_person_name" type="text" placeholder="Name of HR or contact person" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400">
                              </div>
                              
                              <div>
                                  <label for="contactNumberHR" class="block text-black font-medium mb-1">HR/Contact Person Number</label>
                                  <input id="contactNumberHR" name="hr_person_number" maxlength="11" type="tel" placeholder="09XXXXXXXXX" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-green-400">
                              </div>
                          </div>
                      </div>

                <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
                     <!-- <button type="button" class="bg-gray-500 px-6 py-2 rounded text-white hover:bg-gray-700">Previous</button> -->
                      <input type="text" name="member_id" value="{{ optional($AutoComplete)->member_id }}" hidden readonly class="">
                     <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Continue</button>
                </div>
            </form>
        </div>
        <script>
              function toggleMobileMenu() {
                const mobileMenu = document.getElementById('mobile-menu');
                const menuIcon = document.getElementById('menu-icon');
                const closeIcon = document.getElementById('close-icon');
                
                if (mobileMenu.classList.contains('mobile-menu-open')) {
                    // Close menu
                    mobileMenu.classList.remove('mobile-menu-open');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                } else {
                    // Open menu
                    mobileMenu.classList.add('mobile-menu-open');
                    menuIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            }

            // Mobile dropdown toggles
            function toggleDropdownProductsMobile(event) {
                event.preventDefault();
                const dropdown = document.getElementById('dropdown-menu-products-mobile');
                const chevron = document.getElementById('products-chevron');
                
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.remove('hidden');
                    chevron.classList.add('rotate-180');
                } else {
                    dropdown.classList.add('hidden');
                    chevron.classList.remove('rotate-180');
                }
            }

            function toggleDropdownMobileAbout(event) {
                event.preventDefault();
                const dropdown = document.getElementById('dropdown-menu-about-mobile');
                const chevron = document.getElementById('about-chevron');
                
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.remove('hidden');
                    chevron.classList.add('rotate-180');
                } else {
                    dropdown.classList.add('hidden');
                    chevron.classList.remove('rotate-180');
                }
            }
            // loan-application.js
function validateStep1(event) {
  event.preventDefault();
  const requiredFields = document.querySelectorAll(
    "input[required], select[required]"
  );
  let allFilled = true;
  let missingFields = [];

  requiredFields.forEach((field) => {
    if (!field.value.trim()) {
      allFilled = false;
      field.classList.add("border-red-500");
      let label =
        field.closest("div")?.querySelector("label")?.textContent ||
        field.previousElementSibling?.textContent ||
        field.closest("fieldset")?.querySelector("legend")?.textContent ||
        field.name ||
        field.id ||
        "Field";
      label = label.replace("*", "").trim();
      if (!missingFields.includes(label)) missingFields.push(label);
    } else {
      field.classList.remove("border-red-500");
    }
  });

  if (!allFilled) {
    Swal.fire({
      icon: "warning",
      iconColor: "#dc2626",
      color: "#1e2939",
      title: "Missing Required Fields",
      html: `<p>Please fill out the following required fields before proceeding:</p>
                   <ul style="text-align:left; color:#e53e3e;">
                   ${missingFields.map((f) => `<li>• ${f}</li>`).join("")}
                   </ul>`,
      confirmButtonColor: "#16a34a",
    });
  } else {
    // Proceed to the next page
    window.location.href = "applynowstep2.html";
  }
}

function closeModal() {
  // Not needed with SweetAlert2
}

function calculateAge() {
  const birthDateInput = document.getElementById("birthDate");
  const ageInput = document.getElementById("age");
  const birthDateValue = birthDateInput.value;
  if (!birthDateValue) {
    ageInput.value = "";
    return;
  }
  const today = new Date();
  const birthDate = new Date(birthDateValue);
  let age = today.getFullYear() - birthDate.getFullYear();
  const m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  ageInput.value = age >= 0 ? age : "";
}
// PSGC API base URL
const PSGC_API = "https://psgc.gitlab.io/api";

// Elements
const provinceSelect = document.getElementById("province");
const citySelect = document.getElementById("city");
const barangaySelect = document.getElementById("barangay");

// Load provinces on page load
fetch(`${PSGC_API}/provinces/`)
  .then((res) => res.json())
  .then((provinces) => {
    provinces.forEach((province) => {
      provinceSelect.innerHTML += `<option value="${province.code}">${province.name}</option>`;
    });
  });

// When province changes, load cities/municipalities
provinceSelect.addEventListener("change", function () {
  const provinceCode = this.value;
  citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
  barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
  if (!provinceCode) return;

  fetch(`${PSGC_API}/provinces/${provinceCode}/cities-municipalities/`)
    .then((res) => res.json())
    .then((cities) => {
      cities.forEach((city) => {
        citySelect.innerHTML += `<option value="${city.code}">${city.name}</option>`;
      });
    });
});

// When city/municipality changes, load barangays and set zip code
citySelect.addEventListener("change", function () {
  const cityCode = this.value;
  barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
  document.getElementById("zipCode").value = ""; // Clear zip code
  if (!cityCode) return;

  // Fetch barangays
  fetch(`${PSGC_API}/cities-municipalities/${cityCode}/barangays/`)
    .then((res) => res.json())
    .then((barangays) => {
      barangays.forEach((barangay) => {
        barangaySelect.innerHTML += `<option value="${barangay.code}">${barangay.name}</option>`;
      });
    });

  // Fetch city/municipality details for zip code
  fetch(`${PSGC_API}/cities-municipalities/${cityCode}/`)
    .then((res) => res.json())
    .then((city) => {
      // PSGC API returns postalCode (zip code)
      document.getElementById("zipCode").value = city.postalCode || "";
    });
});

// Logout Modal Functions
function openLogoutModal(event) {
    event.preventDefault();
    const modal = document.getElementById('logout-modal');
    const modalContent = document.getElementById('logout-modal-content');
    const mobileMenu = document.getElementById('mobile-menu');
    
    // Close mobile menu if it's open
    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    
    modal.classList.remove('hidden');
    
    // Animate modal content in
    modalContent.style.opacity = '0';
    modalContent.style.transform = 'scale(0.95)';
    setTimeout(() => {
        modalContent.style.transition = 'opacity 0.3s, transform 0.3s';
        modalContent.style.opacity = '1';
        modalContent.style.transform = 'scale(1)';
    }, 10);
    
    // Add a semi-transparent background overlay
    if (!document.getElementById('logout-modal-overlay')) {
        const overlay = document.createElement('div');
        overlay.id = 'logout-modal-overlay';
        overlay.style.position = 'fixed';
        overlay.style.top = 0;
        overlay.style.left = 0;
        overlay.style.width = '100vw';
        overlay.style.height = '100vh';
        overlay.style.background = 'rgba(0,0,0,0.4)';
        overlay.style.zIndex = 59;
        overlay.onclick = closeLogoutModal;
        document.body.appendChild(overlay);
    }
    
    // Prevent body scrolling
    document.body.classList.add('overflow-hidden');
}

function closeLogoutModal() {
    const modal = document.getElementById('logout-modal');
    const modalContent = document.getElementById('logout-modal-content');
    
    if (!modal || modal.classList.contains('hidden')) {
        return; // Modal is already closed
    }
    
    // Animate modal content out
    modalContent.style.transition = 'opacity 0.2s, transform 0.2s';
    modalContent.style.opacity = '0';
    modalContent.style.transform = 'scale(0.95)';
    
    setTimeout(() => {
        modal.classList.add('hidden');
        // Remove the overlay if it exists
        const overlay = document.getElementById('logout-modal-overlay');
        if (overlay) overlay.remove();
        // Allow body scrolling again
        document.body.classList.remove('overflow-hidden');
    }, 200);
}

function confirmLogout() {
    // Close the modal first
    closeLogoutModal();
    
    // Add a small delay for better UX, then redirect
    setTimeout(() => {
        // You can also make an AJAX call here to properly logout from the server
        // For now, we'll just redirect
        window.location.href = 'index.html';
    }, 300);
}

// Profile Dropdown Function
function toggleProfileDropdown(event) {
    event.preventDefault();
    const dropdown = document.getElementById('profile-dropdown');
    dropdown.classList.toggle('hidden');
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function handler(e) {
        if (!dropdown.contains(e.target) && !event.target.contains(e.target)) {
            dropdown.classList.add('hidden');
            document.removeEventListener('click', handler);
        }
    });
}

// Desktop Dropdown Functions (for existing dropdowns)
function toggleDropdown(event) {
    event.preventDefault();
    const dropdown = document.getElementById('dropdown-menu');
    dropdown.classList.toggle('hidden');
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function handler(e) {
        if (!dropdown.contains(e.target) && !event.target.contains(e.target)) {
            dropdown.classList.add('hidden');
            document.removeEventListener('click', handler);
        }
    });
}

function toggleDropdownProducts(event) {
    event.preventDefault();
    const dropdown = document.getElementById('dropdown-menu-products');
    dropdown.classList.toggle('hidden');
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function handler(e) {
        if (!dropdown.contains(e.target) && !event.target.contains(e.target)) {
            dropdown.classList.add('hidden');
            document.removeEventListener('click', handler);
        }
    });
}

// Mobile Menu Toggle Functions with Enhanced Touch Events
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileProductsToggle = document.getElementById('mobile-products-toggle');
    const mobileProductsDropdown = document.getElementById('mobile-products-dropdown');
    const mobileAboutToggle = document.getElementById('mobile-about-toggle');
    const mobileAboutDropdown = document.getElementById('mobile-about-dropdown');

    // Add touch feedback to all mobile menu items
    function addTouchFeedback() {
        const mobileMenuItems = document.querySelectorAll('#mobile-menu a, #mobile-menu button');
        
        mobileMenuItems.forEach(item => {
            // Skip if already has touch feedback
            if (item.dataset.touchFeedback) return;
            item.dataset.touchFeedback = 'true';
            
            // Add touch start event for immediate feedback
            item.addEventListener('touchstart', function(e) {
                // Different colors for different types of items
                let bgColor = '#dcfce7'; // Default green
                
                if (this.href && this.href.includes('applynow')) {
                    bgColor = '#dcfce7'; // Green for Apply Now
                } else if (this.onclick && this.onclick.toString().includes('openLogoutModal')) {
                    bgColor = '#fee2e2'; // Light red for logout
                } else if (this.closest('#mobile-products-dropdown, #mobile-about-dropdown')) {
                    bgColor = '#dbeafe'; // Light blue for dropdown items
                }
                
                this.style.backgroundColor = bgColor;
                this.style.transform = 'scale(0.98)';
                this.style.transition = 'all 0.1s ease';
            }, { passive: true });
            
            // Remove feedback on touch end
            item.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.style.backgroundColor = '';
                    this.style.transform = '';
                }, 150);
            }, { passive: true });
            
            // Handle touch cancel (when user drags away)
            item.addEventListener('touchcancel', function() {
                this.style.backgroundColor = '';
                this.style.transform = '';
            }, { passive: true });
        });
    }

    // Toggle mobile menu
    function toggleMobileMenu() {
        mobileMenu.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden'); // Prevent scrolling when menu is open
        
        // Add touch feedback after menu opens
        if (!mobileMenu.classList.contains('hidden')) {
            setTimeout(addTouchFeedback, 100);
        }
    }

    // Close mobile menu
    function closeMobileMenu() {
        mobileMenu.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Mobile menu button click with enhanced touch feedback
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', function() {
            // Add haptic feedback if available
            if (navigator.vibrate) {
                navigator.vibrate(50); // 50ms vibration
            }
            toggleMobileMenu();
        });
        
        // Add touch feedback to hamburger button
        mobileMenuButton.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.95)';
            this.style.backgroundColor = '#16a34a';
            this.style.color = 'white';
            this.style.transition = 'all 0.1s ease';
        }, { passive: true });
        
        mobileMenuButton.addEventListener('touchend', function() {
            setTimeout(() => {
                this.style.transform = '';
                this.style.backgroundColor = '';
                this.style.color = '';
            }, 100);
        }, { passive: true });
        
        mobileMenuButton.addEventListener('touchcancel', function() {
            this.style.transform = '';
            this.style.backgroundColor = '';
            this.style.color = '';
        }, { passive: true });
    }

    // Mobile menu close button click
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', function() {
            if (navigator.vibrate) {
                navigator.vibrate(30);
            }
            closeMobileMenu();
        });
        
        // Add touch feedback to close button
        mobileMenuClose.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.9)';
            this.style.color = '#dc2626';
            this.style.transition = 'all 0.1s ease';
        }, { passive: true });
        
        mobileMenuClose.addEventListener('touchend', function() {
            setTimeout(() => {
                this.style.transform = '';
                this.style.color = '';
            }, 100);
        }, { passive: true });
        
        mobileMenuClose.addEventListener('touchcancel', function() {
            this.style.transform = '';
            this.style.color = '';
        }, { passive: true });
    }

    // Close menu when clicking outside (on the backdrop)
    if (mobileMenu) {
        mobileMenu.addEventListener('click', function(e) {
            if (e.target === mobileMenu) {
                closeMobileMenu();
            }
        });
    }

    // Enhanced Mobile Products dropdown toggle
    if (mobileProductsToggle && mobileProductsDropdown) {
        mobileProductsToggle.addEventListener('click', function() {
            mobileProductsDropdown.classList.toggle('hidden');
            const chevron = this.querySelector('i');
            if (chevron) {
                chevron.classList.toggle('fa-chevron-down');
                chevron.classList.toggle('fa-chevron-up');
            }
            
            // Add haptic feedback
            if (navigator.vibrate) {
                navigator.vibrate(30);
            }
            
            // Add touch feedback to dropdown items when opened
            if (!mobileProductsDropdown.classList.contains('hidden')) {
                setTimeout(addTouchFeedback, 50);
            }
        });
    }

    // Enhanced Mobile About dropdown toggle
    if (mobileAboutToggle && mobileAboutDropdown) {
        mobileAboutToggle.addEventListener('click', function() {
            mobileAboutDropdown.classList.toggle('hidden');
            const chevron = this.querySelector('i');
            if (chevron) {
                chevron.classList.toggle('fa-chevron-down');
                chevron.classList.toggle('fa-chevron-up');
            }
            
            // Add haptic feedback
            if (navigator.vibrate) {
                navigator.vibrate(30);
            }
            
            // Add touch feedback to dropdown items when opened
            if (!mobileAboutDropdown.classList.contains('hidden')) {
                setTimeout(addTouchFeedback, 50);
            }
        });
    }

    // Close mobile menu when window is resized to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) { // lg breakpoint
            closeMobileMenu();
        }
    });

    // Enhanced keyboard support and modal handling
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Close mobile menu
            closeMobileMenu();
            
            // Close desktop dropdowns
            const dropdowns = ['dropdown-menu', 'dropdown-menu-products', 'profile-dropdown'];
            dropdowns.forEach(id => {
                const dropdown = document.getElementById(id);
                if (dropdown && !dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            });
            
            // Close logout modal
            closeLogoutModal();
        }
    });

    // Close logout modal when clicking on the backdrop
    const logoutModal = document.getElementById('logout-modal');
    if (logoutModal) {
        logoutModal.addEventListener('click', function(e) {
            if (e.target === logoutModal) {
                closeLogoutModal();
            }
        });
    }

    // Initialize touch feedback when page loads (for initial menu items)
    setTimeout(addTouchFeedback, 500);
});

        </script>
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
              Are you sure you want to logout? You will need to sign in again to
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
    </body>
</html>