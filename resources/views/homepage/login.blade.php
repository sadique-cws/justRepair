@extends('homepage.layout')

@section('content')
    <div class="container mt-5">
        <div class="flex justify-center">
            <div class="w-3/4 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3">
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
                    <p class=" text-gray-700 text-sm">
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Don't have an account?</a>
                    </p>
                    <p class="text-end text-gray-700 text-sm">
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Forgot Password?</a>

                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Login
        $('#login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/login',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    localStorage.setItem('token', response.token);
                    alert('Login Successful');
                    window.location.href = '/'; // Redirect to dashboard or any other page
                },
                error: function(xhr, status, error) {
                    alert('Login Failed. Please check your credentials.');
                }
            });
        });
    </script>
@endsection
