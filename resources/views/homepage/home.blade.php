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


            let images = [];
            let currentIndex = 0;
            let autoSlideInterval; 

            function loadImages() {
                $.ajax({
                    type: "GET",
                    url: "/api/admin/banner",
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        images = response.map(item => `/banners/${item.image}`);
                        displayImages();
                        startAutoSlide();
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
                resetAutoSlide();
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateCarousel();
            });

            $('#next').click(() => {
                resetAutoSlide();
                currentIndex = (currentIndex + 1) % images.length;
                updateCarousel();
            });

            function startAutoSlide() {
                autoSlideInterval = setInterval(() => {
                    currentIndex = (currentIndex + 1) % images.length;
                    updateCarousel();
                }, 3000); 
            }

            function resetAutoSlide() {
                clearInterval(autoSlideInterval); 
                startAutoSlide(); 
            }

            loadImages();

        })
    </script>


@endsection
