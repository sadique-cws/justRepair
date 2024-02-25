@extends('homepage.layout')

@section('content')

<div id="login-register-info" class=" h-[90vh] bg-gradient-to-r from-orange-200 to-pink-200 text-blue-800 p-4 rounded-lg">
    <div class="flex flex-col justify-center items-center h-full">
        <p class="mb-4 text-lg">Please login or register to view profile.</p>
        <div class="flex justify-center items-center">
            <a href="/login"
                class="flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7"></path>
                </svg>
                Login
            </a>
            <a href="/register"
                class="flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7"></path>
                </svg>
                Register
            </a>
        </div>
        <p class="mt-4">Already have an account? <a href="/login" class="text-white-700 underline">Login</a></p>
        <p class="mt-2">New user? <a href="/register" class="text-blue-700 underline">Register</a></p>
    </div>
</div>

@endsection
