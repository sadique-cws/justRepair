@extends('homepage.layout')



@section('title')
    {{ 'Track Appointment - ' . env('APP_NAME') . ' | Book Expert Home Appalince Online | Purnea.' }}
@endsection

@section('description',
    'Track your repair appointment with JustRepair. Enter your booking details and get real-time
    updates on the status of your repair service. ')



@section('content')
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow mt-5">
        <h1 class="text-2xl font-bold mb-4">Track Your Appointments</h1>
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
                                <div class="border rounded-lg p-4">
                                    <span class="text-gray-600">Hi, ${item.fullname}</span> 
                                </div>
                            `);

                            if (item.status == "accept") {
                                li.append(`
                                            <ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400 mt-5">                  
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Accepted</h3>
                                                    <p>Your request has been successfully accepted. Please stay tuned for further updates.</p>
                                                </li>                                    
                                            </ol>
                                        `);
                            } else if (item.status == "process") {
                                li.append(`
                                            <ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400 mt-5">                  
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Accepted</h3>
                                                </li>
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-yellow-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-yellow-900">
                                                        <svg class="w-3.5 h-3.5 text-yellow-500 dark:text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Processing</h3>
                                                    <p>Your request is currently being processed. We will notify you with updates soon.</p>
                                                </li>
                                            </ol>
                                        `);
                            } else if (item.status == "done") {
                                li.append(`
                                            <ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400 mt-5">                  
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Accepted</h3>
                                                </li>
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Processed</h3>
                                                </li>
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Done</h3>
                                                    <p>Your request has been successfully completed.</p>
                                                </li>
                                            </ol>
                                        `);
                            } else if (item.status == "reject") {
                                li.append(`
                                            <ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400 mt-5">                  
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-red-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-red-900">
                                                        <svg class="w-3.5 h-3.5 text-red-500 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Rejected</h3>
                                                    <p>We're sorry, but your request could not be processed at this time.
                                                        Please ensure all required information is correct and try again.
                                                        If the issue persists, feel free to contact our support team for further assistance.</p>
                                                </li>
                                            </ol>
                                    `);
                            } else if (item.status == "close") {
                                li.append(`
                                            <ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400 mt-5">                  
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Accepted</h3>
                                                </li>
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Processed</h3>
                                                </li>
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Done</h3>
                                                </li>
                                                <li class="mb-10 ms-6">            
                                                    <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-800">
                                                        <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="font-medium leading-tight">Closed</h3>
                                                    <p>The request has been successfully closed. If you have any further inquiries or require assistance, please don't hesitate to reach out.</p>
                                                </li>
                                            </ol>
                                    `);
                            }
                        });
                    },
                    error: function(error) {
                        console.error("Error fetching data:", error);
                    }
                });
            };

            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                callingData();
            });
        });
    </script>


@endsection
