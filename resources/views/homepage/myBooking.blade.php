@extends('homepage.layout')

@section('title')
    {{ ' My Appointments - ' . env('APP_NAME') . ' | Book Expert Home Appalince Online | Purnea.' }}
@endsection

@section('description',
    'View and manage your bookings with JustRepair. Access details of your scheduled repair
    services, reschedule or cancel appointments, and track the status of ongoing repairs.')


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
                        response.forEach((item) => {

                            // parsing the requirements here:
                            var requirements = JSON.parse(item.requirements);
                            var requirementsHtml = '';

                            // creating a badge for each requirements here:
                            $.each(requirements, function(i, requirement) {
                                requirementsHtml +=
                                    `<span class="badge bg-green-500">${requirement}</span> `;
                            });

                            appointmentList.append(`
                                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:-translate-y-1 hover:shadow-xl border border-gray-300">
                                    <div class="p-6">
                                        <h2 class="text-2xl font-bold mb-4 text-sky-700 capitalize">${item.fullname}</h2>
                                        
                                        <div class="mb-4">
                                            <p class="text-gray-700"><strong class="text-sky-500">Preferred Date & Time:</strong> <span class='bg-yellow-400 px-2 py-1 rounded '>${item.preferred_date} (${item.preferred_time})</span></p>
                                        </div>

                                        <div class="mb-4">
                                            <p class="text-gray-700"><strong class="text-sky-500">Requirements:</strong> ${item.requirements}</p>
                                        </div>

                                        <div class="mb-4">
                                            <p class="text-gray-700"><strong class="text-sky-500">Mobile No.:</strong> ${item.mobileno}</p>
                                            <p class="text-gray-700"><strong class="text-sky-500">Complain No.:</strong> <span class='bg-red-600 px-2 py-1 rounded text-white'>${item.complain_no}</span></p>
                                        </div>

                                        <div class="mb-4">
                                            <p class="text-gray-700"><strong class="text-sky-500">Address:</strong> ${item.address}</p>
                                            <p class="text-gray-700"><strong class="text-sky-500">City:</strong> ${item.city}</p>
                                            <p class="text-gray-700"><strong class="text-sky-500">Landmark:</strong> ${item.landmark}</p>
                                        </div>

                                        <div>
                                            <p class="text-gray-700"><strong class="text-sky-500">Status:</strong> 
                                            <span class="${
                                                item.status === 'process' ? 'font-bold text-xl text-yellow-500' : 
                                                item.status === 'reject' ? 'font-bold text-xl text-red-500' : 
                                                item.status === 'close' ? 'font-bold text-xl text-white' : 
                                                'font-bold text-xl text-green-600'
                                            }">
                                                ${item.status.charAt(0).toUpperCase() + item.status.slice(1)}
                                            </span></p>
                                        </div>
                                    </div>
                                </div>
                            `);
                        })
                    },
                    error: function(xhr, status, error) {
                        window.location.href = "{{ route('loginRequired') }}"
                    }

                });
            }
            callingAppointment();
        })
    </script>


@endsection
