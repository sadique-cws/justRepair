@extends('homepage.layout')

@section('content')
    <div class="flex px-10 flex-1">
        <form action="" id="createAppointment" class="flex-1">
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
            <div class="mt-3 w-full">
                <h6>When You Need It ?</h6>

                <div id="calling_requirement">

                </div>

                <div class="mt-3">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Preferred Date and Time</h3>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5  flex items-center">
                                        <label for="date" class="text-sm font-medium text-gray-500 flex-1">Preferred
                                            Date</label>
                                    <div class="mt-1 flex-[10] text-sm text-gray-900">
                                        <select name="date" id="date" class="border border-slate-200">
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
                                <div class=" px-4 py-5 flex flex-1">
                                        <label for="time" class="text-sm flex-1 font-medium text-gray-500">Preferred
                                            Time</label>
                                    <div class="flex  flex-[10] justify-start gap-4">
                                        <div class=" flex items-start">
                                            <input id="9am10am" type="radio" class="hidden peer" name="time" value="9am10am">
                                            <label for="9am10am" class="inline-flex items-center  rounded-2xl justify-between py-1 px-2 font-medium tracking-tight border cursor-pointer bg-brand-light text-brand-black border-green-500 peer-checked:border-green-400 peer-checked:bg-green-700 peer-checked:text-white text-sm">
                                                <div class="flex items-center justify-center w-full">
                                                    <div class="text-sm text-brand-black">9 AM - 10 AM</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class=" flex items-start">
                                            <input id="9am10am" type="radio" class="hidden peer" name="time" value="9am10am">
                                            <label for="9am10am" class="inline-flex items-center  rounded-2xl justify-between py-1 px-2 font-medium tracking-tight border cursor-pointer bg-brand-light text-brand-black border-green-500 peer-checked:border-green-400 peer-checked:bg-green-700 peer-checked:text-white text-sm">
                                                <div class="flex items-center justify-center w-full">
                                                    <div class="text-sm text-brand-black">9 AM - 10 AM</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class=" flex items-start">
                                            <input id="9am10am" type="radio" class="hidden peer" name="time" value="9am10am">
                                            <label for="9am10am" class="inline-flex items-center  rounded-2xl justify-between py-1 px-2 font-medium tracking-tight border cursor-pointer bg-brand-light text-brand-black border-green-500 peer-checked:border-green-400 peer-checked:bg-green-700 peer-checked:text-white text-sm">
                                                <div class="flex items-center justify-center w-full">
                                                    <div class="text-sm text-brand-black">9 AM - 10 AM</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class=" flex items-start">
                                            <input id="9am10am" type="radio" class="hidden peer" name="time" value="9am10am">
                                            <label for="9am10am" class="inline-flex items-center  rounded-2xl justify-between py-1 px-2 font-medium tracking-tight border cursor-pointer bg-brand-light text-brand-black border-green-500 peer-checked:border-green-400 peer-checked:bg-green-700 peer-checked:text-white text-sm">
                                                <div class="flex items-center justify-center w-full">
                                                    <div class="text-sm text-brand-black">9 AM - 10 AM</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class=" flex items-start">
                                            <input id="9am10am" type="radio" class="hidden peer" name="time" value="9am10am">
                                            <label for="9am10am" class="inline-flex items-center  rounded-2xl justify-between py-1 px-2 font-medium tracking-tight border cursor-pointer bg-brand-light text-brand-black border-green-500 peer-checked:border-green-400 peer-checked:bg-green-700 peer-checked:text-white text-sm">
                                                <div class="flex items-center justify-center w-full">
                                                    <div class="text-sm text-brand-black">9 AM - 10 AM</div>
                                                </div>
                                            </label>
                                        </div>
                                       
                                    </div>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h6 class="font-bold">Your Details</h6>
                <div class="mt-3">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Personal Information</h3>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt>
                                        <label for="full_name" class="text-sm font-medium text-gray-500">Full Name</label>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                        <input type="text" id="full_name" name="full_name" class="form-input"
                                            placeholder="Your Name">
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt>
                                        <label for="mobile_no" class="text-sm font-medium text-gray-500">Mobile No.</label>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                        <input type="tel" id="mobile_no" name="mobile_no" class="form-input"
                                            placeholder="Mobile No.">
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt>
                                        <label for="address" class="text-sm font-medium text-gray-500">Address</label>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                        <textarea id="address" name="address" class="form-textarea" rows="3" placeholder="Address"></textarea>
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt>
                                        <label for="landmark" class="text-sm font-medium text-gray-500">Landmark</label>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                        <input type="text" id="landmark" name="landmark" class="form-input"
                                            placeholder="Landmark">
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt>
                                        <label for="city" class="text-sm font-medium text-gray-500">City</label>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                        <input type="text" id="city" name="city" class="form-input"
                                            placeholder="City">
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <div class="sm:col-span-2 sm:flex sm:justify-end">
                                        <button type="submit"
                                            class="btn btn-outline-success rounded-pill w-full sm:w-auto">Submit
                                            Booking</button>
                                    </div>
                                </div>
                            </dl>
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

                $.ajax({
                    type: "POST",
                    url: '{{ route('appointment.store') }}',
                    data: $('#createAppointment').serialize(),
                    success: function(response) {
                        alert(response.msg)
                        $("#createAppointment").trigger("reset");
                    }
                });
            });


        });
    </script>
@endsection
