@extends('components.layoutdashboard')

@section('title', 'Dashboard')

@section('header-title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="border-2 border-indigo-500 bg-white border-gradient-to-r p-6 rounded-lg shadow flex items-center ">
            <div class="mr-4 text-indigo-500">
                <i class="fas fa-database text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-indigo-500">Total Data</h2>
                <p class="text-2xl font-semibold mt-2 text-indigo-500">0</p>
            </div>
        </div>
        <div class="border-2 border-teal-500 bg-white border-gradient-to-r p-6 rounded-lg shadow flex items-center">
            <div class="mr-4 text-teal-500">
                <i class="fas fa-users text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-teal-500">Total Pegawai</h2>
                <p class="text-2xl font-semibold mt-2 text-teal-500">14</p>
            </div>
        </div>
        <div class="border-2 border-yellow-500 bg-white border-gradient-to-r p-6 rounded-lg shadow flex items-center">
            <div class="mr-4 text-yellow-500">
                <i class="fas fa-building text-3xl"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-yellow-500">Total Cabang</h2>
                <p class="text-2xl font-semibold mt-2 text-yellow-500">0</p>
            </div>
        </div>
    </div>
    <div class="mt-8">
        <h2 class="text-lg font-bold mb-4">Recent Activities</h2>
        <div class="bg-white p-4 rounded-lg shadow">
            <p class="text-gray-600">No recent activities available.</p>
        </div>
    </div>
@endsection
