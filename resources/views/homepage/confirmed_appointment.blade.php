@extends('homepage.layout')
@section('content')
    <div class="flex flex-col justify-center items-center mt-8">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-green-600" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm0 2a10 10 0 100-20 10 10 0 000 20zm0-6a1 1 0 00.707-.293l3-3a1 1 0 10-1.414-1.414L10 12.586 7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 00.707.293z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="text-3xl text-center font-bold text-gray-800 mt-4">Your Appointment Has Been Confirmed!</h1>
            <p class="text-gray-600 text-center mt-2">Thank you for your Booking.</p>
            <p class="text-gray-600 text-center mt-2" id="calling_complain">
                @if (session('complain_no'))
                    Your complaint number: {{ session('complain_no') }}
                @endif
            </p>
            <div class="mt-6 flex justify-center">
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Know More
                </a>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let calling_comp = () => {
                $.ajax({
                    url: `{{ route('appointment.index') }}`,
                    type: "GET",
                    success: function(response) {
                        // Do something with the value
                        console.log(response.complain_no);
                    }
                });
            }
            calling_comp();
        })
    </script>
@endsection
