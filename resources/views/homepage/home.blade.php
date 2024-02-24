@extends('homepage.layout')

@section('content')
    <div class="container mx-auto px-5 py-10">
        <div class="flex items-stretch gap-5 md:flex-row flex-col ">
            <div class="md:flex-[2] ">
                <h2 class="text-2xl font-semibold mb-5">Trending Services in Purnea</h2>

                <div class="grid grid-cols-2 md:grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-5" id="serviceList">
                    <!-- Services will be loaded here dynamically -->
                </div>
            </div>
            <div class="flex-1 md:h-auto w-full overflow-hidden">
                <img src="{{ asset("images/banner.jfif") }}" alt="Banner Image" class="w-full object-cover object-top rounded-lg shadow-md h-48 md:h-auto
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
                                <a href="/view/${item.id}" class="flex flex-col items-center ${colorClass} p-4 rounded-lg shadow-md hover:bg-gray-100 transition duration-300">
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
