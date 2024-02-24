@extends('homepage.layout')

@section('content')
   
@auth
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-8">My Bookings</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8" id="appointmentList">
        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:-translate-y-1">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">Booking 1</h2>
                <p class="text-gray-600">Date: January 1, 2024</p>
                <p class="text-gray-600">Time: 10:00 AM</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:-translate-y-1">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">Booking 2</h2>
                <p class="text-gray-600">Date: January 5, 2024</p>
                <p class="text-gray-600">Time: 2:00 PM</p>
            </div>
        </div>
        <!-- Add more bookings as needed -->
    </div>
</div>
@endauth

@guest
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center mt-10" role="alert">
    <strong class="font-bold">You are not logged in!</strong>
    <span class="block sm:inline mb-5">Please login to access this feature.</span>
    <span class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
        <a href="{{route('login')}}" class="text-sm">
            Login Now
        </a>
    </span>
</div>

  
@endguest

<script>
    $(document).ready(function() {
        let callingAppointment = () => {
            $.ajax({
                url: `{{ route('appointment.show/${id}') }}`,
                type: "GET",
                success: function(response) {
                    let appointmentList = $("#appointmentList")
                    appointmentList.empty();



                    let appointment = response;

                    appointment.forEach( (item) => {
                        appointmentList.append(`
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform        hover:-translate-y-1">
                            <div class="p-4">
                                <h2 class="text-xl font-semibold mb-2">${item.id}</h2>
                                <p class="text-gray-600">Date : ${item.preferred_date}</p>
                                <p class="text-gray-600">Time: ${item.preferred_time}</p>
                            </div>
                        </div>

                        `)
                    })
                }
            });
        }
        callingAppointment();
    })
</script>


@endsection
