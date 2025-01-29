@extends('homepage.layout')

@section('title', 'JustRepair | Book Expert Home Appalince Online | Purnea.')

@section('description',
    "JustRepair Service
    We are a team of experienced electronics repair technicians dedicated to providing high-quality repair services for all
    your electronic devices. From ACs and washing machines to coolers and beyond, we've got you covered. Our mission is to
    ensure that you can enjoy your devices hassle-free, without worrying about malfunctions or breakdowns.")


@section('content')
    <div class=" mx-auto px-5 py-10">
        <div class="flex items-center gap-5 md:flex-row flex-col ">
            <div class="flex-1">
                <h2 class="text-2xl font-semibold mb-5">What you Looking For?</h2>

                {{-- search bar goes here --}}
                <div class="w-full md:w-full mb-3">
                    <div class="flex items-center space-x-2">
                        <input type="text" name="table_search" id="searchField"
                            class="w-full p-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Search">
                        <button type="submit" id="searchButton"
                            class="p-2 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none">
                            <i class="fas fa-search text-gray-600"></i>
                        </button>
                    </div>
                </div>
                {{-- search bar ends here --}}

                <div id="loader" class="text-5xl text-slate-300 py-5" style="display: none;">Loading...</div>

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

            {{-- Slide work goes here --}}
            {{-- <div id="default-carousel" class="relative flex-1" data-carousel="slide">
                <div id="bannerImage" class="relative h-[600px] overflow-hidden rounded-lg">
                    <img src="https://this-person-does-not-exist.com/en" alt="">
                </div>
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>

            </div> --}}


            {{-- <div id="default-carousel" class="relative flex-1" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div id="bannerImage" class="carousel-wrapper relative h-56 overflow-hidden rounded-lg md:h-96">

                </div>

            </div> --}}

            <div class="relative flex-1 h-56 md:h-96 overflow-hidden rounded-lg">
                <!-- Carousel Wrapper -->
                <div id="carousel" class="flex transition-transform duration-500 ease-in-out rounded-lg bg-red-500"></div>

                <!-- Navigation Buttons -->
                <button id="prev"
                    class="absolute top-1/2 left-2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full">
                    ❮
                </button>
                <button id="next"
                    class="absolute top-1/2 right-2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full">
                    ❯
                </button>
            </div>

        </div>

    </div>


    <script>
        $(document).ready(function() {

                    let callingServices = (search) => {
                        $('#loader').show();

                        $.ajax({
                            url: `{{ route('service.index') }}`,
                            type: "GET",
                            data: {
                                'search': search
                            },
                            // processData:false,
                            success: function(response) {
                                $('#loader').hide();

                                let serviceList = $("#serviceList");
                                serviceList.empty();
                                response.forEach((item, index) => {
                                    let colors = ['bg-blue-200', 'bg-green-200', 'bg-yellow-200',
                                        'bg-pink-200', 'bg-purple-200'
                                    ];
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

                    $('#searchField').on("keyup", function() {
                        let searchValue = $("#searchField").val();
                        if (searchValue.length > 3) {
                            callingServices(searchValue);
                        } else {
                            callingServices();
                        }
                    });

                    //banner calling goes here:
                    // let callingBanner = () => {
                    //     $.ajax({
                    //         type: "GET",
                    //         url: "/api/admin/banner",
                    //         success: function(response) {
                    //             // console.log(response);
                    //             let banners = $('#bannerImage');
                    //             banners.empty();
                    //             let data = response;
                    //             // console.log(data);

                    //             data.forEach((banner, index) => {
                    //                 banners.append(`                                
                //                     <div class="${index === 0 ?? 'active'} duration-700 ease-in-out" data-carousel-item>
                //                         <img src="/banners/${banner.image}" alt="banner-${index + 1}" 
                //                         class="absolute block w-full h-full object-cover">
                //                     </div>                                
                //                 `);
                    //             });
                    //         },
                    //         error: function(err) {
                    //             console.error("Error loading banners:", err);
                    //         }
                    //     });
                    // }
                    // callingBanner();

                    
                        let images = [];
                        let currentIndex = 0;

                    // Fetch images using jQuery AJAX
                    function loadImages() {
                        $.ajax({
                            type: "GET",
                            url: "/api/admin/banner",
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                // images = response; // Assuming data is an array of image URLs
                                images = response.map(item => `/banners/${item.image}`);
                                displayImages();
                            },
                            error: function(error) {
                                console.error('Error fetching images:', error);
                            }
                        });
                    }

                    function displayImages() {
                        const carousel = $('#carousel');
                        carousel.empty();

                        images.forEach(imgSrc => {
                            const img = $('<img>').attr('src', imgSrc).addClass(
                                'w-full h-full object-cover shrink-0');
                            carousel.append(img);
                        });

                        updateCarousel();
                    }

                    function updateCarousel() {
                        $('#carousel').css('transform', `translateX(-${currentIndex * 100}%)`);
                    }

                    $('#prev').click(() => {
                        currentIndex = (currentIndex - 1 + images.length) % images.length;
                        updateCarousel();
                    });

                    $('#next').click(() => {
                        currentIndex = (currentIndex + 1) % images.length;
                        updateCarousel();
                    });

                    loadImages();

         })
    </script>


@endsection
