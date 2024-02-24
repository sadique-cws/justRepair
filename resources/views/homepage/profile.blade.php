@extends('homepage.layout')

@section('content')

<section class="py-5">
    <div class="container mx-auto" id="profile-container" style="display: none">
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

<div id="login-register-info" style="display: none;">
    <p>Please <a href="/login">login</a> or <a href="/register">register</a> to view profile.</p>
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
                $("#login-register-info").show();
                console.error('Error fetching profile details:', error);
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
