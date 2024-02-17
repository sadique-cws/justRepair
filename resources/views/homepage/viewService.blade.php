@extends('homepage.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-bg-img bg-img mt-2 bg-cover mb-1"
                    style="background-image:url('/images/ac_rep.jpg'); background-repeat:no-repeat; ">
                    <div class="card-body py-4 px-3">
                        <h1 class="text-white">Air Condition Repair </h1>
                        <p class="mb-3 text-white">
                            AC Repair/Service, AC AC Repair/Service, AC AC Repair/Service, AC
                        </p>
                        <ul class="list-inline mb-1 text-white">
                            <li class="list-inline-item"><i class="fa-regular fa-circle-check text-success"></i> Low Cost
                            </li>
                            <li class="list-inline-item"><i class="fa-regular fa-circle-check text-success"></i> Low Cost
                            </li>
                            <li class="list-inline-item"><i class="fa-regular fa-circle-check text-success"></i> Low Cost
                            </li>
                            <li class="list-inline-item"><i class="fa-regular fa-circle-check text-success"></i> Low Cost
                            </li>
                            <li class="list-inline-item"><i class="fa-regular fa-circle-check text-success"></i> Low Cost
                            </li>
                        </ul>
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
                                <form>
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="">When do you Need service?</label>
                                        <select name="" id="" class="form-select">
                                            <option value="" selected>Today</option>
                                            <option value="">Tommorow</option>
                                            <option value="">20 feb</option>
                                            <option value="">20 feb</option>
                                            <option value="">20 feb</option>
                                            <option value="">20 feb</option>
                                            <option value="">20 feb</option>
                                        </select>
                                    </div>
                                    <div class="mb-2 ">
                                        <label for="">Requirement(s)</label>
                                        <div class="mt-1 d-flex flex-row gap-3" id="calling_requirement">
                                            <div class="mb-1">
                                                <input type="checkbox" >
                                                <label for="">AC Repair/Service</label>
                                            </div>
                                            <div class="mb-1">
                                                <input type="checkbox">
                                                <label for="">AC Installation/Removal</label>
                                            </div>
                                            <div class="mb-1">

                                                <input type="checkbox">
                                                <label for="">AC Repair/Service</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-success rounded-pill w-100" type="submit"><i
                                                class="fa-solid fa-calendar-days"></i> Book Appointment Online</button>
                                                
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
                <h4>Book Air Conditioner Repair Service in Patna</h4>
                <p class="text-muted text-sm"><strong>SevaMart </strong>provides on-demand, onsite quick and hasslefree AC
                    repair Service in
                    Patna. Our trained expert technicians offers Air Conditioner repair service in Patna at your doorstep.
                    We offer lowcost transparent repair service and dont charge single rupees for inspection or visit,
                    yes book appointment for AC Repair and we provide free home visit/ inspection to provide you estimated
                    repair cost.</p>
                <p class="text-muted text-sm">We provide same day quick service including saturday and sunday and all our
                    repair services come with a 7
                    days repair warranty policy. We promise to revisit and re-check incase your AC is not fully working
                    without any additional charges up to 7 days from the date of first service.</p>
                <h4>Top Reasons to Book AC Repair service in Patna with SevaMart.</h4>
                <p class="text-muted text-sm">Free/ Zero visiting/inspection charges.</p>
                <p class="text-muted text-sm">Same day fastest repair service.</p>
                <p class="text-muted text-sm">7 days repair warranty / cover.</p>
                <p class="text-muted text-sm">Multi brand AC repair service.</p>
                <p class="text-muted text-sm">Doorstep convenient repair service accross Patna.</p>
                <h4>Expert onsite AC repair in Patna.</h4>
                <p class="text-muted text-sm">Our Skilled, trained technicians from SevaMartdo equally quality job as most
                    company service centers as many of them are either trained in authorized Air Conditioner repair centers
                    or have worked for brands in past. Currently we provide AC repair in complete Patna, from patna city, up
                    to Danapur including Boring Road, Bailey Road, Rajendra Nagar, Kankarbagh and other localities in Patna.
                </p>
                <h4>Multibrand AC repair Service Center in Patna.</h4>
                <p class="text-muted text-sm">You can book Air Conditioner repair service for all major brands like Samsung
                    AC repair in Patna, LG AC
                    repair in Patna, Dakin AC, Voltas AC repair in Patna, Whirlpool AC repair in Patna and other Air
                    Conditioner repair in Patna. We are one stop multi brand AC repair Service center in Patna.</p>
                <h4>How to Book AC repair in Patna?</h4>
                <p class="text-muted text-sm">Booking AC repair service in Patna is very easy you can book a appointment
                    for
                    AC servicing with
                    our technician from our website a
                    target="_blank">SevaMart.com also offer Booking an appointment for AC repair in Patna
                    over phone call our helpline no is 7480844888 you
                    can call all days from 8AM to 8PM. If you are an android mobile user you can download our

                    to book AC Repair and other repair services in Patna.
                </p>

            </div>
        </div>
    </div>
<script>
     $(document).ready(function() {
            let callingReq = () => {
                $.ajax({
                    url: `{{ route('admin/service/${id}') }}`,
                    type: "GET",
                    success: function(response) {
                        let serviceList = $("#calling_requirement")
                        serviceList.empty();

                        let services = response;

                        services.forEach( (item) => {
                            serviceList.append(`
                            <div class="mb-1">
                                <input type="checkbox" >
                                <label for="">${items.requirements}</label>
                            </div>

                            `)
                        })
                    }
                });
            }
            callingReq();
        })
</script>


@endsection
