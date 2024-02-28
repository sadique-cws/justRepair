@extends('homepage.layout')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow mt-5">
        <h1 class="text-2xl font-bold mb-4">Search Appointments</h1>
        <form action="#" method="GET" id="searchForm">
            <div class="flex mb-4">
                <input type="text" name="search" id="search" class="w-full border-gray-300 rounded-md p-2"
                    placeholder="Enter Complain No...">
                <button type="submit"
                    class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
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
                    url: "api/search-complain/" + $('#search').val(),
                    data: $('#searchForm').serialize(),
                    success: function(response) {
                        let li = $("#searchResults");
                        li.empty();

                        let liList = response.data;

                        liList.forEach((item) => {
                            li.append(`
                            <div class="border rounded-lg p-4 shadow-md">
                                    <span class="text-gray-600">Hi, <br> ${item.fullname}</span>
                                   
                            </div>
<ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400">                  
    <li class="mb-10 ms-6">            
        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
            <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
            </svg>
        </span>
        <h3 class="font-medium leading-tight">Personal Info</h3>
        <p class="text-sm">Step details here</p>
    </li>
    <li class="mb-10 ms-6">
        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
            </svg>
        </span>
        <h3 class="font-medium leading-tight">Account Info</h3>
        <p class="text-sm">Step details here</p>
    </li>
    <li class="mb-10 ms-6">
        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
            </svg>
        </span>
        <h3 class="font-medium leading-tight">Review</h3>
        <p class="text-sm">Step details here</p>
    </li>
    <li class="ms-6">
        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
            <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
            </svg>
        </span>
        <h3 class="font-medium leading-tight">Confirmation</h3>
        <p class="text-sm">Step details here</p>
    </li>
</ol>

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
