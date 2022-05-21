<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />  
  <title>Dashboard | Foodie</title>
</head>
<body class="bg-gray-200">
<div class="flex">
  <aside class="w-64 h-full" aria-label="Sidebar">
    <div class="h-screen overflow-y-auto py-4 px-3 bg-gray-50 rounded-lg shadow-md">
      <a href="/" class="block font-bold text-2xl text-center uppercase mb-8">Foodie</a>
      <ul class="space-y-4 w-full mb-4">
        <li>
          <a href="{{ route('dashboard') }}" class="p-2 text-base font-normal text-gray-900 hover:text-blue-500">
            <i class="fas fa-pager"></i>
            <span class="ml-2">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('dashboard.slider') }}" class="p-2 text-base font-normal text-gray-900 hover:text-blue-500">
            <i class="fas fa-map"></i>
            <span class="ml-2">Slider</span>
          </a>
        </li>
        <li>
          <a href="#dashboard" class="p-2 text-base font-normal text-gray-900 hover:text-blue-500">
            <i class="fas fa-user-circle"></i>
            <span class="ml-2">Profile</span>
          </a>
        </li>
      </ul>
      <ul class="space-y-4 border-t w-full pt-4">
        <li>
          <a href="#dashboard" class="p-2 text-base font-normal text-gray-900 hover:text-blue-500">
            <i class="fas fa-cog"></i>
            <span class="ml-2">Setting</span>
          </a>
        </li>
        <li>
          <a href="#dashboard" class="p-2 text-base font-normal text-gray-900 hover:text-blue-500">
            <i class="fas fa-sign-out-alt"></i>
            <span class="ml-2">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  @yield('content')
</div>
</body>
</html>