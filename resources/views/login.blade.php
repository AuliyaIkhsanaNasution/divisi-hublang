@extends('components.layout')

@section('title', 'Login | Divisi Hubungan Langganan')

@section('content')
    <div class="p-8 mx-3 bg-white rounded-lg shadow-lg md:mx-0">
        <div class="mb-6 text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-20 mx-auto mb-4">
            <h1 class="text-xl font-semibold text-gray-700">Silahkan Masuk</h1>
            <h4 class="text-blue-700 text-l">Divisi Hubungan Langganan</h4>
        </div>

        <!-- Menampilkan error login -->
        @if ($errors->has('login'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Username atau password salah!",
                });
            </script>
        @endif

        <!-- Menampilkan BERHASIL logout -->
        @if (session('logout'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Berhasil logout!",
                    text: "Sampai Jumpa!",
                });
            </script>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full py-2 text-white transition bg-blue-600 rounded-md hover:bg-blue-700">
                    Masuk Sekarang
                </button>
            </div>
        </form>
    </div>
@endsection
