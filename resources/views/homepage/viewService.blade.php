@extends('homepage.layout')

@section('content')
    <div class="flex flex-col">
        <div class="w-full">
            <div class="bg-black bg-opacity-50">
                <div class="relative w-full h-48">
                    <img src="/images/ac_rep.jpg" alt="Background Image" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-65"></div>
                    <div class="absolute inset-0 flex flex-col items-start px-10 justify-center">
                        <h1 class="text-white md:text-3xl text-xl font-bold" id="serviceName">{{ $service->name }}</h1>
                        <p class="mb-3 md:flex hidden text-white" id="serviceDescription">{{ $service->description }}</p>
                        <ul class="list-inline mb-1 text-white">
                            <li class="list-inline-item">
                                <i class="fa-solid fa-circle-check text-green-200"></i> No Extra Cost
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:px-2 md:px-10">
            <div class="mt-5">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                data-tabs-target="#book" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Book Free Visit</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#rate" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">Our Pricing</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="settings-tab" data-tabs-target="#faq" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">FAQ's</button>
                        </li>

                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="book" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <form method="get" action="{{ route('home.bookAppointment',$service->slug) }}">
                            <div class="mb-3 flex flex-col">
                                <label for="date" class="text-sm font-semibold">When do you Need service?</label>
                                <select name="date" id="date" class="border border-slate-200 mt-2">
                                    <option value="{{ \Carbon\Carbon::now()->toDateString() }}" selected>Today</option>
                                    @for ($i = 1; $i <= 7; $i++)
                                        <option value="{{ \Carbon\Carbon::now()->addDays($i)->toDateString() }}">
                                            {{ \Carbon\Carbon::now()->addDays($i)->format('D d M') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-2 ">
                                <label for="calling_requirement" class="text-sm font-semibold">Requirement(s)</label>
                                <div class="mt-3 flex flex-col md:flex-row g-4 md:gap-10" id="calling_requirement">

                                </div>
                            </div>
                            <div class="my-5 flex flex-col md:flex-row items-stretch md:items-center gap-3 md:gap-10">
                                <button type="submit"
                                    class="bg-indigo-700 hover:bg-indigo-900 text-white px-3 py-5  shadow-md"><i
                                        class="fa-solid fa-calendar-days"></i> Book Appointment Online</button>

                                <div class="flex flex-col border p-2">
                                    <p class="text-xs">OR Book Via Call (9AM to 6PM)</p>
                                    <a href="tel:8425499874" class="text-indigo-900 text-xl font-bold"><i
                                            class="fa-solid fa-phone"></i> 842-547-9874</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="rate" role="tabpanel"
                        aria-labelledby="dashboard-tab">

                        <div id="accordion-flush" data-accordion="collapse"
                            data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                            data-inactive-classes="text-gray-500 dark:text-gray-400">
                            @foreach ($service->servicefees as $item)
                                @if (!$item->parent_id)
                                    <h2 id="accordion-flush-heading-{{ $item->id }}">
                                        <button type="button"
                                            class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                            data-accordion-target="#accordion-flush-body-{{ $item->id }}"
                                            aria-expanded="true" aria-controls="accordion-flush-body-{{ $item->id }}">
                                            <span class="capitalize">{{ $item->service_fees_name }}</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-flush-body-{{ $item->id }}" class="hidden"
                                        aria-labelledby="accordion-flush-heading-{{ $item->id }}">
                                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                            @foreach ($item->subfees as $subitem)
                                                <span class="flex justify-between text-sm bg-slate-200 p-2 rounded">
                                                    <span>{{ $loop->index + 1 }}. {{ $subitem->service_fees_name }}</span>
                                                    <span>₹{{ $subitem->service_fees }}</span>
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>


                    </div>

                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="faq" role="tabpanel"
                        aria-labelledby="contacts-tab">
                        {{-- faq --}}
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h4 class=" mt-5 mb-3 text-2xl font-bold">Top Reasons to Book AC Repair service in Purnea with JustRepair.
                </h4>

                <ul class="flex flex-col gap-3 list-disc">
                    <li><strong>Expert Technicians:</strong> Our team consists of skilled technicians who are experts in
                        repairing ACs, refrigerators, home appliances, water purifiers, and more. They have the knowledge
                        and experience to diagnose and fix issues quickly and effectively.</li>
                    <li><strong>Wide Range of Services:</strong> JustRepair offers repair services for a variety of
                        appliances, making us a one-stop solution for all your repair needs. Whether it's a faulty AC, a
                        malfunctioning refrigerator, or a broken water purifier, we've got you covered.</li>
                    <li><strong>Quality Parts:</strong> We use only high-quality parts for repairs to ensure the longevity
                        and performance of your appliances. Our genuine parts help maintain the integrity of your appliance
                        and provide lasting solutions.</li>
                    <li><strong>Prompt Service:</strong> We understand the inconvenience of a malfunctioning appliance,
                        which is why we strive to provide prompt service. Our technicians are quick to respond and work
                        efficiently to get your appliance back in working condition as soon as possible.</li>
                    <li><strong>Transparent Pricing:</strong> At JustRepair, we believe in transparency. We provide upfront
                        pricing for our services, so you know exactly what to expect. There are no hidden costs or
                        surprises, just honest and fair pricing.</li>
                    <li><strong>Customer Satisfaction Guarantee:</strong> Your satisfaction is our priority. We go above and
                        beyond to ensure that our customers are happy with our services. If you're not satisfied, we'll work
                        with you to make it right.</li>
                    <li><strong>Convenient Booking:</strong> Booking a service with JustRepair is easy and convenient. You
                        can book online or by phone, and we'll schedule a service at a time that works best for you.</li>
                    <li><strong>Emergency Services:</strong> For those urgent repair needs, we offer emergency services.
                        Whether it's a broken AC in the middle of summer or a malfunctioning refrigerator, you can count on
                        us to be there when you need us most.</li>
                    <li><strong>Licensed and Insured:</strong> JustRepair is a licensed and insured company, giving you
                        peace of mind knowing that your appliances are in good hands.</li>
                    <li><strong>Locally Owned and Operated:</strong> We are proud to be a locally owned and operated
                        business, serving the community of Purnea, Bihar. Supporting local businesses means supporting your
                        community, and we thank you for choosing JustRepair for your repair needs.</li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let callingReq = () => {
                $.ajax({
                    url: `{{ route('service.show', request()->segment(2)) }}`,
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
                    }
                });
            }
            callingReq();
        })
    </script>
@endsection