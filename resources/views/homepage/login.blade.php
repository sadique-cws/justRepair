@extends('homepage.layout')

@section('content')
   <div class=" mt-5">
        <div class="flex justify-center">
            <div class="w-3/4 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3">
                <form action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h3 class="text-center text-lg font-bold mb-4">Login Now</h3>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" placeholder="example@gmail.com" class="form-input w-full py-2 px-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password" placeholder="**********" class="form-input w-full py-2 px-3 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="Login" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">
                    </div>
                    <p class="text-center text-gray-700 text-sm">
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Don't have an account?</a>
                    </p>
                </form>
            </div>
        </div>
   </div>
@endsection
