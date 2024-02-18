@extends('homepage.layout')

@section('content')
    <div class="container">
        <form action="" id="createAppointment">
            <div class="row">
                <div class="col-12 mt-3">
                    <h6>You are Booking</h6>
                    <div class="card mb-3 mt-3">
                        <div class="card-body p-2 d-flex">
                            <img src="/icons/ac2.png" height="50px" width="50px" alt="" class="rounded">
                            <div class="ml-5">
                                <h6>Refrigertaor Repair <br> in <b>Repair & Maintenance</b></h6>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <h6>Requirement(s)</h6>
                    <div class="card mb-3 mt-3">
                        <div class="card-body p-2 d-flex py-3" id="calling_requirement">
                            {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="checkbox1">
                                <label class="form-check-label" for="checkbox1">Refrigeratir Repair</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="checkbox1">
                                <label class="form-check-label" for="checkbox1">Refrigerator Gas Filing</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="checkbox1">
                                <label class="form-check-label" for="checkbox1">Any Other Refrigerator Related
                                    issues</label>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <h6>When You Need It ?</h6>
                    <div class="card  mt-3">
                        <div class="card-body p-2 d-flex">
                            <div class="col-6">
                                <label for=""><b class="text-primary">Preffered Date</b></label>
                                <select name="date" class="form-select mt-2">
                                    <option value="{{ \Carbon\Carbon::now()->toDateString() }}" selected>Today</option>
                                    @for ($i = 1; $i <= 7; $i++)
                                        <option value="{{ \Carbon\Carbon::now()->addDays($i)->toDateString() }}">
                                            {{ \Carbon\Carbon::now()->addDays($i)->format('D d M') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-6 ml-2">
                                <label for=""><b class="text-success">Preffered Time</b></label>
                                <div class="row">
                                    <div class="col mt-2">

                                        <input type="button" class="btn btn-outline-success rounded-pill mt-1"
                                            value="9:00 AM - 10:00 AM">
                                        <input type="button" class="btn btn-outline-success rounded-pill mt-1"
                                            value="10:00 AM - 11:00 AM">
                                        <input type="button" class="btn btn-outline-success rounded-pill mt-1"
                                            value="9:00 AM - 10:00 AM">
                                        <input type="button" class="btn btn-outline-success rounded-pill mt-1"
                                            value="9:00 AM - 10:00 AM">
                                        <input type="button" class="btn btn-outline-success rounded-pill mt-1"
                                            value="9:00 AM - 10:00 AM">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <h6 class="fw-bold">Your Details </h6>
                    <div class="card mb-3 mt-3">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="" class="fw-bold">Full Name</label>
                                        <input type="text" placeholder="Your Name" class="form-control w-100">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="" class="fw-bold">Mobile No.</label>
                                        <input type="tel" placeholder="Mobile No." class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class=" mb-3">
                                        <label for="" class="fw-bold">Address</label>
                                        <textarea class="form-control" placeholder="Address" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-8">
                                    <label for="" class="fw-bold">Landmark</label>
                                    <input type="text" class="form-control" placeholder="Landmark">
                                </div>
                                <div class="col-4 ">
                                    <label for="" class="fw-bold">City</label>
                                    <input type="text" placeholder="City" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 ">
                                    <button type="submit" class="btn btn-outline-success rounded-pill w-100">Submit
                                        Booking</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


        </form>
    </div>

<script>
    $(document).ready(function(){

        function calling_requirement(){
            $.ajax({
                    url: `{{ route('service.show', 2) }}`,
                    type: "GET",
                    success: function(response) {
                        let reqList = $("#calling_requirement")
                        reqList.empty();
                        let services = response?.requirements;
                   
                    services.forEach((item) => {
                        reqList.append(`
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="checkbox1">
                                <label class="form-check-label" for="checkbox1">${item.req_name}</label>
                            </div>
                        `);
                    });             
                },
                error:function(error){
                    console.log(error);
                }
            })
           }
           calling_requirement();


        });

        $("#createAppointment").submit(function(e){
            e.preventDefault();

            $.ajax({
                type:"POST",
                url:'{{route('appointment.store')}}',
                data:$('#createAppointment').serialize(),
                success:function(response){
                    alert(response.msg)
                    $("#createAppointment").trigger("reset");
                }
            });
        });
</script>

@endsection
