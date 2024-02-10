@extends('homepage.layout')

@section('content')
    <div class="flex justify-center flex-1 mt-5">
        <div class=" w-full px-10">
            <h2 class="font-semibold my-3">Trending Services in Purnea</h2>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5 flex-wrap">

                <div class="flex-1 ">
                    <a href="" class="flex flex-col items-center gap-2 hover:bg-slate-100 bg-slate-50 px-2 py-4 rounded-lg">
                    <img  class="max-w-16" src="{{asset('icons/ac.png')}}" alt="">
                    <h3 class="text-xs">Air Condition Repair</h3>
                    </a>
                </div>

                <div class="flex-1">
                    <a href="" class="flex flex-col items-center gap-2  hover:bg-slate-100 bg-slate-50 px-2 py-4 rounded-lg">
                    <img  class="max-w-16" src="{{asset('icons/washing_machine.png')}}" alt="">
                    <h3 class="text-xs">Washing Machine Repair</h3>
                    </a>
                </div>

                <div class="flex-1">
                    <a href="" class="flex flex-col items-center gap-2  hover:bg-slate-100 bg-slate-50 px-2 py-4 rounded-lg">
                    <img  class="max-w-16" src="{{asset('icons/water_purefier.png')}}" alt="">
                    <h3 class="text-xs">Water Purifier Repair</h3>
                    </a>
                </div>

                <div class="flex-1">
                    <a href="" class=" flex flex-col items-center gap-2  hover:bg-slate-100 bg-slate-50 px-2 py-4 rounded-lg">
                    <img  class="max-w-16" src="{{asset('icons/fridge.png')}}" alt="">
                    <h3 class="text-xs">Refrigerator Repair</h3>
                    </a>
                </div>

                <div class="flex-1 ">
                    <a href="" class="flex flex-col items-center gap-2  hover:bg-slate-100 bg-slate-50 px-2 py-4 rounded-lg">
                    <img  class="max-w-16" src="{{asset('icons/gyeser.png')}}" alt="">
                    <h3 class="text-xs"> Gyeser Repair</h3>
                    </a>
                </div>

                <div class="flex-1 ">
                    <a href="" class="flex flex-col items-center gap-2  hover:bg-slate-100 bg-slate-50 px-2 py-4 rounded-lg">
                    <img  class="max-w-16" src="{{asset('icons/home_appliance.png')}}" alt="">
                    <h3 class="text-xs">Home Appliance Repair</h3>
                </a>
                </div>

            </div>
        </div>
    </div>
@endsection
