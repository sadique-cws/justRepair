@extends('homepage.layout')


@section("title", "Book Appointment - JustRepair | Book Expert Home Appalince Online | Purnea.")

@section("description", "Schedule a repair service appointment with JustRepair for your appliances. Choose your preferred date and time, and our experts will take care of the rest.")


@section('content')
    <div class="flex md:px-10 px-3 flex-1">
        <form action="" id="createAppointment" method="post" class="flex-1 mb-20">
            <div class="row">
                <div class="flex mt-3 flex-col">
                    <h6>You are Booking</h6>
                    <div class=" flex">
                        <div class="card-body p-2 flex">
                            <img src="{{asset("uploads/".$service->icon)}}" height="50px" width="50px" alt="" class="rounded">
                            <div class="ml-5">
                                <h6>
                                    <span class="text-xl font-semibold">{{$service->name}}</span>
                                    <br> in <b>Repair & Maintenance</b></h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class=" w-full mt-3 ">
                <div class="bg-white shadow p-2 border border-slate-200 overflow-hidden sm:rounded-lg">
                <h6 class="text-sm font-semibold">When You Need It ?</h6>

                <div id="calling_requirement" class="flex flex-col md:flex-row w-full gap-0 md:gap-5 mt-3"></div>
            </div>
                <div class="mt-3">
                    <div class="bg-white shadow p-2 border border-slate-200 overflow-hidden sm:rounded-lg">
                        <div class="">
                            <h3 class="text-sm font-semibold">Preferred Date and Time</h3>
                        </div>
                        <div class="flex flex-col my-3 gap-3">
                            <div class="bg-white gap-3  flex items-center">
                                <label for="date" class="text-sm font-medium text-gray-700 flex-1 text-nowrap">Preferred
                                    Date</label>
                                <div class="mt-1 flex-[3] text-sm text-gray-900">
                                    <select name="preferred_date" id="date" class="border border-slate-200 border border-slate-200-slate-200 px-3 py-2">
                                        <option value="{{ \Carbon\Carbon::now()->toDateString() }}" selected>Today
                                        </option>
                                        @for ($i = 1; $i <= 7; $i++)
                                            <option value="{{ \Carbon\Carbon::now()->addDays($i)->toDateString() }}">
                                                {{ \Carbon\Carbon::now()->addDays($i)->format('D d M') }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-1 gap-3 flex-col md:flex-row">
                                <label for="time" class="text-sm flex-1 font-medium text-gray-700">Preferred Time</label>
                                <div class="grid lg:flex-[3] lg:grid-cols-10 sm:grid-cols-5 grid-cols-4 justify-start gap-1">
                                    @php
                                        $time = ['09 AM - 11 AM', '11 AM - 01 PM', '01 PM - 03 PM', '03 PM - 05 PM', '05 PM - 07 PM'];
                                    @endphp
                                    @foreach ($time as $item)
                                        <div class="flex md:flex-col md:items-start">
                                            <input id="{{ $loop->index }}" type="radio" class="hidden peer" name="preferred_time" value="{{ $item }}">
                                            <label for="{{ $loop->index }}" class="inline-flex items-center rounded-2xl justify-between py-1 px-2 font-medium tracking-tight border border-slate-200 cursor-pointer bg-brand-light text-brand-black border border-slate-200-green-700 peer-checked:border border-slate-200-green-400 peer-checked:bg-green-700 peer-checked:text-white">
                                                <div class="flex items-center justify-center md:w-full">
                                                    <div class="text-xs text-brand-black text-nowrap">{{ $item }}</div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 pb-10 bg-white shadow p-2 border border-slate-200 overflow-hidden sm:rounded-lg">
                <h6 class="text-sm flex-1 font-medium text-gray-700">Personal Information</h6>
                <div id="errors"></div>
                <div class="mt-3">
                    <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class="flex flex-col gap-4">
                            <div class="flex gap-3">
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="full_name" class="text-sm font-medium text-gray-700">Full Name</label>
                                    <input type="text" id="full_name" name="fullname" class="border border-slate-200"
                                        placeholder="Your Name">
                                    <input type="hidden" value="{{$service->id}}" id="service_id" name="service_id"
                                        class="d-flex">
                                </div>
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="mobile_no" class="text-sm font-medium text-gray-700">Mobile
                                        No.</label>
                                    <input type="tel" id="mobile_no" name="mobileno" class="border border-slate-200"
                                        placeholder="Mobile No.">
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="address" class="text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" id="address" name="address" class="border border-slate-200" rows="3"
                                        placeholder="Address">
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="city" class="text-sm font-medium text-gray-700">City</label>
                                    <input type="text" id="city" name="city" class="border border-slate-200" placeholder="City">
                                </div>
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="landmark" class="text-sm font-medium text-gray-700">Landmark</label>
                                    <input type="text" id="landmark" name="landmark" class="border border-slate-200"
                                        placeholder="Landmark">
                                </div>
                            </div>


                            <div class="flex gap-3 flex-1 mt-4">
                                <button type="submit" class="bg-indigo-700 px-3 py-2 rounded text-white w-full">Submit
                                    Booking</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const requirements = urlParams.getAll('requirements[]');
            const dateParam = urlParams.get('date');

            // Select the <select> element
            const dateSelect = document.getElementById('date');

            let callingReq = () => {

                $.ajax({
                    url: `{{ route('service.show', $service->slug) }}`,
                    type: "GET",
                    success: function(response) {
                        let reqList = $("#calling_requirement")
                        reqList.empty();
                        let services = response?.requirements;
                        if (services) {
                            services.forEach((item) => {
                                reqList.append(`
                            <div class="mb-1">
                                <input type="checkbox" name='requirements[]' value="${item.req_name}">
                                <label for="" class='text-sm font-semibold'>${item.req_name}</label>
                            </div>

                            `)
                            })
                        } else {
                            reqList.append(`
                                <div class="mb-1">
                                    <h6 class="text-mutes text-sm text-red-700"> Requirement not found </h6>
                                </div>
                            `)
                        }

                        // Check checkboxes that match the requirements
                        $('input[type="checkbox"]').each(function() {
                            if (requirements.includes($(this).val())) {
                                $(this).prop('checked', true);
                            }
                        });

                        // Loop through each <option> element and set the selected attribute if its value matches the date parameter
                        for (let i = 0; i < dateSelect.options.length; i++) {
                            if (dateSelect.options[i].value === dateParam) {
                                dateSelect.options[i].selected = true;
                                break; // Exit the loop once the option is found and selected
                            }
                        }
                    }
                });
            }
            callingReq();
            // insert code
            $("#createAppointment").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '{{ route('appointment.store') }}',
                    data: $('#createAppointment').serialize(),
                    success: function(response) {
                        $("#createAppointment").trigger("reset");
                        let id = response.data.id
                        localStorage.setItem('id', id);
                        window.open("{{ route('confirmed_appointment') }}", "_self");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText)
                        // Handle error response
                        if (xhr.responseJSON.errors) {
                            var errorsHtml =

                                '<ul class="bg-red-100 border border-slate-200 border border-slate-200-red-400 text-red-700 px-4 py-3 rounded relative">';
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                errorsHtml += '<li>' + value[0] +
                                    '</li>'; // Assuming only one error per field
                            });
                            errorsHtml += '</ul>';

                            $('#errors').html(errorsHtml);
                        } else {
                            console.error(
                                'Failed to book appointment. Please check your input.');
                        }
                    }
                });
            });


            // mobile no check
            // $('#mobile_no').on('keydown', function(e) {
            //     var maxLength = 10;
            //     if ($(this).val().length >= maxLength && e.keyCode !== 8) {
            //         e.preventDefault();
            //     }
            // });

            $('#mobile_no').on('keydown', function(e) {
                var maxLength = 10;
                if ($(this).val().length >= maxLength) {
                    $(this).next('input').focus();
                }
            });


        });
    </script>
@endsection
