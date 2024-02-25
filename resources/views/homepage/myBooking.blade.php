@extends('homepage.layout')

@section('content')
   
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-8">My Bookings</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8" id="appointmentList">
        
       
        <!-- Add more bookings as needed -->
    </div>
</div>


  

<script>
    $(document).ready(function() {
        let callingAppointment = () => {
            $.ajax({
                url: `{{ route('appointment.mybooking') }}`,
                type: "GET",
                headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
                success: function(response) {
                    let appointmentList = $("#appointmentList")
                    appointmentList.empty();
                    response.forEach( (item) => {
                        appointmentList.append(`
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:-translate-y-1">
                            <div class="p-4">
                                <h2 class="text-xl font-semibold mb-2">${item.fullname}</h2>
                                <p class="text-gray-600">Date : ${item.preferred_date}</p>
                                <p class="text-gray-600">Time: ${item.preferred_time}</p>
                            </div>
                        </div>

                        `)
                    })
                }, 
                error: function (xhr, status, error) {
                window.location.href = "{{route('loginRequired')}}"
            }
                
            });
        }
        callingAppointment();
    })
</script>


@endsection
