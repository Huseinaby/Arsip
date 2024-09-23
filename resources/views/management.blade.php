@extends('layouts.main')

@section('container')


<form class="max-w-lg mx-auto my-3">
    <div class="flex">
        <button id="dropdown-button" data-dropdown-toggle="dropdown"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
            type="button">Filter <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg></button>

        <div id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 max-h-60 overflow-auto"
                aria-labelledby="dropdown-button">
                <li>
                    <button type="button"
                        class="filter-item inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-filter="No Dp">No Dp</button>
                </li>
                <li>
                    <button type="button"
                        class="filter-item inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-filter="Nama">Nama</button>
                </li>
                <li>
                    <button type="button"
                        class="filter-item inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-filter="Alamat">Alamat</button>
                </li>
                <li>
                    <button type="button"
                        class="filter-item inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-filter="Lokasi">Lokasi</button>
                </li>
                <li>
                    <button type="button"
                        class="filter-item inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-filter="Kategori">Kategori</button>
                </li>
                <li>
                    <button type="button"
                        class="filter-item inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-filter="Box">Box</button>
                </li>
                <li>
                    <button type="button"
                        class="filter-item inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-filter="Tahun">Tahun</button>
                </li>
            </ul>
        </div>

        <div class="relative w-full">
            <input type="search" id="search-dropdown"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                placeholder=" " required />
            <button type="submit"
                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
        <button type="button" onclick="printTable()"
            class="flex items-center text-white bg-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-600 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <svg class="w-6 h-6 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
            </svg>
            PRINT ALL
        </button>


    </div>

</form>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="dataTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">NO DP</th>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">Alamat</th>
                <th scope="col" class="px-6 py-3">Lokasi</th>
                <th scope="col" class="px-6 py-3">keterangan</th>
                <th scope="col" class="px-6 py-3">Boks</th>
                <th scope="col" class="px-6 py-3">Tahun</th>
                <th scope="col" class="px-6 py-3 hidden-print">Lihat</th>
                <th scope="col" class="px-6 py-3 hidden-print">Edit</th>
                <th scope="col" class="px-6 py-3 hidden-print">Print</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->nomor_dp }}
                    </th>
                    <td class="px-6 py-4">{{ $item->nama }}</td>
                    <td class="px-6 py-4">{{ $item->alamat }}</td>
                    <td class="px-6 py-4">{{ $item->lokasi }}</td>
                    <td class="px-6 py-4">{{ $item->keterangan }}</td>
                    <td class="px-6 py-4">{{ $item->box }}</td>
                    <td class="px-6 py-4">{{ $item->tahun }}</td>
                    <td class="px-6 py-4 hidden-print">
                        <svg id="eye-open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            style="cursor: pointer;">
                            <path stroke="currentColor" stroke-width="2"
                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </td>
                    <td class="px-6 py-4 hidden-print">
                        <a href="#" onclick="openEditModal({{ json_encode($item) }})"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                            </svg>
                        </a>

                    </td>
                    <td class="px-6 py-4 hidden-print">
                        <a href="#" class="print-pdf font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        data-file="{{ asset('storage/imbs/' . $item->imbs) }}"
                        >
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                            </svg>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div>

    </div>
</div>
<div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
    <div class="bg-gray-100 p-6 rounded-lg shadow-lg border">
        <h2 class="text-lg font-bold mb-4">Edit Data</h2>

        <form action="/update-item" method="POST">
            @csrf
            <input type="hidden" id="edit_id" name="id">

            <!-- Menggunakan grid layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nomor_dp" id="edit_nomor_dp"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_nomor_dp"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600">Nomor
                        DP</label>
                    @if ($errors->has('nomor_dp'))
                        <p class="text-red-500 text-xs mt-2">{{ $errors->first('nomor_dp') }}</p>
                    @endif
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nama" id="edit_nama"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_nama"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600">Nama</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="alamat" id="edit_alamat"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_alamat"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600">Alamat</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="lokasi" id="edit_lokasi"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_lokasi"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600">Lokasi</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="box" id="edit_box"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_box"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600">Box</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="keterangan" id="edit_keterangan"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_keterangan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600">Keterangan</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="tahun" id="edit_tahun"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_tahun"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600">Tahun</label>
                </div>
            </div>
            <div class="mb-14">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload
                    File
                    IMB</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="multiple_files" type="file" multiple>
            </div>

            <div class="mb-14"></div>

            <div class="flex justify-end">
                <button type="button" onclick="closeModal()"
                    class="text-white bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded">Cancel</button>
                <button type="submit"
                    class="ml-2 text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<div class="mt-10">
    {{ $items->links() }}
</div>


<script>

document.querySelectorAll('.print-pdf').forEach(function(element) {
        element.addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah link default
            var pdfFile = this.getAttribute('data-file'); // Ambil URL PDF dari data-file

            // Buka PDF di tab baru dan memicu print
            var win = window.open(pdfFile, '_blank');
            win.onload = function() {
                win.print();
            };
        });
    });

    function openEditModal(item) {
        document.getElementById('edit_id').value = item.id;
        document.getElementById('edit_nomor_dp').value = item.nomor_dp;
        document.getElementById('edit_nama').value = item.nama;
        document.getElementById('edit_alamat').value = item.alamat;
        document.getElementById('edit_lokasi').value = item.lokasi;
        document.getElementById('edit_keterangan').value = item.keterangan;
        document.getElementById('edit_box').value = item.box;
        document.getElementById('edit_tahun').value = item.tahun;

        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeModal() {

        document.getElementById('editModal').classList.add('hidden');
    }

    document.querySelectorAll('.filter-item').forEach(button => {
        button.addEventListener('click', function () {
            // Ganti teks tombol filter dengan nilai dari data-filter
            document.getElementById('dropdown-button').innerHTML = `${this.dataset.filter} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>`;

            // Menyembunyikan dropdown setelah item dipilih
            document.getElementById('dropdown').classList.add('hidden');
        });
    });

    // Fungsi untuk toggle dropdown visibility
    document.getElementById('dropdown-button').addEventListener('click', function () {
        document.getElementById('dropdown').classList.toggle('hidden');
    });

    function printTable() {
        // Mendapatkan elemen tabel
        var table = document.getElementById('dataTable').outerHTML;

        // Membuat jendela baru untuk print
        var printWindow = window.open('', '', 'height=800,width=1200');

        // Menulis HTML ke jendela print
        printWindow.document.write('<html><head><title>Data IMB</title>');
        printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; } th { background-color: #f2f2f2; } @media print { .hidden-print { display: none !important; } }</style>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(table);
        printWindow.document.write('</body></html>');

        // Menutup jendela print dan memanggil fungsi print
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();

        setTimeout(function () {
            printWindow.close();
        }, 100);
    }


    // Menambahkan event listener untuk tombol print
    document.querySelector('button[type="button"].font-medium.text-blue-600').addEventListener('click', printTable);
</script>
<style>
    @media print {
        .hidden-print {
            display: none !important;
        }
    }
</style>


@endsection