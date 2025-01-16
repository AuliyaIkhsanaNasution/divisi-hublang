@extends('components.layout')

@section('title', 'Halaman Login')

@section('content')
    <div class="bg-white shadow-lg rounded-lg p-8">
        <div class="text-center mb-6">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="mx-auto mb-4 h-20">
            <h1 class="text-xl font-semibold text-gray-700">Silahkan Masuk</h1>
            <h4 class="text-l text-blue-700">Divisi Hubungan Langganan</h4>
        </div>
        <form>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" id="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10 3C5.588 3 2.003 6.134 1 10c1.003 3.866 4.588 7 9 7s7.997-3.134 9-7c-1.003-3.866-4.588-7-9-7zM10 5c3.878 0 7.02 2.54 8 5-1 2.46-4.122 5-8 5s-7.02-2.54-8-5c1-2.46 4.122-5 8-5zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Masuk
                    Sekarang</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <!-- Link ke halaman dashboard -->
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">
                Pergi ke Halaman Selanjutnya
            </a>
        </div>
    </div>
@endsection
