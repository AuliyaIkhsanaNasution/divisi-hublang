@extends('components.layout')

@section('title', 'Halaman Login')

@section('content')
    <div class="bg-white shadow-lg rounded-lg p-8">
        <div class="text-center mb-6">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="mx-auto mb-4 h-20">
            <h1 class="text-xl font-semibold text-gray-700">Silahkan Masuk</h1>
            <h4 class="text-l text-blue-700">Divisi Hubungan Langganan</h4>
        </div>

        <!-- Menampilkan error login -->
        @if ($errors->has('login'))
            <div class="mb-4 text-red-500 text-sm">
                {{ $errors->first('login') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                    Masuk Sekarang
                </button>
            </div>
        </form>
    </div>
@endsection
