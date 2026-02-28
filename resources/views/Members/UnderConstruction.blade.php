<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('images/logocoop-removebg-preview-2.png')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Under Construction | GBLDC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>
  <body class="bg-gray-50 font-sans min-h-screen flex items-center justify-center">
    <div class="text-center p-8 max-w-md w-full">
      <div class="mb-6">
        <i class="fas fa-hard-hat text-6xl text-yellow-500 mb-4"></i>
      </div>
      <h1 class="text-3xl font-bold text-gray-800 mb-4">Under Construction</h1>
      <p class="text-gray-600 mb-6">This page is currently being built. We're working hard to bring you new features. Please check back soon!</p>
      <a href="{{ route('Loan.Dashboard') }}" class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors">
        <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
      </a>
    </div>
  </body>
</html>
