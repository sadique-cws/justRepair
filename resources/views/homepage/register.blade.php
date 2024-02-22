@extends('homepage.layout')

@section('content')
   <div class=" mt-5">
        <div class="flex justify-center">
            <div class="w-3/4 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3">
                <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="register">
                    <h3 class="text-center text-lg font-bold mb-4">Register Now</h3>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="name" placeholder="Enter Your Name"
                            class="form-input w-full py-2 px-3 border border-gray-300 rounded-md" name="name">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" name="email" placeholder="example@gmail.com"
                            class="form-input w-full py-2 px-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="mobile_no" class="block text-gray-700 text-sm font-bold mb-2">Mobile No.</label>
                        <input type="text" id="mobile_no" name="mobile_no" placeholder="Ex: 8210461693"
                            class="form-input w-full py-2 px-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="password"  class="block  text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password" name="password" placeholder="**********"
                            class="form-input w-full py-2 px-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="Register"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">
                    </div>
                    <p class="text-center text-gray-700 text-sm">
                        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Already have an account?</a>
                    </p>
                </form>

            </div>
        </div>
    </div>

    <script>
        // Registration
        $('#register').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/register',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Registration Successful');
                    $('#register')[0].reset();
                    window.location.href = '/login';
                },
                error: function(xhr, status, error) {
                    alert(JSON.parse(xhr.responseText).message);
                }
            });
        });

    </script>
@endsection
