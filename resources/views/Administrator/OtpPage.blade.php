<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Verification - Admin Portal</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
    .otp-input:focus {
      box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 p-4">
  <div class="bg-white w-full max-w-4xl flex flex-col md:flex-row rounded-3xl shadow-2xl overflow-hidden">
    
    <!-- Left Panel - OTP Form -->
    <div class="w-full md:w-1/2 p-8 md:p-10 flex flex-col justify-center">
      <!-- Logo -->
      <div class="text-center mb-6">
        <img src="{{ asset('images/logocoop-removebg-preview-2.png') }}" alt="GBLDC Logo" class="w-16 h-16 mx-auto mb-3">
        <h1 class="text-2xl font-bold text-gray-800">GBLDC</h1>
      </div>

      <div class="text-center mb-8">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center">
          <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
        </div>
        <h2 class="text-xl font-semibold text-gray-800">OTP Verification</h2>
        <p class="text-gray-500 text-sm mt-1">Enter the verification code sent to your email</p>
      </div>

      <!-- Email Display -->
      <div class="bg-gray-50 rounded-xl p-4 mb-6 border-l-4 border-green-500">
        <div class="text-xs text-gray-500 uppercase mb-1 font-medium">Verification code sent to:</div>
        <div class="text-gray-700 font-semibold truncate">{{ $email }}</div>
      </div>

      <!-- Error/Success Messages -->
      @if(session('error'))
      <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-4 text-sm flex items-center gap-2">
        <i class="fas fa-exclamation-circle"></i>
        {{ session('error') }}
      </div>
      @endif

      @if(session('success'))
      <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg mb-4 text-sm flex items-center gap-2">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
      </div>
      @endif

      <!-- OTP Form -->
      <form action="{{ route('OTP.Confirm') }}" method="POST" id="otpForm">
        @csrf
        
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-600 mb-2">Enter Verification Code</label>
          <input 
            type="text" 
            name="OTP" 
            id="otpInput"
            maxlength="6" 
            placeholder="XXXXXX"
            autocomplete="off"
            required
            class="otp-input w-full h-12 border border-gray-200 rounded-xl text-center text-xl font-mono tracking-widest text-gray-700 placeholder-gray-300 focus:outline-none focus:border-green-500 transition"
          >
        </div>

        <!-- Timer -->
        <div class="text-center text-gray-500 text-sm mb-6">
          Code expires in: <span id="timer" class="text-green-600 font-semibold">05:00</span>
        </div>

        <!-- Verify Button -->
        <button type="submit" id="verifyBtn" class="w-full bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700 transition duration-200 shadow-lg hover:shadow-xl mb-3">
          <i class="fas fa-check-circle mr-2"></i> Verify Code
        </button>

        <!-- Resend Button -->
        <form action="{{ route('Login.Btn') }}" method="POST" class="mt-0">
          @csrf
          <a href="{{ route('Admin.Login') }}" class="block w-full border border-gray-200 text-gray-500 py-3 rounded-xl text-sm font-medium text-center hover:border-green-500 hover:text-green-600 hover:bg-green-50 transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Login
          </a>
        </form>
      </form>

      <p class="text-center text-gray-400 text-xs mt-6">©2025 Greater Bulacan Livelihood Development Cooperative</p>
    </div>

    <!-- Right Panel - Illustration -->
    <div class="hidden md:flex w-full md:w-1/2 bg-gradient-to-br from-green-600 to-green-700 items-center justify-center p-8">
      <div class="text-center text-white">
        <div class="w-24 h-24 mx-auto mb-6 rounded-2xl bg-white/10 flex items-center justify-center">
          <i class="fas fa-user-shield text-4xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-2">Secure Access</h3>
        <p class="text-green-100 text-sm max-w-xs mx-auto">Please verify your identity by entering the 6-digit code sent to your email address.</p>
        
        <div class="mt-8 flex justify-center gap-4">
          <div class="bg-white/10 rounded-lg p-3 text-center">
            <i class="fas fa-lock text-xl mb-1"></i>
            <p class="text-xs text-green-100">Secure</p>
          </div>
          <div class="bg-white/10 rounded-lg p-3 text-center">
            <i class="fas fa-envelope text-xl mb-1"></i>
            <p class="text-xs text-green-100">Email</p>
          </div>
          <div class="bg-white/10 rounded-lg p-3 text-center">
            <i class="fas fa-clock text-xl mb-1"></i>
            <p class="text-xs text-green-100">5 min</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Timer Script -->
  <script>
    const timerElement = document.getElementById('timer');
    const otpInput = document.getElementById('otpInput');
    const verifyBtn = document.getElementById('verifyBtn');

    let timeLeft = 300; // 5 minutes

    const countdown = setInterval(() => {
      const minutes = Math.floor(timeLeft / 60);
      const seconds = timeLeft % 60;
      timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

      if (timeLeft <= 60) {
        timerElement.className = 'text-red-500 font-semibold';
      }

      if (timeLeft <= 0) {
        clearInterval(countdown);
        timerElement.textContent = '00:00';
        otpInput.disabled = true;
        otpInput.classList.add('opacity-50', 'cursor-not-allowed');
        otpInput.placeholder = 'Expired';
        verifyBtn.disabled = true;
        verifyBtn.className = 'w-full bg-gray-400 text-white py-3 rounded-xl font-semibold cursor-not-allowed';
        verifyBtn.innerHTML = '<i class="fas fa-times-circle mr-2"></i> Code Expired';
      }

      timeLeft--;
    }, 1000);
  </script>
</body>
</html>
