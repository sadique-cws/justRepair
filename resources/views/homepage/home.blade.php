@extends('homepage.layout')

@section('content')
    <div class="flex justify-center flex-1 mt-5">
        <div class=" w-full px-10">
            <h2 class="font-semibold my-3">Trending Services in Purnea</h2>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5 flex-wrap text-decoration-none" id="serviceList">

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let callingServices = () => {
                $.ajax({
                    url: `{{ route('service.index') }}`,
                    type: "GET",
                    success: function(response) {
                        let serviceList = $("#serviceList")
                        serviceList.empty();

                        let services = response;

                        services.forEach( (item) => {
                            serviceList.append(`
                                <div class="flex-1 ">
                                    <a href="view" class="flex flex-col items-center gap-2 hover:bg-slate-100 bg-slate-50 px-2 py-4 rounded-lg">
                                        <img  class="max-w-16" src="/uploads/${item.icon}" alt="">
                                        <h3 class="text-xs text-decoration-none">${item.name}</h3>
                                    </a>
                                </div>

                            `)
                        })
                    }
                });
            }
            callingServices();
        })
    </script>
@endsection
