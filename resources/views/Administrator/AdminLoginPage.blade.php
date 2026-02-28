<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Login | GBLDC Admin</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/logocoop-removebg-preview-2.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
    .login-gradient {
      background: linear-gradient(135deg, #166534 0%, #22c55e 100%);
    }
    .input-field:focus {
      box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
    }
    .logo-glow {
      filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
  <div class="bg-white w-full max-w-5xl flex flex-col md:flex-row rounded-3xl shadow-2xl overflow-hidden">
    
    <!-- Left Side: Login Form -->
    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col">
      <!-- Logo -->
      <div class="text-center mb-8">
        <img src="{{ asset('images/logocoop-removebg-preview-2.png') }}"
          alt="GBLDC Logo" class="w-24 h-24 mx-auto logo-glow mb-4">
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight">GBLDC</h1>
        <p class="text-gray-500 text-sm mt-1">Admin Portal</p>
      </div>
      
      <h2 class="text-xl font-semibold text-center text-gray-700 mb-6">Welcome Back</h2>
      
      <!-- Error Message -->
      @if(session('error'))
      <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-4 text-sm flex items-center gap-2">
        <i class="fas fa-exclamation-circle"></i>
        {{ session('error') }}
      </div>
      @endif
      
      <!-- Login Form -->
      <form action="{{ route('Login.Btn') }}" method="POST" class="space-y-5">
        @csrf
        
        <!-- Email Field -->
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Email Address</label>
          <div class="relative">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" name="email" placeholder="admin@gbldc.coop" required
              class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-green-500 transition">
          </div>
        </div>
        
        <!-- Password Field -->
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
          <div class="relative">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" name="password" placeholder="Enter your password" required
              class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-green-500 transition">
          </div>
        </div>
        
        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" class="w-4 h-4 text-green-600 rounded focus:ring-green-500">
            <span class="text-gray-500">Remember me</span>
          </label>
          <a href="#" class="text-green-600 hover:text-green-700 font-medium">Forgot password?</a>
        </div>
        
        <!-- Submit Button -->
        <button type="submit"
          class="w-full bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700 transition duration-200 shadow-lg hover:shadow-xl">
          <i class="fas fa-sign-in-alt mr-2"></i> Log In
        </button>
      </form>

      <!-- Back to Home -->
      <div class="mt-6 text-center">
        <a href="{{ route('Landing.Page') }}" class="text-gray-400 hover:text-gray-500 text-sm">
          <i class="fas fa-arrow-left mr-1"></i> Back to Home
        </a>
      </div>

      <p class="text-xs text-gray-400 text-center mt-auto pt-8">©2025 Greater Bulacan
        Livelihood Development Cooperative</p>
    </div>
    
    <!-- Right Side: Illustration -->
    <div class="hidden md:flex w-full md:w-1/2 login-gradient relative items-center justify-center p-12">
      <div class="text-center text-white">
        <img src="{{ asset('images/gbldc-login.png') }}" alt="Login Illustration"
          class="w-full max-w-md mx-auto mb-8">
        <h3 class="text-2xl font-bold mb-2">Manage Your Cooperative</h3>
        <p class="text-green-100 text-sm">Secure access to admin dashboard and member management</p>
      </div>
    </div>
  </div>

</body>
</html>
