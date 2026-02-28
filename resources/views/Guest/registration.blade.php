<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- FontAwesome for Icons -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/e588cb9d47.js" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}">
        <link href="../src/animation/animation.css" rel="stylesheet">
    <link href="./output.css" rel="stylesheet">
    <title>Apply Now Step 1 | GBLDC</title>
</head>
<body class="bg-gray-50 antialiased font-sans">
    <!-- Header Section -->
   <header class="bg-white shadow-lg lg:shadow-md fixed left-0 top-0 z-50 w-full">
        <div class="container-lg mx-auto flex justify-between items-center p-4">
            <!-- Logo and Title -->
            <div class="flex items-center space-x-2 sm:space-x-4 overflow-hidden flex-1 min-w-0">
                <a href="landingpage.html" class="flex-shrink-0">
                    <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" 
                         alt="GBLDC Logo" 
                         class="w-12 h-12 sm:w-16 sm:h-14 lg:w-18 lg:h-16 bg-auto">
                </a>
                <h1 class="text-xs sm:text-base md:text-lg lg:text-xl font-medium animate-fade-in-right truncate">
                    Greater Bulacan Livelihood Development Cooperative
                </h1>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex space-x-4 xl:space-x-4 text-black font-normal tracking-normal mr-8 xl:mr-36">
                <a href="landingpage.html" class="hover:text-green-600 transition-colors duration-300 whitespace-nowrap">
                    HOME
                </a>
                
                <!-- Products & Services Dropdown -->
                <div class="relative" id="dropdown-trigger">
                    <a href="#" 
                       class="hover:text-green-600 flex items-center transition-colors duration-300 whitespace-nowrap"
                       onclick="toggleDropdownProducts(event)">
                        PRODUCT & SERVICES
                        <span class="ml-1"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu absolute left-0 hidden bg-slate-50 p-3 rounded-lg shadow-xl mt-2 w-64 transition-all duration-100 ease-in-out animate-fade-in animate_faster"
                         id="dropdown-menu-products">
                        <a href="loan-products.html" class="block px-4 py-2 hover:bg-green-200 rounded-md transition-colors duration-200">
                            Loans
                        </a>
                        <a href="deposit.html" class="block px-4 py-2 hover:bg-green-200 rounded-md transition-colors duration-200">
                            Deposits
                        </a>
                        <a href="insurance.html" class="block px-4 py-2 hover:bg-green-200 rounded-md transition-colors duration-200">
                            Insurance
                        </a>
                        <a href="social-services.html" class="block px-4 py-2 hover:bg-green-200 rounded-md transition-colors duration-200">
                            Social Services
                        </a>
                    </div>
                </div>
                
                <!-- About Dropdown -->
                <div class="relative" id="dropdown-trigger-about">
                    <a href="#" 
                       class="hover:text-green-600 flex items-center transition-colors duration-300 whitespace-nowrap"
                       onclick="toggleDropdown(event)">
                        ABOUT
                        <span class="ml-1"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu absolute left-0 hidden bg-slate-50 p-3 rounded-lg shadow-xl mt-2 w-64 transition-all duration-100 ease-in-out animate-fade-in animate_faster"
                         id="dropdown-menu">
                        <a href="about-gbldc.html" class="block px-4 py-2 hover:bg-green-200 rounded-md transition-colors duration-200">
                            About GBLDC
                        </a>
                        <a href="#" class="block px-4 py-2 hover:bg-green-200 rounded-md transition-colors duration-200">
                            Mission & Vision
                        </a>
                        <a href="board-of-directors.html" class="block px-4 py-2 hover:bg-green-200 rounded-md transition-colors duration-200">
                            Board of Directors
                        </a>
                        <a href="committee-officers.html" class="block px-4 py-2 hover:bg-green-200 rounded-md transition-colors duration-200">
                            Committee Officers
                        </a>
                    </div>
                </div>
                
                <a href="news&events.html" class="hover:text-green-600 transition-colors duration-300 whitespace-nowrap">
                    NEWS & EVENTS
                </a>
            </nav>
            
            <!-- Desktop Buttons -->
            <div class="hidden lg:flex items-center gap-3 xl:gap-4">
                <a href="{{route ('Member.Login')}}" class="bg-green-500 text-white px-4 xl:px-7 py-2 hover:bg-green-600 rounded-md font-normal whitespace-nowrap text-sm xl:text-base">
                    Login
                </a>
                <a href="applynow.html" class="border border-green-600 text-black px-4 xl:px-6 py-2 rounded-md font-normal hover:bg-green-50 whitespace-nowrap text-sm xl:text-base">
                    Apply Now
                </a>
            </div>
            
            <!-- Tablet Buttons (hidden on mobile and desktop) -->
            <div class="hidden md:flex lg:hidden items-center gap-2">
                <a href="index.html" class="bg-green-500 text-white px-3 py-2 hover:bg-green-600 rounded-md font-normal text-sm">
                    Login
                </a>
                <a href="applynow.html" class="border border-green-600 text-black px-3 py-2 rounded-md font-normal hover:bg-green-50 text-sm">
                    Apply
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-black focus:outline-none animate-fade-in ml-2 flex-shrink-0"
                    onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-xl sm:text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Navigation -->
        <nav class="lg:hidden bg-white shadow-lg hidden" id="mobile-menu">
            <div class="px-4 py-2 space-y-1">
                <a href="landingpage.html" class="block px-4 py-3 hover:bg-green-200 transition-colors duration-200 rounded-md">
                    HOME
                </a>
                
                <!-- Mobile Products & Services Dropdown -->
                <div class="relative">
                    <a href="#" 
                       class="flex px-4 py-3 hover:bg-green-200 items-center justify-between transition-colors duration-200 rounded-md"
                       onclick="toggleDropdownProductsMobile(event)">
                        <span>PRODUCT & SERVICES</span>
                        <i class="fas fa-chevron-down transition-transform duration-200" id="products-arrow"></i>
                    </a>
                    <div class="hidden bg-slate-50 rounded-md shadow-xl mt-1 overflow-hidden" id="dropdown-menu-products-mobile">
                        <a href="loan-products.html" class="block px-8 py-2 hover:bg-green-200 transition-colors duration-200">
                            Loans
                        </a>
                        <a href="deposit.html" class="block px-8 py-2 hover:bg-green-200 transition-colors duration-200">
                            Deposits
                        </a>
                        <a href="insurance.html" class="block px-8 py-2 hover:bg-green-200 transition-colors duration-200">
                            Insurance
                        </a>
                        <a href="social-services.html" class="block px-8 py-2 hover:bg-green-200 transition-colors duration-200">
                            Social Services
                        </a>
                    </div>
                </div>
                
                <!-- Mobile About Dropdown -->
                <div class="relative">
                    <a href="#" 
                       class="flex px-4 py-3 hover:bg-green-200 items-center justify-between transition-colors duration-200 rounded-md"
                       onclick="toggleDropdownMobileAbout(event)">
                        <span>ABOUT</span>
                        <i class="fas fa-chevron-down transition-transform duration-200" id="about-arrow"></i>
                    </a>
                    <div class="hidden bg-slate-50 rounded-md shadow-xl mt-1 overflow-hidden" id="dropdown-menu-about-mobile">
                        <a href="about-gbldc.html" class="block px-8 py-2 hover:bg-green-200 transition-colors duration-200">
                            About GBLDC
                        </a>
                        <a href="#" class="block px-8 py-2 hover:bg-green-200 transition-colors duration-200">
                            Mission & Vision
                        </a>
                        <a href="board-of-directors.html" class="block px-8 py-2 hover:bg-green-200 transition-colors duration-200">
                            Board of Directors
                        </a>
                        <a href="committee-officers.html" class="block px-8 py-2 hover:bg-green-200 transition-colors duration-200">
                            Committee Officers
                        </a>
                    </div>
                </div>
                
                <a href="news&events.html" class="block px-4 py-3 hover:bg-green-200 transition-colors duration-200 rounded-md">
                    NEWS & EVENTS
                </a>
                
                <!-- Mobile Buttons -->
                <div class="flex flex-col items-stretch mt-4 space-y-2 px-4 pb-4">
                    <a href="index.html" class="bg-green-600 text-white px-4 py-3 rounded-lg font-normal hover:bg-green-800 text-center transition-colors duration-200">
                        Login
                    </a>
                    <a href="applynow.html" class="border border-green-600 text-black px-4 py-3 rounded-lg font-normal hover:bg-green-50 text-center transition-colors duration-200">
                        Apply Now
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Main Content -->
    <div class="max-w-4xl mx-auto mt-24 p-7">
        <h2 class="text-center text-4xl font-semibold text-gray-800 block">Online Application</h2>
        <p class="text-center text-black mt-3">Let’s talks and learn your finances better</p>
       
    </div>

    <!-- Modal -->
    <div id="validationModal" class="fixed inset-0 items-center flex justify-center hidden">
        <div class="bg-white p-8 rounded-md shadow-lg max-w-md w-2/5 z-50 animate-fade-in-down">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Missing Required Fields</h3>
            <p class="text-gray-600 mb-4">Please fill out the following required fields before proceeding:</p>
            <ul id="missingFieldsList" class="custom-asterisk-list list-inside text-red-500 mb-4"></ul>
            <button onclick="closeModal()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Close</button>
        </div>
    </div>
    
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 w-2 px-4 py-3 m-2 rounded relative mb-4 w-full" role="alert">
                    <strong class="font-bold"></strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

