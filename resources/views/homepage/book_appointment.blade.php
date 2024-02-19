@extends('homepage.layout')

@section('content')
    <div class="flex px-10 flex-1">
        <form action="" method="post" id="createAppointment" class="flex-1">
            <div class="row">
                <div class="flex mt-3 flex-col">
                    <h6>You are Booking</h6>
                    <div class=" flex">
                        <div class="card-body p-2 flex">
                            <img src="/icons/ac2.png" height="50px" width="50px" alt="" class="rounded">
                            <div class="ml-5">
                                <h6>Refrigertaor Repair <br> in <b>Repair & Maintenance</b></h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class=" w-full">
                <h6 class="text-sm font-semibold">When You Need It ?</h6>

                <div id="calling_requirement" class="flex w-full gap-10"></div>

                <div class="mt-3">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="">
                            <h3 class="text-sm font-semibold">Preferred Date and Time</h3>
                        </div>
                        <div class="flex items-center flex-col md:flex-row my-3">
                            <div class="bg-white px-5 flex-[0.5]  flex items-center">
                                <label for="date" class="text-sm font-medium text-gray-500 flex-1">Preferred
                                    Date</label>
                                <div class="mt-1 flex-[3] text-sm text-gray-900">
                                    <select name="preferred_date" id="date" class="border border-slate-200">
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
                            <div class="flex flex-1 justify-center">
                                <label for="time" class="text-sm flex-1 font-medium text-gray-500">Preferred
                                    Time</label>
                                <div class="flex  flex-[5] justify-start gap-4">

                                    @php
                                        $time = ['09 AM - 11 AM', '11 AM - 01 PM', '01 PM - 03 PM', '03 PM - 05 PM', '05 PM - 07 PM'];
                                    @endphp

                                    @foreach ($time as $item)
                                        <div class=" flex items-start">
                                            <input id="{{ $loop->index }}" type="radio" class="hidden peer"
                                                name="preferred_time" value="{{ $item }}">
                                            <label for="{{ $loop->index }}"
                                                class="inline-flex items-center  rounded-2xl justify-between py-1 px-2 font-medium tracking-tight border cursor-pointer bg-brand-light text-brand-black border-green-500 peer-checked:border-green-400 peer-checked:bg-green-700 peer-checked:text-white">
                                                <div class="flex items-center justify-center w-full">
                                                    <div class="text-xs text-brand-black">{{ $item }}</div>
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
            <div class="mt-3 pb-10">
                <h6 class="font-bold">Your Details</h6>
                <div class="mt-3">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <h3 class="text-sm font-semibold">Personal Information</h3>
                        <div class="flex flex-col gap-4">
                            <div class="flex gap-3">
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="full_name" class="text-sm font-medium text-gray-500">Full Name</label>
                                    <input type="text" id="full_name" name="fullname" class="border"
                                        placeholder="Your Name">
                                </div>
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="mobile_no" class="text-sm font-medium text-gray-500">Mobile
                                        No.</label>
                                    <input type="tel" id="mobile_no" name="mobileno" class="border"
                                        placeholder="Mobile No.">
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="address" class="text-sm font-medium text-gray-500">Address</label>
                                    <input type="text" id="address" name="address" class="" rows="3"
                                        placeholder="Address">
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="city" class="text-sm font-medium text-gray-500">City</label>
                                    <input type="text" id="city" name="city" class="border" placeholder="City">
                                </div>
                                <div class="bg-white flex flex-1 flex-col">
                                    <label for="landmark" class="text-sm font-medium text-gray-500">Landmark</label>
                                    <input type="text" id="landmark" name="landmark" class="border"
                                        placeholder="Landmark">
                                </div>
                            </div>


                            <div class="flex gap-3 flex-1 mt-4">
                                <button type="submit" class="bg-indigo-700 px-3 py-2 rounded fixed bottom-0 w-[94%]">Submit
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
                    url: `{{ route('service.show', $service->id) }}`,
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
                                    <h6 class="text-mutes text-sm text-red-500"> Requirement not found </h6>
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
                try {
                    $.ajax({
                        type: "POST",
                        url: '{{ route('appointment.store') }}',
                        data: $('#createAppointment').serialize(),
                        success: function(response) {
                            alert(response.msg)
                            $("#createAppointment").trigger("reset");
                        }
                    });
                } catch (error) {
                    console.error("An error occurred:", error);
                }
            });


        });
    </script>
@endsection
