<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto py-8 px-4">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="GBLDC Logo" class="w-12 h-12 mr-3">
                    <div>
                        <h1 class="text-2xl font-bold text-teal-900">GBLDC Cooperative</h1>
                        <p class="text-sm text-gray-600">Payment Receipt</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">Receipt #{{ $Record->id }}</p>
                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($Record->transaction_date)->format('M d, Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Receipt Content -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-6 text-center">Official Receipt</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Member Information</h3>
                    <p><strong>Member ID:</strong> {{ $Record->member_id }}</p>
                    <p><strong>Name:</strong> {{ $Record->last_name }}, {{ $Record->first_name }} {{ $Record->middle_name }}</p>
                    @if($Record->loan_number)
                    <p><strong>Loan Number:</strong> {{ $Record->loan_number }}</p>
                    @endif
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-2">Payment Details</h3>
                    <p><strong>Reference Number:</strong> {{ $Record->reference_number }}</p>
                    <p><strong>Payment Method:</strong> {{ $Record->payment_method }}</p>
                    <p><strong>Transaction Type:</strong> {{ $Record->transaction_type }}</p>
                    <p><strong>Status:</strong>
                        @if($Record->payment_status == 'Paid')
                            <span class="text-green-600 font-semibold">Paid</span>
                        @elseif($Record->payment_status == 'Late')
                            <span class="text-amber-600 font-semibold">Late</span>
                        @elseif($Record->payment_status == 'Early')
                            <span class="text-blue-600 font-semibold">Early</span>
                        @else
                            <span class="text-gray-600 font-semibold">{{ $Record->payment_status }}</span>
                        @endif
                    </p>
                </div>
            </div>

            <div class="border-t pt-4 mb-6">
                <div class="flex justify-between items-center text-xl">
                    <span class="font-semibold">Total Amount Paid:</span>
                    <span class="font-bold text-2xl text-green-600">₱{{ number_format($Record->payment_amount, 2) }}</span>
                </div>
            </div>

            @if($Record->remarks)
            <div class="mb-6">
                <h3 class="font-semibold text-gray-800 mb-2">Remarks</h3>
                <p class="text-gray-700 bg-gray-50 p-3 rounded">{{ $Record->remarks }}</p>
            </div>
            @endif

            <!-- Picture for Coop Copy -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Picture for Coop Copy</h3>
                <img src="data:{{ $AdminMimeType }};base64,{{ $AdminBase64 }}" alt="Coop Copy" class="w-full h-auto max-w-md mx-auto border rounded shadow">
            </div>

            <!-- Picture for Member Copy -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Picture for Member Copy</h3>
                <img src="data:{{ $MemberMimeType }};base64,{{ $MemberBase64 }}" alt="Member Copy" class="w-full h-auto max-w-md mx-auto border rounded shadow">
            </div>

            <div class="border-t pt-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                    <div>
                        <p><strong>Transaction Handler:</strong> {{ $Record->transaction_handler }}</p>
                        <p><strong>Updated By:</strong> {{ $Record->updater_name }}</p>
                    </div>
                    <div class="text-right">
                        <p><strong>Transaction Date:</strong></p>
                        <p>{{ \Carbon\Carbon::parse($Record->transaction_date)->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 flex justify-center space-x-4">
            <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                <i class="fas fa-print mr-2"></i>Print Receipt
            </button>
            <a href="{{ url()->previous() }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </a>
        </div>
    </div>

    <style>
        @media print {
            body * { visibility: hidden; }
            .max-w-2xl, .max-w-2xl * { visibility: visible; }
            .max-w-2xl { position: absolute; left: 0; top: 0; width: 100%; }
        }
    </style>
</body>
</html>