<form action="{{route('registration.Processing')}}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-6 max-w-7xl mx-auto bg-white p-10 md:p-20 shadow-lg rounded-lg mb-10">
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
                    <option value="Bagong Nayon">Bagong Nayon</option>
                    <option value="Barangca">Barangca</option>
                    <option value="Calantipay">Calantipay</option>
                    <option value="Catulinan">Catulinan</option>
                    <option value="Concepcion">Concepcion</option>
                    <option value="Hinukay">Hinukay</option>
                    <option value="Makinabang">Makinabang</option>
                    <option value="Matangtubig">Matangtubig</option>
                    <option value="Pagala">Pagala</option>
                    <option value="Paitan">Paitan</option>
                    <option value="Piel">Piel</option>
                    <option value="Pinagbarilan">Pinagbarilan</option>
                    <option value="Poblacion">Poblacion</option>
                    <option value="Sabang">Sabang</option>
                    <option value="San Jose">San Jose</option>
                    <option value="San Roque">San Roque</option>
                    <option value="Santa Barbara">Santa Barbara</option>
                    <option value="Santo Cristo">Santo Cristo</option>
                    <option value="Santo Niño">Santo Niño</option>
                    <option value="Subic">Subic</option>
                    <option value="Sulivan">Sulivan</option>
                    <option value="Tangos">Tangos</option>
                    <option value="Tarcan">Tarcan</option>
                    <option value="Tiaong">Tiaong</option>
                    <option value="Tibag">Tibag</option>
                    <option value="Tilapayong">Tilapayong</option>
                    <option value="Virgen delas Flores">Virgen delas Flores</option>
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
        
        <!-- Submit Button -->
        <div class="flex justify-end mt-6 font-light">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Submit</button>
        </div>
    </form>
    </div>
    <script src="../src/javascript/dropdown.js"></script>
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