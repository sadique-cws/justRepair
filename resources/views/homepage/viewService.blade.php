@extends('homepage.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="bg-black bg-opacity-50 flex items-center justify-center">
                <div class="relative w-full h-48">
                    <img src="/images/ac_rep.jpg" alt="Background Image" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-65"></div>
                    <div class="absolute inset-0 flex flex-col items-start px-3 justify-center">
                        <!-- Your content goes here -->
                        <h1 class="text-white" id="serviceName">{{ $service->name }}</h1>
                        <p class="mb-3 text-white" id="serviceDescription">{{ $service->description }}</p>
                        <ul class="list-inline mb-1 text-white">
                            {{-- @foreach ($service->features as $feature)
                            <li class="list-inline-item">
                                <i class="fa-solid fa-circle-check text-success"></i> {{ $feature->name }}
                            </li>
                            @endforeach --}}
                        </ul>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Book Free
                                    Visit</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Rate(s)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact"
                                    aria-selected="false">FAQs</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <form action="get">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="">When do you Need service?</label>
                                        <select name="date" class="form-select">
                                            <option value="{{ \Carbon\Carbon::now()->toDateString() }}" selected>Today</option>
                                            @for ($i = 1; $i <= 7; $i++)
                                                <option value="{{ \Carbon\Carbon::now()->addDays($i)->toDateString() }}">
                                                    {{ \Carbon\Carbon::now()->addDays($i)->format('D d M') }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="mb-2 ">
                                        <label for="">Requirement(s)</label>
                                        <div class="mt-1 d-flex flex-row gap-3" id="calling_requirement">
                                           
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <a class="btn btn-success rounded-pill w-100" href="{{route('home.bookAppointment')}}"><i
                                                class="fa-solid fa-calendar-days"></i> Book Appointment Online</a>
                                                
                                    </div>
                                    <div class="mb-2  d-flex justify-content-center align-items-center">
                                        <hr> <p>OR Book Via Call (9AM to 6PM)</p> <hr>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-outline-success rounded-pill w-100" type="submit"><i class="fa-solid fa-phone"></i>      842-547-9874</button>
                                         
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="mb-2 mt-3">
                                    <p class="text-muted text-sm">
                                        Q. Do we offer any VISIT / Inspection Charge for Air Conditioner Repair Service ?
                                    </p>
                                    <p class="text-muted text-sm">
                                        Ans: No we don't charge any amount to visit your home and quote price for repair after getting quote you can decide to get repair done or not.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h4>Book Air Conditioner Repair Service in Purnea</h4>
                <p class="text-muted text-sm"><strong>JustRepair</strong> is your go-to solution for all your repair needs. We specialize in repairing a wide range of appliances, including air conditioners, refrigerators, home appliances, water purifiers, and more. With our team of experienced technicians, we provide efficient and reliable repair services to ensure your appliances are back up and running in no time. Whether it's a minor fix or a major repair, you can trust <strong>JustRepair</strong> to deliver top-notch service at competitive prices. Customer satisfaction is our priority, and we strive to exceed your expectations with every repair</p>
                <p class="text-muted text-sm">We provide same day quick service including saturday and sunday and all our
                    repair services come with a 7
                    days repair warranty policy. We promise to revisit and re-check incase your AC is not fully working
                    without any additional charges up to 7 days from the date of first service.</p>
                <h4>Top Reasons to Book AC Repair service in Purnea with JustRepair.</h4>
                
                <ul class="flex flex-col gap-3 list-disc">
                    <li><strong>Expert Technicians:</strong> Our team consists of skilled technicians who are experts in repairing ACs, refrigerators, home appliances, water purifiers, and more. They have the knowledge and experience to diagnose and fix issues quickly and effectively.</li>
                    <li><strong>Wide Range of Services:</strong> JustRepair offers repair services for a variety of appliances, making us a one-stop solution for all your repair needs. Whether it's a faulty AC, a malfunctioning refrigerator, or a broken water purifier, we've got you covered.</li>
                    <li><strong>Quality Parts:</strong> We use only high-quality parts for repairs to ensure the longevity and performance of your appliances. Our genuine parts help maintain the integrity of your appliance and provide lasting solutions.</li>
                    <li><strong>Prompt Service:</strong> We understand the inconvenience of a malfunctioning appliance, which is why we strive to provide prompt service. Our technicians are quick to respond and work efficiently to get your appliance back in working condition as soon as possible.</li>
                    <li><strong>Transparent Pricing:</strong> At JustRepair, we believe in transparency. We provide upfront pricing for our services, so you know exactly what to expect. There are no hidden costs or surprises, just honest and fair pricing.</li>
                    <li><strong>Customer Satisfaction Guarantee:</strong> Your satisfaction is our priority. We go above and beyond to ensure that our customers are happy with our services. If you're not satisfied, we'll work with you to make it right.</li>
                    <li><strong>Convenient Booking:</strong> Booking a service with JustRepair is easy and convenient. You can book online or by phone, and we'll schedule a service at a time that works best for you.</li>
                    <li><strong>Emergency Services:</strong> For those urgent repair needs, we offer emergency services. Whether it's a broken AC in the middle of summer or a malfunctioning refrigerator, you can count on us to be there when you need us most.</li>
                    <li><strong>Licensed and Insured:</strong> JustRepair is a licensed and insured company, giving you peace of mind knowing that your appliances are in good hands.</li>
                    <li><strong>Locally Owned and Operated:</strong> We are proud to be a locally owned and operated business, serving the community of Purnea, Bihar. Supporting local businesses means supporting your community, and we thank you for choosing JustRepair for your repair needs.</li>
                  </ul>
            </div>
        </div>
    </div>
<script>
     $(document).ready(function() {
            let callingReq = () => {
                $.ajax({
                    url: `{{ route('service.show', 2) }}`,
                    type: "GET",
                    success: function(response) {
                        let reqList = $("#calling_requirement")
                        reqList.empty();
                        let services = response?.requirements;
                        if(services){
                            services.forEach( (item) => {
                            reqList.append(`
                            <div class="mb-1">
                                <input type="checkbox" >
                                <label for="">${item.requirements}</label>
                            </div>

                            `)
                        })
                        }
                        else{
                            reqList.append(`
                                <div class="mb-1">
                                    <h6 class="text-mutes text-sm"> Requirement not found </h6>
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