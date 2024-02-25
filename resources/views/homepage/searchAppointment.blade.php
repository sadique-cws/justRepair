@extends('homepage.layout')

@section('content')

<div class="max-w-lg mx-auto bg-white p-8 rounded shadow mt-5">
    <h1 class="text-2xl font-bold mb-4">Search Appointments</h1>
    <form action="#" method="GET" id="searchForm">
        <div class="flex mb-4">
            <input type="text" name="search" id="search" class="w-full border-gray-300 rounded-md p-2" placeholder="Enter Complain No...">
            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
        </div>
    </form>

    <div class="border-t border-gray-200 pt-4">
        <ul id="searchResults">
            {{-- <li class="mb-8 border rounded-lg p-4 shadow-md">
                <div class="mb-4">
                    <strong class="text-gray-800">Customer Name:</strong>
                    <span class="text-gray-600">#123456</span>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-800">Service Name:</strong>
                    <span class="text-gray-600">Refrigerator Repair</span>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-800">Date:</strong>
                    <span class="text-gray-600">January 20, 2024</span>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-800">Time:</strong>
                    <span class="text-gray-600">10:00 AM</span>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-800">Location:</strong>
                    <span class="text-gray-600">Your Clinic</span>
                </div>
            </li> --}}
        </ul>
    </div>
    
</div>


<script>
    $(document).ready(function() {
        // Function to fetch search results
        let callingData = () => {
            $.ajax({
                type: "GET",
                url: "api/search-complain/"+ $('#search').val(),
                data: $('#searchForm').serialize(),
                success: function(response) {
                    let li = $("#searchResults");
                    li.empty();

                    let liList = response.data;

                    liList.forEach((item) => {
                        li.append(`
                            <li class="mb-8 border rounded-lg p-4 shadow-md">
                                <div class="mb-4">
                                    <strong class="text-gray-800">Customer Name:</strong>
                                    <span class="text-gray-600">${item.fullname}</span>
                                </div>
                                <div class="mb-4">
                                    <strong class="text-gray-800">Service Name:</strong>
                                    <span class="text-gray-600">${item.service_id}</span>
                                </div>
                                <div class="mb-4">
                                    <strong class="text-gray-800">Date:</strong>
                                    <span class="text-gray-600">${item.preferred_date}</span>
                                </div>
                                <div class="mb-4">
                                    <strong class="text-gray-800">Time:</strong>
                                    <span class="text-gray-600">${item.preferred_time}</span>
                                </div>
                                <div class="mb-4">
                                    <strong class="text-gray-800">Location:</strong>
                                    <span class="text-gray-600">${item.landmark}, ${item.address}, ${item.city}</span>
                                </div>
                            </li>
                         `);
                    });
                }
            });
        };

        // Submit form via AJAX
        $("#searchForm").submit(function(e) {
            e.preventDefault();
            callingData(); // Fetch search results
        });

        $("#search").keyup(function() {
            callingData(); // Fetch search results
        });

        // Initial call to fetch data
        callingData();
    });
</script>

    
@endsection