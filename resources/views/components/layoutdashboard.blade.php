<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

        <div class="flex-1 flex flex-col">
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
            const closeModalButton = document.getElementById('closeModalButton');
            const closeModalButton2 = document.getElementById('closeModalButton2');

            // Fungsi untuk membuka modal dan reset data
            openModalButton.addEventListener('click', () => {
                // Reset form input ketika modal tambah dibuka
                document.getElementById('nama_cabang').value = '';

                // Set form action untuk store (tambah data)
                const form = document.querySelector('form');
                form.action = '{{ route('cabang.store') }}';

                // Tampilkan modal
                modal.classList.remove('hidden');
            });

            // Fungsi untuk menutup modal
            [closeModalButton, closeModalButton2].forEach(button => {
                button.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            });

            // Menutup modal saat klik di luar modal
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });

            // Tombol Edit
            const editButtons = document.querySelectorAll('#openModalButtonEdit');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari atribut data-nama-cabang dan data-id
                    const namaCabang = this.getAttribute('data-nama-cabang');
                    const idCabang = this.getAttribute('data-id');

                    // Isi input modal dengan data yang didapat
                    document.getElementById('nama_cabang').value = namaCabang;

                    // Set form action untuk update data
                    const form = document.querySelector('form');
                    form.action = `/cabang/${idCabang}`;

                    // Tampilkan modal
                    modal.classList.remove('hidden');
                });
            });
        });
    </script>


</body>

</html>
