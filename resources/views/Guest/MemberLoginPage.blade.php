<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Member Login | GBLDC Member</title>
  <link rel="stylesheet" href="output.css" />
  <link rel="stylesheet" href="../src/animation/animation.css" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

 <body
    class="bg-gray-50 flex items-center justify-center min-h-screen font-sans p-4">
    <div
      class="bg-white w-full max-w-6xl flex flex-col lg:flex-row rounded-2xl shadow-xl overflow-hidden">

      <!-- Left Side: Login Form -->
      <div id="loginSect" class="w-full lg:w-1/2 p-6 sm:p-8 lg:p-10 flex flex-col justify-between">
        <!-- Logo -->
        <div>
          <img src="{{ asset('images/logocoop-removebg-preview-2.png') }}"
            alt="GBLDC Logo" class="w-20 h-20 sm:w-24 sm:h-24 mb-6 mx-auto"
            style="image-rendering: auto;">
          <h2
            class="text-xl sm:text-2xl font-bold mb-2 text-center text-green-600 tracking-wide">
            Member Login
          </h2>
          <form action="{{route ('Member.LoginBtn')}}" method="POST" id="MemberLoginForm" class="space-y-4 sm:space-y-6" autocomplete="on">
            @csrf
            @method('POST')
            <div>
              <label for="MemberEmail" class="text-sm text-gray-600">Email Address</label>
              <input id="MemberEmail" name="username" type="email" placeholder="example@mail.com"
                class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-150"
                required autocomplete="username">
              
            </div>
            <div class="relative">
              <label for="MemberPassword" class="text-sm text-gray-600">Password</label>
              <input id="MemberPassword" name="password" type="password" placeholder="••••••••"
                class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-150 pr-10"
                required autocomplete="current-password">
              <button type="button" tabindex="-1" aria-label="Show password" onclick="togglePassword()"
                class="absolute right-2 top-8 text-gray-400 hover:text-green-600 focus:outline-none">
                <i id="togglePwdIcon" class="fa fa-eye"></i>
              </button>
             
            </div>
            <button
              id="loginBtn"
              type="submit"
              class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 focus:ring-2 focus:ring-green-400 focus:outline-none transition-all duration-150 flex items-center justify-center gap-2 relative disabled:opacity-60"
            >
              <span>Log in</span>
              <span id="loginSpinner" class="spinner" style="display:none;"></span>
            </button>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div id="loginFeedback" class="text-center mt-2 text-sm"></div>
          </form>
        </div>

        <p class="text-xs text-gray-400 text-center mt-6 sm:mt-10 italic">©2025 Greater Bulacan
          Livelihood Development Cooperative</p>
      </div>
      <!-- Right Side: Illustration (for login only) -->
       
      <div class="hidden lg:flex w-full lg:w-1/2 bg-green-500 relative items-center justify-center">
        <img src="{{ asset('images/gbldc-login.png') }}" alt="Loan Illustration"
          class="object-cover w-full h-full">
      </div>
    </div>

</body>
<script>
// Show/hide password toggle
function togglePassword() {
  const pwdInput = document.getElementById('MemberPassword');
  const icon = document.getElementById('togglePwdIcon');
  if (pwdInput.type === 'password') {
    pwdInput.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
  } else {
    pwdInput.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  }
}


</script>
</html>