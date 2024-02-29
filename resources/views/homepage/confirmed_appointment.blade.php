@extends('homepage.layout')

@section("title", "Confirmed Appointment Successfully - JustRepair | Book Expert Home Appalince Online | Purnea.")

@section("description", "Confirm your scheduled repair service appointment with JustRepair. Review the details of your appointment and proceed to confirm to finalize your booking.")


@section('content')
<div class="flex flex-col justify-center items-center mt-8">
    <div class="bg-white p-4 rounded-lg shadow-md max-w-md w-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-green-600" viewBox="0 0 20 20"
        fill="currentColor">
        <path fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zm0 2a10 10 0 100-20 10 10 0 000 20zm0-6a1 1 0 00.707-.293l3-3a1 1 0 10-1.414-1.414L10 12.586 7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 00.707.293z"
            clip-rule="evenodd" />
    </svg>
        <h1 class="text-3xl text-center font-bold text-gray-800">Appointment Booked Successfully</h1>
        <div id="appointmentDetails" class=""></div>
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
                let id = localStorage.getItem('id');
                let url = `{{ route('appointment.show', ':id') }}`;
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        var appointmentDetailsHtml = '';
                        
                        appointmentDetailsHtml += '<p class="text-justify">Hi ' + response
                            .fullname + ', <br> Your appointment for  <b>' + JSON.parse(response.requirements).join(' and ') + '</b> has been successfully booked.  Our technician will be in touch with you soon.'
                        appointmentDetailsHtml += '<p class="border border-slate-300 my-5 bg-yellow-200 text-3xl text-center p-3 rounded text-slate-800"><strong>Complaint Number:</strong>  <span class="text-red-600 font-semibold">' +
                            response.complain_no + ' </span></p>';
                        appointmentDetailsHtml += '<p>For more details, please call us at 9546805580</p>';
        

                        $('#appointmentDetails').html(appointmentDetailsHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching appointment details:', error);
                    }
                });
            };

            calling_comp();
        })
    </script>
@endsection
