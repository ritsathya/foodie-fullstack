<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard | Foodie</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />  
  <style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>
</head>
<body class="bg-gray-200 flex flex-col justify-between h-screen">
  <x-navbar />
  @yield('content')
  <x-footer />
  <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script> 
</body>
</html>