<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{asset('adminpage')}}/assets/img/">

        <title>GajiHan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="bg-white font-sans lg:mx-10 ">

        <!-- Header Section -->
        <header class="bg-white py-12 px-6  ">
          <div class="flex flex-row gap-12 ">
              <div class="max-w-7xl max-lg:mx-auto sm:mx-1 flex flex-col text-start items-start w-full lg:items-start lg:text-start lg:w-[40%] ">
                  <p src=""  class="mb-6 w-16 h-16 mt-8 "></p>
                  <h1 class="text-3xl font-bold text-gray-800 mb-10 mt-6">Sistem Informasi GajiHan</h1>
                  <p class="text-lg text-gray-600 mb-8 mt-6">Mengelola data gaji karyawan GajiHan</p>
                  <div>

                  @auth
                  <a href="{{ route('dashboard-gaji') }}" class="px-6 py-3 text-black text-lg font-semibold  hover:bg-teal-600 hover:text-white transition duration-300 w-[159px] h-[51px] bg-[#d9d9d9]/0 rounded-[60px] border border-[#3dd5c9]">
                    Dashboard
                  </a>
                  @else
                  <a href="{{ route('login') }}" class="px-6 py-3 text-black text-lg font-semibold hover:bg-blue-500 transition duration-300 w-[159px] h-[51px] bg-[#d9d9d9]/0 rounded-[60px] border border-[#3dd5c9]">
                    Get Started
                  </a>
                  @endauth
                  </div>
                </div>

                <div>
                  <img src="{{asset('adminpage')}}/assets/img/landing-page.png" alt="" class="w-[711px] h-[636px] hidden lg:block ">
                </div>
          </div>

      </header>
        <!-- FontAwesome for Icons -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      </body>
</html>
