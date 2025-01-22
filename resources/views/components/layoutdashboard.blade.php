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
            const editButtons = document.querySelectorAll('#openModalButtonEdit');
            const form = document.getElementById('cabangForm');

            // Fungsi untuk membuka modal tambah data
            openModalButton.addEventListener('click', () => {
                document.getElementById('nama_cabang').value = '';
                form.action = '{{ route('cabang.store') }}';
                document.getElementById('method_field').value = 'POST';
                modal.classList.remove('hidden');
            });

            // Fungsi untuk membuka modal edit data
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const namaCabang = this.getAttribute('data-nama-cabang');
                    const idCabang = this.getAttribute('data-id');

                    document.getElementById('nama_cabang').value = namaCabang;
                    form.action = `/cabang/${idCabang}`;
                    document.getElementById('method_field').value = 'PUT';
                    modal.classList.remove('hidden');
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

            // Fungsi untuk membuka modal tambah data
            openModalButton.addEventListener('click', () => {
                document.getElementById('nama_pegawai').value = '';
                form.action = '{{ route('pegawai.store') }}';
                document.getElementById('method_field').value = 'POST';
                modal.classList.remove('hidden');
            });

            // Fungsi untuk membuka modal edit data
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const namaPegawai = this.getAttribute('data-nama-pegawai');
                    const idPegawai = this.getAttribute('data-id');

                    document.getElementById('nama_pegawai').value = namaPegawai;
                    form.action = `/pegawai/${idPegawai}`;
                    document.getElementById('method_field').value = 'PUT';
                    modal.classList.remove('hidden');
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
        // JavaScript untuk toggle form
        const toggleFormButton = document.getElementById('toggleFormButton');
        const filterForm = document.getElementById('filterForm');

        toggleFormButton.addEventListener('click', () => {
            filterForm.classList.toggle('hidden');
        });
    </script>
</body>

</html>
