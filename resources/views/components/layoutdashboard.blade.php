<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        .bg-gradient-to-r {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .hover\:bg-gradient-to-r:hover {
            background-image: linear-gradient(to right, var(--tw-gradient-from), var(--tw-gradient-to));
        }
    </style>
</head>

<body class="bg-gray-200">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('components.sidebar')

        <div class="flex flex-col flex-1 w-full">
            {{-- Header --}}
            @include('components.header')

            {{-- Content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modal');
            const openModalButton = document.getElementById('openModalButton');
            const editButtons = document.querySelectorAll('#openModalButtonEdit');
            const form = document.getElementById('cabangForm');
            const modalTitle = document.getElementById('modalTitle'); // Ambil elemen judul modal

            // Fungsi untuk membuka modal tambah data
            openModalButton.addEventListener('click', () => {
                document.getElementById('nama_cabang').value = '';
                form.action = '{{ route('cabang.store') }}';
                document.getElementById('method_field').value = 'POST';
                modalTitle.textContent = 'Tambah Data Cabang'; // Ubah judul modal
                modal.classList.remove('hidden')
                modal.classList.add('flex');
            });

            // Fungsi untuk membuka modal edit data
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const namaCabang = this.getAttribute('data-nama-cabang');
                    const idCabang = this.getAttribute('data-id');

                    document.getElementById('nama_cabang').value = namaCabang;
                    form.action = `/cabang/${idCabang}`;
                    document.getElementById('method_field').value = 'PUT';
                    modalTitle.textContent = 'Edit Data Cabang'; // Ubah judul modal
                    modal.classList.remove('hidden')
                    modal.classList.add('flex');
                });
            });

            // Fungsi untuk menutup modal
            const closeModalButtons = document.querySelectorAll('#closeModalButton, #closeModalButton2');
            closeModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modalPegawai');
            const openModalButton = document.getElementById('openModalButtonPegawai');
            const editButtons = document.querySelectorAll('#openModalButtonEditPegawai');
            const form = document.getElementById('pegawaiForm');
            const modalTitlePegawai = document.getElementById(
                'modalTitlePegawai'); // Ambil elemen judul modal pegawai

            // Fungsi untuk membuka modal tambah data pegawai
            openModalButton.addEventListener('click', () => {
                document.getElementById('nama_pegawai').value = '';
                form.action = '{{ route('pegawai.store') }}';
                document.getElementById('method_field').value = 'POST';
                modalTitlePegawai.textContent = 'Tambah Data Pegawai'; // Ubah judul modal pegawai
                modal.classList.remove('hidden')
                modal.classList.add('flex');
            });

            // Fungsi untuk membuka modal edit data pegawai
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const namaPegawai = this.getAttribute('data-nama-pegawai');
                    const idPegawai = this.getAttribute('data-id');

                    document.getElementById('nama_pegawai').value = namaPegawai;
                    form.action = `/pegawai/${idPegawai}`;
                    document.getElementById('method_field').value = 'PUT';
                    modalTitlePegawai.textContent = 'Edit Data Pegawai'; // Ubah judul modal pegawai
                    modal.classList.remove('hidden')
                    modal.classList.add('flex');
                });
            });

            // Fungsi untuk menutup modal
            const closeModalButtons = document.querySelectorAll(
                '#closeModalButtonPegawai, #closeModalButtonPegawai2');
            closeModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleFormButton = document.getElementById('toggleFormButton');
            const filterForm = document.getElementById('filterForm');

            if (toggleFormButton && filterForm) { // Pastikan elemen ada
                toggleFormButton.addEventListener('click', () => {
                    filterForm.classList.toggle('hidden');
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hamburgerButton = document.getElementById("hamburger-button");
            const sidebar = document.getElementById("sidebar");
            const closeButton = document.getElementById("close-button");

            // Fungsi untuk membuka sidebar
            function openSidebar() {
                sidebar.classList.remove("-translate-x-full", "md:translate-x-0");
            }

            // Fungsi untuk menutup sidebar
            function closeSidebar() {
                sidebar.classList.add("-translate-x-full", "md:translate-x-0");
            }

            // Event listener untuk tombol hamburger
            hamburgerButton.addEventListener("click", function() {
                openSidebar();
            });

            // Event listener untuk tombol close
            closeButton.addEventListener("click", function() {
                closeSidebar();
            });

            // Event listener untuk klik di luar sidebar
            document.addEventListener("click", function(event) {
                if (!sidebar.contains(event.target) && !hamburgerButton.contains(event.target)) {
                    closeSidebar();
                }
            });
        });
    </script>
    @vite(['resources/js/app.js'])
</body>

</html>
