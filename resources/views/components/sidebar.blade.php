<div class="bg-white text-black w-64 min-h-screen flex flex-col shadow-lg">
    <!-- Logo Section -->
    <div class="text-center py-2 border-b border-gray-200">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="mx-auto h-20">
    </div>

    <!-- Navigation Section -->
    <nav class="flex-1 mt-4">
        <a href="/dashboard"
            class="block py-3 px-6 rounded-lg mx-4 my-2 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 hover:text-white transition {{ request()->is('dashboard') ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white' : '' }}">
            <span class="flex items-center">
                <svg class="h-5 w-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.005 11.19V12l6.998 4.042L19 12v-.81M5 16.15v.81L11.997 21l6.998-4.042v-.81M12.003 3 5.005 7.042l6.998 4.042L19 7.042 12.003 3Z" />
                </svg>

                Dashboard
            </span>
        </a>
        <a href="/pegawai"
            class="block py-3 px-6 rounded-lg mx-4 my-2 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 hover:text-white transition {{ request()->is('pegawai') ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white' : '' }}">
            <span class="flex items-center">
                <svg class="h-5 w-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                        clip-rule="evenodd" />
                </svg>

                Data Pegawai
            </span>
        </a>
        <a href="/cabang"
            class="block py-3 px-6 rounded-lg mx-4 my-2 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 hover:text-white transition {{ request()->is('cabang') ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white' : '' }}">
            <span class="flex items-center">
                <svg class="h-5 w-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                </svg>
                Data Cabang
            </span>
        </a>
        <a href="/form"
            class="block py-3 px-6 rounded-lg mx-4 my-2 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-purple-600 hover:text-white transition {{ request()->is('form') ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white' : '' }}">
            <span class="flex items-center">
                <svg class="h-5 w-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                </svg>
                Form Input Data
            </span>
        </a>
    </nav>

    <!-- Logout Section -->
    <a href="{{ route('login') }}"
        class="block font-bold py-3 px-6 mx-4 my-4 text-red-500 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-900 transition">
        <span class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            Logout
        </span>
    </a>
</div>
