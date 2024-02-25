@extends('homepage.layout')

@section('content')
    <div class=" mx-auto px-5 py-10">
        <div class="flex items-center gap-5 flex-1">
            <div class="flex-1">
                <h2 class="text-2xl font-semibold mb-5">What you Looking For?</h2>

                <div class="grid grid-cols-1 gap-2" id="serviceList">
                    <!-- Services will be loaded here dynamically -->
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
