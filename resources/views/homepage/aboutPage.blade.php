@extends('homepage.layout')

@section('content')
    <!-- About Us Section -->
    <div class="bg-gray-100 py-10 px-4 sm:px-6 lg:px-10 xl:px-16">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">About JustRepair Service</h2>
          <p class="mt-4 max-w-4xl text-xl text-gray-500 mx-auto">
            We are a team of experienced electronics repair technicians dedicated to providing high-quality repair services for all your electronic devices. From ACs and washing machines to coolers and beyond, we've got you covered. Our mission is to ensure that you can enjoy your devices hassle-free, without worrying about malfunctions or breakdowns.
          </p>
        </div>
      
        <div class="mt-16 max-w-4xl mx-auto grid grid-cols-1 gap-y-16 gap-x-8 lg:grid-cols-2">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Fast and Reliable Service</h3>
            <p class="mt-2 text-base text-gray-500">
              We understand how important it is to have your electronic devices functioning properly, which is why we strive to provide fast and reliable repair services. Our team is committed to getting your devices fixed and back to you as soon as possible. Whether it's a minor issue or a major repair, you can count on us to deliver prompt and efficient service.
            </p>
      
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-8">Experienced Technicians</h3>
            <p class="mt-2 text-base text-gray-500">
              Our team of technicians has years of experience repairing a wide variety of electronic devices. We have the knowledge and skills necessary to diagnose and fix any issue you may be having with your devices. From troubleshooting to component-level repairs, we have you covered. You can trust our expertise to get your devices back in optimal condition.
            </p>
          </div>
      
          <div class="flex items-center justify-center">
            <img class="w-full h-auto object-cover sm:h-72 md:h-56 lg:h-300 lg:w-full lg:h-full" src="/images/repair.png" alt="Electronics repair technicians working on a device">        </div>
      
          <div class="mt-16 lg:mt-0 lg:col-span-2">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Competitive Pricing</h3>
            <p class="mt-2 text-base text-gray-500">
              We believe that high-quality repair services shouldn't break the bank, which is why we offer competitive pricing for all our repair services. We understand the value of your hard-earned money and strive to provide cost-effective solutions for your repair needs. With us, you get top-notch service without burning a hole in your pocket.
            </p>
          </div>
        </div>
      
        <div class="mt-10 mb-10 max-w-4xl mx-auto ">
          <h3 class="text-2xl leading-6 font-semibold text-center text-gray-900 mb-2">Contact Us</h3>
          <p class="mt-2 text-lg text-gray-500 ">
            If you have any questions or would like to schedule a repair, please don't hesitate to contact us. Our friendly customer service team is ready to assist you with any inquiries you may have. Reach out to us via phone, email, or visit our office, and we'll be happy to help you with all your repair needs.
          </p>
      
          <!-- Add contact details here -->
          <ul class="mt-6 list-disc list-inside text-gray-500">
            <li>Phone: +91 6202067099</li>
            <li>Email: <a href="mailto:info@electronicsrepair.com" class="text-blue-500 hover:text-blue-700">info@JustRepairepair.com</a></li>
            <li>Address: 123 Line Bazar, Purnea , Bihar-854301</li>
          </ul>
        </div>
      </div>
@endsection