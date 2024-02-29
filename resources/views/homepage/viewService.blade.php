@extends('homepage.layout')

@section("title")
{{$service->name . "-" . env("APP_NAME") . " | Book Expert Home Appalince Online | Purnea."}}
@endsection

@section("description", $service->description)


@section('content')
    <div class="flex flex-col">
        <div class="w-full">
            <div class="bg-black bg-opacity-50">
                <div class="relative w-full h-auto">
                    <img src="/images/ac_rep.jpg" alt="Background Image" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-65 rounded-t-lg"></div>
                    <div class="absolute inset-0 flex flex-col gap-3 items-start px-10 justify-center">
                        <h1 class="text-white text-xl md:text-4xl font-bold" id="serviceName">{{ $service->name }}</h1>
                        <p class="line-clamp-2 text-white" id="serviceDescription">{{ $service->description }}</p>
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 mt-2">
                            <div class="rounded-lg flex items-center space-x-1">
                                <i class="fa-solid fa-circle-check text-green-400"></i>
                                <span class="text-slate-100 text-sm">No Extra Cost</span>
                            </div>
                            <div class="rounded-lg flex items-center space-x-1">
                                <i class="fa-solid fa-circle-check text-green-400"></i>
                                <span class="text-slate-100 text-sm">Free Inspection</span>
                            </div>
                            <div class="rounded-lg flex items-center space-x-1">
                                <i class="fa-solid fa-circle-check text-green-400"></i>
                                <span class="text-slate-100 text-sm">15 days Warranty *</span>
                            </div>
                            <div class="rounded-lg flex items-center space-x-1">
                                <i class="fa-solid fa-circle-check text-green-400"></i>
                                <span class="text-slate-100 text-sm">Expert Technicians</span>
                            </div>
                        </div>
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
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-400 hover:border-gray-300 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#rate" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">Our Pricing</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-400 hover:border-gray-300 dark:hover:text-gray-300"
                                id="settings-tab" data-tabs-target="#faq" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">FAQ's</button>
                        </li>

                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="book" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <form method="get" action="{{ route('home.bookAppointment', $service->slug) }}">
                            <div class="mb-3 flex flex-col">
                                <label for="date" class="text-sm font-semibold">When do you Need service?</label>
                                <select name="date" id="date" class="border border-slate-200 mt-2 px-3 py-2">
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

                                <div class="flex flex-col border p-2 items-center">
                                    <p class="text-xs">OR Book Via Call (9AM to 6PM)</p>
                                    <a href="tel:8425499874" class="text-indigo-900 text-xl font-bold"><i
                                            class="fa-solid fa-phone"></i> 72-800-800-80</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="rate" role="tabpanel"
                        aria-labelledby="dashboard-tab">

                        <div class="bg-green-500 rounded-md text-white px-3 py-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                            </svg>

                            <p>Our onsite Inspection is 100% free to give estimated cost for job.</p>
                        </div>

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

                                            <span class="capitalize flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>


                                                {{ $item->service_fees_name }}</span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
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
                        <p class="text-bold text-black">Q. Do we offer any VISIT / Inspection Charge for Air Conditioner
                            Repair Service?</p>
                        <p class="text-sm mt-2">Ans: No we don't charge any amount to visit your home and quote price for
                            repair after getting quote you can decide to get repair done or not.</p>
                    </div>
                </div>
            </div>
            <div class="mt-5 px-10 md:px-5">
                <h4 class=" mt-5 mb-3 text-xl md:text-2xl font-bold">Top Reasons to Book AC Repair service in Purnea with
                    JustRepair.
                </h4>

                <ul class="flex flex-col gap-3 list-disc text-justify pb-20">
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
