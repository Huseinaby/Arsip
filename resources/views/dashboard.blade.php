@extends('layouts.main')

@section('container')



<div class="container mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-2 my-20">
        <div class="w-full  sm:col-start-1 sm:col-end-3">
            <canvas id="myPieChart"></canvas>
        </div>
        <div class="col-span-1 sm:col-span-2 lg:col-span-3 lg:col-end-7 m-auto">
            <div class="block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-7xl font-bold tracking-tight text-gray-900 dark:text-white"> {{$jumlahData}}</h5>
                <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">
                   Jumlah Data Surat Izin Mendirikan Bangunan yang sudah di simpan di aplikasi
                </p>
            </div>
        </div>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let data = @json($dataPerTahun);

    let labels = data.map(item => item.tahun);
    let counts = data.map(item => item.count);

    let ctx = document.getElementById('myPieChart').getContext('2d');
    let myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: counts,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>


@endsection