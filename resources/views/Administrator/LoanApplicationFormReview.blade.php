<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Loan Application Review | GBLDC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
   <style>
        /* Custom green theme styles */
        .section-header {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: white;
            padding: 14px 18px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 0;
            font-size: 1.1rem;
        }
        
        .info-card {
            border-left: 4px solid #16a34a;
            background-color: #f0fdf4;
            transition: all 0.2s ease;
        }
        
        .info-card:hover {
            background-color: #dcfce7;
            transform: translateY(-1px);
        }
        
        .readonly-field {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            color: #6b7280;
        }
        
        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        
        .btn-primary {
            background-color: #16a34a;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary:hover {
            background-color: #15803d;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(22, 163, 74, 0.2);
        }
        
        .btn-secondary {
            background-color: #4b5563;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-secondary:hover {
            background-color: #374151;
            transform: translateY(-2px);
        }
        
        .btn-accent {
            background-color: #7c3aed;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-accent:hover {
            background-color: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(124, 58, 237, 0.2);
        }
        
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
            
            .action-buttons a, .action-buttons button {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
        }
        
        /* Image preview styling */
        .id-preview {
            max-width: 100%;
            height: auto;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 8px;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        /* Status indicators */
        .status-pending {
            background-color: #fef3c7;
            color: #d97706;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .status-approved {
            background-color: #dcfce7;
            color: #16a34a;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        /* Form styling */
        .form-input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
        }
        
        .form-select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.875rem;
            background-color: white;
            transition: all 0.2s ease;
        }
        
        .form-select:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
        }
        
    
        /* Animation for page load */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        
        /* Header styling */
        .header-gradient {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen">
    <!-- Header Section -->
    <header class="bg-white shadow-md fixed left-0 top-0 z-50 w-full">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3 relative">
            <div class="flex items-center space-x-4">
                <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" 
                     alt="GBLDC Logo" class="w-12 h-12 object-cover" />
                <div>
                    <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Loan Management System</h1>
                </div>
            </div>
            <div class="relative">
                <button id="user-menu-button" class="flex items-center gap-3 focus:outline-none bg-teal-50 rounded-full p-1">
                    <span class="hidden md:inline text-gray-700 font-medium">Admin</span>
                    <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" 
                         alt="Admin Avatar" class="w-10 h-10 rounded-full border-2 border-green-600 object-cover" />
                    <i class="fas fa-chevron-down text-gray-600 text-sm mr-2"></i>
                </button>
                <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 py-2 hidden z-50">
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

     <main class="max-w-6xl mx-auto mt-28 p-4 md:p-6 fade-in">
        <!-- Page Header -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6 border border-green-100">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-green-900">Loan Application Review</h1>
                    <p class="text-gray-600 mt-1">Review application details before approval</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="text-sm text-gray-500">Application ID: </span>
                        <span class="text-sm font-medium text-green-700">{{$Review->id}}</span>
                    </div>
                </div>
                <div class="status-pending">
                    <i class="fas fa-clock"></i>Pending Review
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons mb-6">
            <button onclick="openHistoryModal()" class="btn-primary">
                <i class="fas fa-history"></i> Check Previous Record
            </button>
            <a href="{{route ('LoanApp.list')}}" 
               class="btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
            <button class="btn-accent">
                <i class="fas fa-robot"></i> Generate AI Analysis
            </button>
        </div>

        <!-- Application Form -->
        <form action="{{route ('Loan.Approval')}}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg overflow-hidden fade-in">
            @csrf
            <input type="hidden" name="id" value="{{$Review->id}}">
            <input type="hidden" name="last_name" value="{{$Review->last_name}}">
            <input type="hidden" name="first_name" value="{{$Review->first_name}}">
            <input type="hidden" name="middle_name" value="{{$Review->middle_name}}">
            
            <!-- Loan Terms Section -->
            <div class="mb-6 border border-gray-200 rounded-lg">
                <h2 class="section-header">
                    <i class="fas fa-file-contract mr-2"></i>Loan Terms & Approval
                </h2>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Loan Number <span class="text-red-500">*</span></label>
                        <input type="text" name="loan_number" required 
                               class="form-input" 
                               placeholder="Assign unique loan number">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Loan Term</label>
                        <input type="text" name="loan_term" value="{{ $Review->loan_term }}" 
                               class="form-input readonly-field">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Loan Amount Granted <span class="text-red-500">*</span></label>
                        <input type="number" name="loan_amount" required 
                               class="form-input" 
                               placeholder="Enter granted amount">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Due Amount <span class="text-red-500">*</span></label>
                        <input type="number" name="due_amount" required 
                               class="form-input" 
                               placeholder="Enter due amount">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Frequency <span class="text-red-500">*</span></label>
                        <select name="frequency_of_payment" required 
                                class="form-select">
                            <option value="" disabled selected>Select payment frequency</option>
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Yearly">Yearly</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Start Date <span class="text-red-500">*</span></label>
                        <input type="date" name="payment_start_date" required
                               class="form-input">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Approved By <span class="text-red-500">*</span></label>
                        <input type="text" name="approved_by" required
                               class="form-input"
                               placeholder="Enter approver name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Encoded By <span class="text-red-500">*</span></label>
                        <input type="text" name="encoded_by" required 
                               class="form-input" 
                               placeholder="Enter encoder name">
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-info-circle mr-1"></i> All fields marked with <span class="text-red-500">*</span> are required
                    </div>
                    <button type="submit" class="btn-primary text-lg py-3 px-8">
                        <i class="fas fa-check-circle"></i> Approve Loan Application
                    </button>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="mb-6 border border-gray-200 rounded-lg">
                <h2 class="section-header">
                    <i class="fas fa-user mr-2"></i>Personal Information
                </h2>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <div class="text-gray-900 font-medium">{{$Review->last_name}}, {{$Review->first_name}} {{$Review->middle_name}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Birth Date</label>
                        <div class="text-gray-900">{{$Review->birthdate}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Place of Birth</label>
                        <div class="text-gray-900">{{$Review->place_of_birth}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                        <div class="text-gray-900">{{$Review->age}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <div class="text-gray-900">{{$Review->gender}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Religion</label>
                        <div class="text-gray-900">{{$Review->religion}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nationality</label>
                        <div class="text-gray-900">{{$Review->nationality}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Civil Status</label>
                        <div class="text-gray-900">{{$Review->civil_status}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="text-gray-900">{{$Review->email}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                        <div class="text-gray-900">{{$Review->contact_number}}</div>
                    </div>
                </div>
            </div>

            <!-- Home Address -->
            <div class="mb-6 border border-gray-200 rounded-lg">
                <h2 class="section-header">
                    <i class="fas fa-home mr-2"></i>Home Address
                </h2>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Street Address</label>
                        <div class="text-gray-900">{{$Review->street_address}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Province</label>
                        <div class="text-gray-900">{{$Review->province}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">City/Municipality</label>
                        <div class="text-gray-900">{{$Review->city_municipality}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Barangay</label>
                        <div class="text-gray-900">{{$Review->barangay}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Years of Stay</label>
                        <div class="text-gray-900">{{$Review->year_of_stay}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">House Ownership</label>
                        <div class="text-gray-900">{{$Review->house_ownership}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Zip Code</label>
                        <div class="text-gray-900">{{$Review->zip_code}}</div>
                    </div>
                </div>
            </div>

            <!-- Guarantors Section -->
            <div class="mb-6 border border-gray-200 rounded-lg">
                <h2 class="section-header">
                    <i class="fas fa-user-friends mr-2"></i>Guarantor Information
                </h2>
                <div class="p-6">
                    <!-- First Guarantor -->
                    <div class="mb-6 p-4 border border-gray-200 rounded-lg">
                        <h3 class="font-semibold text-green-800 mb-3 text-lg flex items-center">
                            <i class="fas fa-user-check mr-2"></i>First Guarantor
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="info-card p-3 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <div class="text-gray-900">{{$Review->g1_fullname}}</div>
                            </div>
                            <div class="info-card p-3 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Relationship</label>
                                <div class="text-gray-900">{{$Review->g1_relationship}}</div>
                            </div>
                            <div class="info-card p-3 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                                <div class="text-gray-900">{{$Review->g1_contact_number}}</div>
                            </div>
                            <div class="info-card p-3 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                <div class="text-gray-900">{{$Review->g1_address}}</div>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Valid ID</label>
                                <img src="data:{{ $g1MimeType }};base64,{{ $g1Base64 }}" 
                                     alt="First Guarantor Valid ID" class="id-preview max-w-md">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Second Guarantor -->
                    <div class="p-4 border border-gray-200 rounded-lg">
                        <h3 class="font-semibold text-green-800 mb-3 text-lg flex items-center">
                            <i class="fas fa-user-check mr-2"></i>Second Guarantor
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="info-card p-3 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <div class="text-gray-900">{{$Review->g2_fullname}}</div>
                            </div>
                            <div class="info-card p-3 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Relationship</label>
                                <div class="text-gray-900">{{$Review->g2_relationship}}</div>
                            </div>
                            <div class="info-card p-3 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                                <div class="text-gray-900">{{$Review->g2_contact_number}}</div>
                            </div>
                            <div class="info-card p-3 rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                <div class="text-gray-900">{{$Review->g2_address}}</div>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Valid ID</label>
                                <img src="data:{{ $g2MimeType }};base64,{{ $g2Base64 }}" 
                                     alt="Second Guarantor Valid ID" class="id-preview max-w-md">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employment Information -->
            <div class="mb-6 border border-gray-200 rounded-lg">
                <h2 class="section-header">
                    <i class="fas fa-briefcase mr-2"></i>Employment / Business Information
                </h2>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Employment Type</label>
                        <div class="text-gray-900">{{$Review->employment_type}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Employer / Business Name</label>
                        <div class="text-gray-900">{{$Review->employer_business_name}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Position / Nature of Business</label>
                        <div class="text-gray-900">{{$Review->position_nature_of_business}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Employer / Business Address</label>
                        <div class="text-gray-900">{{$Review->employer_business_address}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Monthly Income</label>
                        <div class="text-gray-900">{{$Review->monthly_income}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Years in Service / Operation</label>
                        <div class="text-gray-900">{{$Review->year_in_service_operation}}</div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Proof of Income</label>
                        <img src="data:{{ $proofMimeType }};base64,{{ $proofBase64 }}" 
                             alt="Proof of Income" class="id-preview max-w-md">
                    </div>
                </div>
            </div>

            <!-- Loan Details -->
            <div class="mb-6 border border-gray-200 rounded-lg">
                <h2 class="section-header">
                    <i class="fas fa-file-invoice-dollar mr-2"></i>Loan Details
                </h2>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Loan Type</label>
                        <div class="text-gray-900">{{$Review->loan_type}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Loan Amount Requested</label>
                        <div class="text-gray-900 font-semibold">{{$Review->loan_amount}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Purpose of Loan</label>
                        <div class="text-gray-900">{{$Review->purpose_of_loan}}</div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="border border-gray-200 rounded-lg">
                <h2 class="section-header">
                    <i class="fas fa-info-circle mr-2"></i>Additional Information
                </h2>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">HR / Contact Person Name</label>
                        <div class="text-gray-900">{{$Review->hr_person_name}}</div>
                    </div>
                    <div class="info-card p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-1">HR / Contact Person Number</label>
                        <div class="text-gray-900">{{$Review->hr_person_number}}</div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <footer class="max-w-7xl mx-auto p-6 text-center text-gray-500 text-sm border-t border-gray-200 mt-8">
        &copy; {{ date('Y') }} GBLDC. All rights reserved.
    </footer>

    <script>
        // User menu toggle functionality
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

        // Form validation for required fields
        document.querySelector('form').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('input[required], select[required]');
            let valid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    valid = false;
                    field.classList.add('border-red-500');
                } else {
                    field.classList.remove('border-red-500');
                }
            });

            if (!valid) {
                e.preventDefault();
                alert('Please fill in all required fields marked with *');
            }
        });

        // History Modal Functions
        function openHistoryModal() {
            document.getElementById('historyModal').classList.remove('hidden');
        }

        function closeHistoryModal() {
            document.getElementById('historyModal').classList.add('hidden');
        }

        function viewSharedCapitalHistory() {
            window.location.href = '{{ route("Check.Last.Record", ["member_id" => $Review->member_id, "type" => "shared_capital"]) }}';
        }

        function viewLoanHistory() {
            window.location.href = '{{ route("Check.Last.Record", ["member_id" => $Review->member_id, "type" => "loan"]) }}';
        }
    </script>

    <!-- History Modal -->
    <div id="historyModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Select History Type</h3>
                    <button onclick="closeHistoryModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="space-y-3">
                    <button onclick="viewSharedCapitalHistory()" class="w-full btn-primary text-left">
                        <i class="fas fa-coins mr-2"></i> Shared Capital History
                    </button>
                    <button onclick="viewLoanHistory()" class="w-full btn-secondary text-left">
                        <i class="fas fa-money-bill-wave mr-2"></i> Loan History
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
