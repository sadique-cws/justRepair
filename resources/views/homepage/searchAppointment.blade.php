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
    <!-- Replace the following section with your appointment search results -->
    <div class="border-t border-gray-200 pt-4">
        <h2 class="text-lg font-semibold mb-2">Search Results</h2>
        <!-- Sample appointment search results (replace with your logic) -->
        <ul id="searchResults">
            {{-- <li class="mb-2" >
                <strong>Appointment ID:</strong> #123456<br>
                <strong>Date:</strong> January 20, 2024<br>
                <strong>Time:</strong> 10:00 AM<br>
                <strong>Location:</strong> Your Clinic<br>
                <!-- Add more appointment details as needed -->
            </li> --}}
            <!-- Add more search result items here -->
        </ul>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Function to fetch search results
        let callingData = () => {
            $.ajax({
                type: "GET",
                url: "/searchComplain/"+ $('#search').val(),
                data: $('#searchForm').serialize(),
                success: function(response) {
                    let li = $("#searchResults");
                    li.empty();

                    let liList = response.data;

                    liList.forEach((item) => {
                        li.append(`
                        <li class="mb-2" >
                            <strong>Appointment ID:</strong> ${item.id}<br>
                            <strong>Date:</strong> ${item.preferred_date}<br>
                            <strong>Time:</strong> ${item.preferred_time}<br>
                            <strong>Location:</strong> ${item.landmark}, ${item.address}, ${item.city}<br>
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

        // Initial call to fetch data
        callingData();
    });
</script>

    
@endsection