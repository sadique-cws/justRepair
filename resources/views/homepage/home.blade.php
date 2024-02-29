@extends('homepage.layout')

@section("title", "JustRepair | Book Expert Home Appalince Online | Purnea.")

@section("description", "JustRepair Service
We are a team of experienced electronics repair technicians dedicated to providing high-quality repair services for all your electronic devices. From ACs and washing machines to coolers and beyond, we've got you covered. Our mission is to ensure that you can enjoy your devices hassle-free, without worrying about malfunctions or breakdowns.")


@section('content')
    <div class=" mx-auto px-5 py-10">
        <div class="flex items-center gap-5 md:flex-row flex-col ">
            <div class="flex-1">
                <h2 class="text-2xl font-semibold mb-5">What you Looking For?</h2>

                <div class="grid grid-cols-2 md:grid-cols-2 sm:grid-cols-3 lg:grid-cols-2 gap-5" id="serviceList">
                    <!-- Services will be loaded here dynamically -->
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-16 h-16 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-16 h-16 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-16 h-16 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-16 h-16 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-16 h-16 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-16 h-16 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                </div>
            </div>
            <div class="flex-1 md:h-auto w-full overflow-hidden">
                <img src="{{ asset("images/banner.jfif") }}" alt="Banner Image" class="w-full object-cover object-top rounded-lg shadow-md md:mt-10 h-[400px] 
                ">
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
                        let serviceList = $("#serviceList");
                        serviceList.empty();

                        response.forEach( (item, index) => {
                            let colors = ['bg-blue-200', 'bg-green-200', 'bg-yellow-200', 'bg-pink-200', 'bg-purple-200'];
                            let colorClass = colors[index % colors.length];

                            serviceList.append(`
                                <a href="/view/${item.slug}" class="flex flex-col items-center ${colorClass} p-4 rounded-lg shadow-md hover:bg-gray-100 transition duration-300">
                                    <img src="/uploads/${item.icon}" alt="${item.name}" class="w-16 h-16 object-cover rounded-full">
                                    <h3 class="mt-2 text-sm text-center">${item.name}</h3>
                                </a>
                            `)

                            
                        })
                    }
                });
            }
            callingServices();
        })
    </script>
@endsection
