<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Verification - Member Portal</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .input-error {
      border-color: #ef4444 !important;
      background-color: #fef2f2 !important;
    }
    .success-animation {
      animation: pulse 2s infinite;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300 p-5 font-sans">
  <div class="bg-white rounded-2xl shadow-2xl max-w-6xl w-full min-h-[600px] grid md:grid-cols-[1fr_1.2fr] overflow-hidden">
    <!-- Left Panel -->
    <div class="p-10 flex flex-col justify-center bg-white">
      <!-- Success/Error Messages -->
      @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
      @endif
      
      @if(session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
      </div>
      @endif

      <div class="text-center mb-10">
        <div class="w-20 h-20 mx-auto mb-5 rounded-full bg-gradient-to-tr from-green-500 to-green-600 flex items-center justify-center relative overflow-hidden">
          <i class="fas fa-check text-white text-3xl"></i>
        </div>
        <h1 class="text-green-500 text-2xl font-semibold">OTP Verification</h1>
        <p class="text-gray-500 text-sm mt-2">Enter the verification code sent to your email address</p>
      </div>

      <div class="bg-gray-50 rounded-xl p-5 mb-6 border-l-4 border-green-500">
        <div class="text-xs text-gray-500 uppercase mb-1 font-medium tracking-wide">Verification code sent to:</div>
        <div class="text-gray-700 font-semibold">{{ $email ?? 'your email' }}</div>
      </div>

      <form action="{{ route('Member.OTP.Confirm') }}" method="POST" id="otpForm">
        @csrf
        <div class="mb-6">
          <label class="block text-gray-700 font-medium mb-3">Enter Verification Code</label>
          <div class="flex justify-center mb-4">
            <input 
              type="text" 
              name="OTP" 
              id="otpInput"
              maxlength="6" 
              placeholder="Enter 6-digit code"
              autocomplete="off"
              class="otp-input w-full max-w-xs h-14 border-2 border-gray-200 rounded-xl text-center text-xl font-semibold tracking-widest text-gray-700 placeholder-gray-400 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 transition"
            >
          </div>
          @error('OTP')
          <p class="text-red-500 text-xs mt-1 text-center">{{ $message }}</p>
          @enderror
          <p id="errorMessage" class="hidden text-center text-red-500 text-xs mt-1">Please enter a valid 6-character code</p>
        </div>

        <div class="text-center text-gray-500 text-sm mb-6">
          Code expires in: <span id="timer" class="text-green-500 font-semibold">05:00</span>
        </div>

        <div class="flex flex-col gap-4">
          <button type="submit" id="verifyBtn" class="bg-gradient-to-tr from-green-500 to-green-600 text-white py-4 rounded-xl text-sm font-semibold uppercase tracking-wide flex items-center justify-center gap-2 shadow-md hover:shadow-xl hover:-translate-y-0.5 transition">
            <i class="fas fa-shield-check"></i> Verify Code
          </button>
        </div>
      </form>

      <!-- Resend OTP Form -->
      <form action="{{ route('Member.OTP.Resend') }}" method="POST" class="mt-5">
        @csrf
        <button type="submit" id="resendBtn" class="w-full border-2 border-gray-200 text-gray-500 py-3 rounded-xl text-sm font-medium flex items-center justify-center gap-2 hover:border-green-500 hover:text-green-500 hover:bg-green-50 transition">
          <i class="fas fa-redo-alt"></i> Resend Code
        </button>
      </form>

      <p class="text-center text-gray-400 text-xs mt-8">©2025 Greater Bulacan Livelihood Development Cooperative</p>
    </div>

    <!-- Right Panel -->
    <div class="relative bg-gradient-to-br from-green-500 to-green-600 hidden md:flex items-center justify-center overflow-hidden">
      <div class="absolute inset-0 text-white/20 text-2xl animate-pulse">
        <i class="fas fa-shield-alt absolute top-1/4 left-1/5"></i>
        <i class="fas fa-lock absolute top-2/3 left-1/6"></i>
        <i class="fas fa-mobile-alt absolute bottom-1/5 right-1/4"></i>
        <i class="fas fa-envelope absolute top-1/3 right-1/5"></i>
      </div>

      <div class="relative z-10 text-center max-w-sm">
        <div class="bg-gray-800 rounded-3xl p-2 w-48 h-80 mx-auto mb-6 rotate-[-5deg] shadow-2xl">
          <div class="bg-gray-100 rounded-2xl h-full p-5 flex flex-col items-center justify-center">
            <div class="bg-white rounded-lg p-4 mb-5 shadow-md w-full">
              <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-3 text-white">
                <i class="fas fa-shield-check"></i>
              </div>
              <div class="flex gap-1 justify-center mb-3">
                <div class="w-6 h-7 bg-green-500 text-white flex items-center justify-center rounded text-xs font-bold">A</div>
                <div class="w-6 h-7 bg-green-500 text-white flex items-center justify-center rounded text-xs font-bold">B</div>
                <div class="w-6 h-7 bg-green-500 text-white flex items-center justify-center rounded text-xs font-bold">1</div>
                <div class="w-6 h-7 bg-green-500 text-white flex items-center justify-center rounded text-xs font-bold">2</div>
                <div class="w-6 h-7 bg-green-500 text-white flex items-center justify-center rounded text-xs font-bold">3</div>
                <div class="w-6 h-7 bg-green-500 text-white flex items-center justify-center rounded text-xs font-bold">C</div>
              </div>
              <button class="bg-green-500 text-white px-3 py-1 rounded text-[10px] font-semibold">VERIFY</button>
            </div>
          </div>
        </div>

        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4eb61c2d-c26e-4574-90e1-6757643cc9de.png" alt="Professional woman with smartphone" class="rounded-lg opacity-90 mx-auto">
      </div>
    </div>
  </div>

  <!-- Timer Script Only -->
  <script>
    const timerElement = document.getElementById('timer');
    const otpInput = document.getElementById('otpInput');
    const verifyBtn = document.getElementById('verifyBtn');

    let timeLeft = 300; // 5 minutes in seconds

    let countdown = setInterval(() => {
      const minutes = Math.floor(timeLeft / 60);
      const seconds = timeLeft % 60;
      timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

      if (timeLeft <= 60) {
        timerElement.className = 'text-red-500 font-semibold';
      }

      if (timeLeft <= 0) {
        clearInterval(countdown);
        timerElement.textContent = '00:00';
        timerElement.className = 'text-red-500 font-semibold';

        // Disable input and button on expiry
        otpInput.disabled = true;
        otpInput.classList.add('opacity-50');
        otpInput.placeholder = 'Code expired';

        verifyBtn.disabled = true;
        verifyBtn.innerHTML = '<i class="fas fa-times-circle"></i> Code Expired';
        verifyBtn.className = 'bg-red-500 text-white py-4 rounded-xl text-sm font-semibold uppercase tracking-wide flex items-center justify-center gap-2 opacity-60 cursor-not-allowed';
      }

      timeLeft--;
    }, 1000);
  </script>
</body>
</html>
