@extends('homepage.layout')

@section('content')
    <div class="mt-5">
        <div class="flex justify-center">
            <div class="w-3/4 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3">

                <div id="errorMsg" style="display: none">
                    <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            Login Failed. Please check your credentials.
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
                          <span class="sr-only">Dismiss</span>
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                        </button>
                    </div>
                </div>

                
                <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="login">
                    <h3 class="text-center text-lg font-bold mb-4">Login Now</h3>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" name="email" placeholder="example@gmail.com"
                            class="form-input w-full py-2 px-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password"name="password" placeholder="**********"
                            class="form-input w-full py-2 px-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="Login"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">
                    </div>
                    <div class="flex justify-between">
                        <p class=" text-gray-700 text-sm">
                            <a href="/register" class="text-blue-500 hover:underline">Don't have an account?</a>
                        </p>
                        <p class="text-end text-gray-700 text-sm">
                            <a href="/register" class="text-blue-500 hover:underline">Forgot Password?</a>
    
                        </p>
                    </div>
                </form>

                
            </div>
        </div>
    </div>

    <script>
        // Login
        $('#login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'api/login',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    localStorage.setItem('token', response.token);
                    window.location.href = '{{route('profile')}}'; // Redirect to dashboard or any other page
                },
                error: function(xhr, status, error) {
                    $('#errorMsg').show();
                }
            });
        });
    </script>
@endsection
