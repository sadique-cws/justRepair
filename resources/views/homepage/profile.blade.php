@extends('homepage.layout')


@section("title")
{{" Our Profile - " . env("APP_NAME") . " | Book Expert Home Appalince Online | Purnea."}}
@endsection

@section("description", "View and manage your appointment list with JustRepair. Keep track of your scheduled repair services and make changes as needed.")



@section('content')

<section class="">
    <div class="container mx-auto py-5" id="profile-container" style="display: none">
        <h2 class="text-3xl font-bold mb-5 p-5">Roni's Profile</h2>
        <div class="flex">
            
            <div class="flex-1">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-4">
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="name" class="font-semibold">Full Name:</label>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-500" id="name">Roni Saha</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="email" class="font-semibold">Email:</label>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-500" id="email">roni@example.com</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="mobile" class="font-semibold">Mobile Number:</label>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-500" id="mobile">+91 9876543210</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="avatar" class="font-semibold">Display Picture:</label>
                            </div>
                            <div class="col-span-2">
                                <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-lg"
                                    style="width: 150px;">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<div id="login-register-info" class="hidden h-[90vh] bg-gradient-to-r from-orange-200 to-pink-200 text-blue-800 p-4 rounded-lg">
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




<script>
    $(document).ready(function () {
        $.ajax({
            url: '/api/profile',
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
            success: function (response) {
                if (response.hasOwnProperty('name')) {
                    $("#profile-name").text(response.name);
                    $("#profile-container").show(); // Show the profile container
                } else {
                    $("#login-register-info").show();
                }
            },
            error: function (xhr, status, error) {
                window.location.href = "{{route('loginRequired')}}"
            }
        });

        $('#logout').click(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/logout',
                success: function () {
                    console.log("Logout successful");
                    localStorage.removeItem('token');
                    window.location.href = '/';
                },
                error: function (xhr, status, error) {
                    console.error('Error logging out:', error);
                }
            });
        });
    });
</script>

@endsection
