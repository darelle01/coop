<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Users | GBLDC Admin</title>
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
        <a href="{{route ('Admin.dashboard')}}">
          <img src="{{asset('images/logocoop-removebg-preview-2.png')}}" alt="GBLDC Logo" class="w-12 h-12 object-cover" />
        </a>
        <h1 class="text-lg md:text-xl font-semibold text-teal-900">GBLDC Admin - Manage Users</h1>
      </div>
      <div class="flex items-center gap-4">
        <span class="md:inline text-gray-700">Admin</span>
        <img src="{{asset('images/profile.png')}}" alt="Admin Avatar" class="w-10 h-10 rounded-full border-2 border-green-600 object-cover" />
      </div>
    </div>
  </header>

  <main class="pt-28 pb-12 px-4 max-w-7xl mx-auto">
    <!-- Title and Add Button -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
      <div>
        <h2 class="text-2xl font-bold text-teal-900 mb-1">Manage Users</h2>
        <p class="text-gray-700">View, search, edit, or remove users from the cooperative system.</p>
      </div>
      
    </div>
    
    <!-- Search and Add -->
       <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
      <div class="flex items-center gap-2">
        <input type="text" placeholder="Search by name or email..." class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 w-64" />
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="flex justify-end w-full">
        <form action="{{route ('Admin.dashboard')}}" method="GET" class="">
          <button class="inline-flex items-center px-3 py-1.5 rounded bg-green-100 text-green-800 hover:bg-green-200 transition-colors focus:outline-none focus:ring-2 focus:ring-green-400 shadow-sm mr-3">
          <i class="fa fa-arrow-left mr-2"></i> Back
          </button>
        </form>
        <a href="{{route ('Admin.form')}}"><button class="bg-green-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-green-700 transition flex items-center gap-2">
          <i class="fas fa-user-plus"></i> Add User
        </button></a>
      </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow p-6 mb-10">
      <h3 class="text-lg font-semibold text-teal-900 mb-4">User List</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead>
            <tr class="bg-green-100 text-green-900">
              <th class="py-2 px-4 text-left">Name</th>
              <th class="py-2 px-4 text-left">Email</th>
              <th class="py-2 px-4 text-left">Role</th>
              <th class="py-2 px-4 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
             @foreach($staffs as $staff)
                <tr>
                  <td class="py-2 px-4">{{$staff->full_name}}</td>
                  <td class="py-2 px-4">{{$staff->email}}</td>
                  <td class="py-2 px-4">{{$staff->position}}</td>
                  <td class="py-2 px-4">edit</td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const searchInput = document.querySelector("input[type='text']");
      const roleFilter = document.querySelector("select");
      const searchBtn = document.querySelector("button.bg-green-600 i.fa-search")?.closest("button");
      const tableBody = document.querySelector("tbody");
      

      const getRows = () => tableBody.querySelectorAll("tr");

      // Filter function
      function filterUsers(showAlert = false) {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedRole = roleFilter.value.toLowerCase();
        let anyVisible = false;

        getRows().forEach(row => {
          const name = row.children[1].textContent.toLowerCase();
          const email = row.children[2].textContent.toLowerCase();
          const role = row.children[3].textContent.toLowerCase();

          const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
          const matchesRole = selectedRole === "" || role === selectedRole;

          const shouldShow = matchesSearch && matchesRole;
          row.style.display = shouldShow ? "" : "none";
          if (shouldShow) anyVisible = true;
        });

        if (showAlert) {
          Swal.fire({
            icon: anyVisible ? 'success' : 'info',
            iconColor: anyVisible ? '#16a34a' : '#f59e0b',
            color: '#1e2939',
            title: anyVisible ? 'User(s) Found!' : 'No users found',
            text: `Results match "${searchTerm}".`,
            timer: 2000,
            showConfirmButton: false
          });
        }
      }

      searchBtn?.addEventListener("click", (e) => {
        e.preventDefault();
        filterUsers(true);
      });

      roleFilter.addEventListener("change", () => filterUsers(false));

      function setupRemoveButtons() {
        const removeButtons = document.querySelectorAll("button.text-red-600");
        removeButtons.forEach(button => {
          button.onclick = () => {
            Swal.fire({
              title: 'Are you sure?',
              text: "This action is permanent.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Yes, remove user'
            }).then((result) => {
              if (result.isConfirmed) {
                const row = button.closest('tr');
                row.remove();
                Swal.fire('Deleted!', 'User has been removed.', 'success');
              }
            });
          };
        });
      }

      function setupEditButtons() {
        const editButtons = document.querySelectorAll("button.text-blue-600");
        editButtons.forEach(button => {
          button.onclick = () => {
            const row = button.closest('tr');
            const nameCell = row.children[1];
            const emailCell = row.children[2];
            const roleCell = row.children[3];

            const currentName = nameCell.textContent.trim();
            const currentEmail = emailCell.textContent.trim();
            const currentRole = roleCell.textContent.trim();

            Swal.fire({
              title: 'Edit User',
              html: `
                <input type="text" id="edit-name" class="swal2-input" value="${currentName}">
                <input type="email" id="edit-email" class="swal2-input" value="${currentEmail}">
                <select id="edit-role" class="swal2-select">
                  <option value="Admin" ${currentRole === 'Admin' ? 'selected' : ''}>Admin</option>
                  <option value="Staff" ${currentRole === 'Staff' ? 'selected' : ''}>Staff</option>
                  <option value="Member" ${currentRole === 'Member' ? 'selected' : ''}>Member</option>
                </select>
              `,
              preConfirm: () => {
                const name = document.getElementById('edit-name').value.trim();
                const email = document.getElementById('edit-email').value.trim();
                const role = document.getElementById('edit-role').value;
                if (!name || !email || !role) {
                  Swal.showValidationMessage("All fields are required");
                }
                return { name, email, role };
              }
            }).then(result => {
              if (result.isConfirmed) {
                const { name, email, role } = result.value;
                nameCell.innerHTML = `<img src="path/images/default-avatar.jpg" class="w-8 h-8 rounded-full object-cover border border-green-300 mr-2" /> ${name}`;
                emailCell.textContent = email;
                roleCell.textContent = role;
                Swal.fire('Updated!', 'User information updated.', 'success');
              }
            });
          };
        });
      }
      // Init
      setupRemoveButtons();
      setupEditButtons();
    });
  </script>
</body>
</html>
