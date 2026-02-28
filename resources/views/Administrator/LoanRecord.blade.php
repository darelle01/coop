<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Loans | GBLDC Admin</title>
    <link rel="stylesheet" href="output.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <!-- DataTables Core & Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen">
    <!-- Header Section -->
    <header class="bg-white shadow-md fixed left-0 top-0 z-50 w-full">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3 relative">
            <div class="flex items-center space-x-4">
                <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="GBLDC Logo" class="w-12 h-12 object-cover" />
                <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Loans</h1>
            </div>
            <div class="relative">
                <button id="user-menu-button" class="flex items-center gap-3 focus:outline-none">
                    <span class="hidden md:inline text-gray-700 font-medium">Admin</span>
                    <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="Admin Avatar" class="w-10 h-10 rounded-full border-2 border-green-600 object-cover" />
                    <i class="fas fa-chevron-down text-gray-600 text-sm"></i>
                </button>
                <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 py-2 hidden transition-all duration-200 ease-in-out">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">Profile</a>
                    <a href="{{route('Admin.manage')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">Manage User</a>
                    <a href="admin-settings.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition">Settings</a>
                    <div class="border-t my-1 border-gray-200"></div>
                    <a href="{{ route('Admin.Logout') }}"
              class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition">Logout</a>                </div>
            </div>
        </div>
    </header>

    <main class="pt-28 pb-12 px-4 max-w-7xl mx-auto">
        <!-- Title -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-green-800">Loans</h2>
            <p class="text-gray-700">View all members loans.</p>
            <form action="{{route('Admin.dashboard')}}" method="GET" class="inline">
                <button class="inline-flex items-center mt-1 px-3 py-1.5 rounded bg-green-100 text-green-800 hover:bg-green-200 transition-colors focus:outline-none focus:ring-2 focus:ring-green-400 shadow-sm">
                    <i class="fa fa-arrow-left mr-2"></i> Back
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold text-green-800 mb-6 flex items-center gap-2">
                <i class="fas fa-list text-green-600"></i>
                Loan List
            </h3>
            <div class="overflow-x-auto">
                <table id="loanTable" class="display responsive nowrap w-full text-sm border border-green-100 rounded-lg">
                    <thead>
                        <tr class="bg-green-100 text-green-900">
                            <th class="px-4 py-3 text-left font-semibold">Member ID</th>
                            <th class="px-4 py-3 text-left font-semibold">Name</th>
                            <th class="px-4 py-3 text-left font-semibold">Contact</th>
                            <th class="px-4 py-3 text-left font-semibold">Loan #</th>
                            <th class="px-4 py-3 text-left font-semibold">Loan Amount</th>
                            <th class="px-4 py-3 text-left font-semibold">Loan Balance</th>
                            <th class="px-4 py-3 text-left font-semibold">Status</th>
                            <th class="px-4 py-3 text-left font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 border-b border-gray-100">{{ $loan->member_id }}</td>
                            <td class="px-4 py-3 border-b border-gray-100">{{ $loan->last_name }}, {{ $loan->first_name }} {{ $loan->middle_name }}</td>
                            <td class="px-4 py-3 border-b border-gray-100">{{ $loan->contact_number }}</td>
                            <td class="px-4 py-3 border-b border-gray-100">{{ $loan->loan_number }}</td>
                            <td class="px-4 py-3 border-b border-gray-100 font-semibold text-green-700">₱{{ number_format($loan->loan_amount, 2) }}</td>
                            <td class="px-4 py-3 border-b border-gray-100 font-semibold text-red-600">₱{{ number_format($loan->loan_balance, 2) }}</td>
                            <td class="px-4 py-3 border-b border-gray-100">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    @if($loan->loan_status == 'Active') bg-green-100 text-green-800
                                    @elseif($loan->loan_status == 'Pending') bg-yellow-100 text-yellow-800
                                    @elseif($loan->loan_status == 'Completed') bg-blue-100 text-blue-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ $loan->loan_status }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border-b border-gray-100">
                                <div class="flex gap-2">
                                    <a href="{{ route('View.Member.Loan', $loan->loan_number) }}"
                                       class="inline-flex items-center px-3 py-1.5 rounded-md bg-green-50 text-green-700 border border-green-200 hover:bg-green-100 hover:text-green-900 focus:outline-none focus:ring-2 focus:ring-green-400 transition-all shadow-sm text-sm">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </a>
                                    <a href="{{ route('Loan.Payment.History', $loan->loan_number) }}"
                                       class="inline-flex items-center px-3 py-1.5 rounded-md bg-blue-50 text-blue-700 border border-blue-200 hover:bg-blue-100 hover:text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all shadow-sm text-sm">
                                        <i class="fas fa-history mr-1"></i> History
                                    </a>
                                    @if($loan->loan_status != 'Completed' && $loan->loan_status != 'Fully Paid')
                                    <form action="{{ route('Mark.Loan.Finished', $loan->loan_number) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 rounded-md bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 hover:text-red-900 focus:outline-none focus:ring-2 focus:ring-red-400 transition-all shadow-sm text-sm"
                                                onclick="return confirm('Are you sure you want to mark this loan as finished?')">
                                            <i class="fas fa-check mr-1"></i> Loan Finished
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        // User menu toggle
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function () {
            const table = $('#loanTable').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "🔍 Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ loans",
                    infoEmpty: "No loans found",
                    zeroRecords: "No matching loans found",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                },
                columnDefs: [
                    { orderable: false, targets: -1 } // Disable sorting on actions column
                ]
            });
        });
    </script>
</body>
</html>
