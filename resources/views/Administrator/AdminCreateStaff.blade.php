<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add User | GBLDC Admin</title>
  <link rel="stylesheet" href="output.css" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen">

  <!-- Header -->
  <header class="bg-white shadow-md fixed left-0 top-0 z-50 w-full">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3">
      <div class="flex items-center space-x-4">
        <a href="admin-page.html">
          <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="GBLDC Logo" class="w-12 h-12 object-cover" />
        </a>
        <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Admin - Add User</h1>
      </div>
      <div class="flex items-center gap-4">
        <span class="md:inline text-gray-700">Admin</span>
        <img src="{{asset ('images/profile.png')}}" alt="Admin Avatar" class="w-10 h-10 rounded-full border-2 border-green-600 object-cover" />
      </div>
    </div>
  </header>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  <main class="pt-28 pb-12 px-4 max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow p-6">
      <h2 class="text-2xl font-bold text-teal-900 mb-6">Add New User</h2>
      <form action="{{route ('Create.staff')}}" method="POST" id="addUserForm" class="space-y-6">
        @csrf
        <div>
          <label for="userName" class="block text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" name="full_name" id="userName" placeholder="Enter full name" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required />
        </div>
        <div>
          <label for="userEmail" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="userEmail" placeholder="Enter email address" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required />
        </div>
        <div>
          <label for="userPassword" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" name="password" id="userPassword" placeholder="Enter password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required />
        </div>
        <div>
          <label for="userRole" class="block text-sm font-medium text-gray-700">Role</label>
          <select id="userRole" name="position" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
            <option value="">Select Role</option>
            <option value="Staff">Staff</option>
          </select>
        </div>
        <div class="flex justify-end gap-4 pt-4">
          <a href="{{route ('Admin.manage')}}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</a>
          <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Add User</button>
        </div>
      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 

</body>
</html>
