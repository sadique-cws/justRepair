@extends('homepage.layout')

@section("title")
{{" Our Services List - " . env("APP_NAME") . " | Book Expert Home Appalince Online | Purnea."}}
@endsection

@section("description", "Explore the wide range of repair services offered by JustRepair. From ACs to refrigerators, we provide expert repair solutions for all your home appliances.")


@section('content')
    <div class=" mx-auto py-10">
        <div class="flex items-center gap-5 flex-1">
            <div class="flex-1">
                <h2 class="text-2xl font-semibold mb-5">What you Looking For?</h2>

                <div class="grid grid-cols-1 gap-2" id="serviceList">
                    <!-- Services will be loaded here dynamically -->
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                    <div class="animate-pulse bg-gray-200 rounded-lg shadow-md p-4">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                    </div>
                </div>
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
                                <a href="/view/${item.slug}" class="flex gap-4 items-center ${colorClass} p-4 rounded-lg shadow-md hover:bg-gray-100 transition duration-300">
                                    <img src="/uploads/${item.icon}" alt="${item.name}" class="w-8 h-8 object-cover rounded-full">
                                    <h3 class=" text-sm text-center">${item.name}</h3>
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
