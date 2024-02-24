@extends('homepage.layout')

@section('content')

@auth
<section class="py-5">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-5 p-5">Roni's Profile</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6 text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                            alt="avatar" class="rounded-full mx-auto" style="width: 150px;">
                        <h5 class="my-3">Roni Saha</h5>
                        <div class="flex justify-center mb-2">
                            <form action="" method="post">
                            <button type="button"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Change
                            </button>
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="logout">
                                Logout
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-4">
                        <div class="flex items-center border-b border-gray-200 mb-4">
                            <h3 class="text-lg font-semibold">Details</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-500 mb-0">Roni Saha</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-500 mb-0">example@example.com</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-500 mb-0">+91 6202067099</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-500 mb-0">+91 6202067099</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-gray-500 mb-0">Line Bazar, Purnea, Bihar-854301</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endauth
@guest
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center mt-10" role="alert">
    <strong class="font-bold">You are not logged in!</strong>
    <span class="block sm:inline mb-5">Please login to access this feature.</span>
    <span class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
        <a href="/login" class="text-sm">
            Login Now
        </a>
    </span>
  </div>
  
@endguest

<script>
           $('#logout').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '/logout', // Directly specify the URL
                    data: $(this).serialize(), // Serialize the form data
                    success: function() {
                        console.log("Done");
                        window.location.href = '/';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching appointment details:', error);
                    }
                });
            });
</script>

@endsection
