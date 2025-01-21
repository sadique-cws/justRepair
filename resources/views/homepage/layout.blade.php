<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
</head>

<body>

    <div class="bg-white border-b border-slate-200 flex-1 shadow">
        <div class="flex flex-1 justify-center px-3 md:px-10">
            <div class="px-5 md:px-[10%]  w-full">
                <div class="flex flex-1 justify-between items-center">
                    <a href="{{ route('index') }}" class="lg:w-2/12 w-6/12  text-slate-800">
                        <img src="{{ asset('images/logo.png') }}" class="" />
                    </a>

                    <button
                        class="text-black hover:bg-slate-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5"
                        type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                        aria-controls="drawer-navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- drawer component -->
    <div id="drawer-navigation"
        class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 "
        tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 class="text-base font-semibold text-gray-500 uppercase" id="calling_username">Hi, Guest
        </h5>
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center ">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4  flex flex-col content-between">

            <ul class="space-y-2 font-medium flex-1">

                <li>
                    <a href="{{ route('ourSevices') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                        </svg>

                        <span class="ms-3">Our Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('myBooking') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                        </svg>

                        <span class="ms-3">My Booking</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('search') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Track your Appointment</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('aboutPage') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                        </svg>

                        <span class="ms-3">About Us</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('tandc') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>

                        <span class="ms-3">Terms & Conditions</span>
                    </a>
                </li>


                <li id="login-li">
                    <a href="{{ route('login') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                    </a>
                </li>

                <li id="register-li">
                    <a href="{{ route('register') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                    </a>
                </li>

                <li id="logout-li" style="display: none;">
                    <a href="#" id="logout"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-red-200  group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="px-4">

        @section('content')

        @show
    </div>



    <div class="fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200  ">
        <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">
            <a href="{{ route('index') }}"
                class="inline-flex flex-col items-center justify-center px-3 hover:bg-gray-50  group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span class="text-sm text-gray-500  group-hover:text-blue-600 ">Home</span>
            </a>

            <a href="{{ route('myBooking') }}"
                class="flex flex-col items-center justify-center px-3 hover:bg-gray-50  group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                </svg>

                <span class="text-sm text-gray-500  group-hover:text-blue-600  text-nowrap">My
                    Services</span>
            </a>
            {{-- <a href="{{ route('profile') }}"
                class="inline-flex flex-col items-center justify-center px-3 hover:bg-gray-50  group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <span
                    class="text-sm text-gray-500  group-hover:text-blue-600 ">Profile</span>
            </a> --}}
            <a href="https://wa.me/+917280080080" target="_blank"
                class="inline-flex items-center gap-2 text-white px-3 py-2 rounded-md flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                    class="w-6 h-6 text-gray-500 rounded-full">
                    <path
                        d="M20.52 3.48A11.88 11.88 0 0 0 2.46 20.12l-1.3 4.66a1 1 0 0 0 1.22 1.22l4.66-1.3a11.87 11.87 0 0 0 6.32 1.86c6.41 0 11.62-5.21 11.62-11.62 0-3.12-1.23-6.05-3.48-8.28zM12 21.37a9.34 9.34 0 0 1-5.06-1.47l-.36-.23-3.41.96.96-3.41-.23-.36a9.36 9.36 0 0 1 14.2-11.56 9.33 9.33 0 0 1 2.73 6.63c0 5.15-4.19 9.34-9.34 9.34zm5.48-6.89c-.26-.13-1.54-.76-1.78-.85s-.41-.13-.59.13-.68.85-.83 1-.31.19-.57.06-1.11-.41-2.12-1.32a7.92 7.92 0 0 1-1.47-1.82c-.15-.26 0-.41.12-.54.11-.11.25-.28.37-.42.12-.15.15-.26.22-.41s.04-.32-.02-.45-.59-1.42-.81-1.97c-.21-.5-.43-.44-.59-.45l-.5-.01a.95.95 0 0 0-.7.33c-.24.26-.93.91-.93 2.23s.95 2.58 1.09 2.76c.13.18 1.87 2.86 4.53 3.99 1.58.68 2.19.73 2.96.62.48-.07 1.54-.62 1.76-1.21.22-.6.22-1.11.15-1.22-.07-.11-.25-.18-.52-.31z" />
                </svg>
                <span class="text-sm text-gray-500  group-hover:text-blue-600 ">WhatsApp</span>
            </a>

            <a href="tel:7080080080" target="_blank"
                class="inline-flex flex-col items-center justify-center px-1 hover:bg-gray-50 group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-6 h-6 animate-vibrate text-slate-500"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>

                <span class="text-sm text-nowrap text-gray-500 group-hover:text-blue-600">
                    7080080080</span>
            </a>


        </div>
    </div>


    <script>
        $(document).ready(function() {

            var token = localStorage.getItem('token');

            if (token) {
                $.ajax({
                    url: '/api/profile',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response) {
                        if (response.hasOwnProperty('name')) {
                            $("#calling_username").text('Hi, ' + response.name);
                            $('#login-li').hide();
                            $('#register-li').hide();
                            $('#logout-li').show();
                        } else {
                            $("#calling_username").text('Hi, Guest');
                            $('#login-li').show();
                            $('#register-li').show();
                            $('#logout-li').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 401) {
                            // Token expired, remove from local storage
                            localStorage.removeItem('token');
                        }
                        $("#calling_username").text('Hi, Guest');
                        $('#login-li').show();
                        $('#register-li').show();
                        $('#logout-li').hide();
                        console.log(xhr.responseText);
                    }
                });
            } else {
                // Token does not exist, handle the case accordingly
                $("#calling_username").text('Hi, Guest');
                $('#login-li').show();
                $('#register-li').show();
                $('#logout-li').hide();
            }


            $('#logout').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/api/logout',
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function(response) {
                        // Remove the token from localStorage
                        localStorage.removeItem('token');
                        // Redirect to the login page
                        window.location.href = '{{ route('login') }}';
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>
