@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'SHPB')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- FOR BREADCRUMBS --}}
        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}

    <!-- Tambahkan di file Blade (contoh: resources/views/charts/piechart.blade.php) -->
    <h1>Monitoring SHPB</h1>
    <div class="row g-3 mb-2">
        <div class="col-md-6 col-lg-8 mb-2">
            <div class="card align-items-center" style="height: 150px">
                        <h5 class="bg-label-primary my-2 mt-3 mx-2 text-center">| Total Responden |</h5>
                        <h1>{{ $totalResponden }}</h1>
                        <form action="{{ route('shpb') }}" method="GET" class="d-flex align-items-center">
                            <div class="form-group col-md-10 me-2">
                                <select name="kode_kabkot" id="kode_kabkot" class="form-control">
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach($datakabkot as $kabkot)
                                        <option value="{{ $kabkot->kode_kabkot }}" 
                                            {{ $req_kabkot && $req_kabkot->kode_kabkot == $kabkot->kode_kabkot ? 'selected' : '' }}>
                                            {{ $kabkot->kabkot_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 mb-2">
            <div class="card align-items-center " style="height: 150px">
                    <h5 class="my-2 mx-2 mt-4 mx-2 text-center">Jumlah Responden {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota' }}</h5>
                    <h1 class="mx-2 mb-5">{{ $totalRespondenPerStatus }}</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 mb-2">
            <div class="card align-items-center" style="height: 150px">
                    <h5 class=" my-2 mx-2 mt-4 mx-2 text-center">Jumlah Selesai {{ $req_kabkot ? $req_kabkot->kabkot_name : 'Semua Kabupaten/Kota' }}</h5>
                    <h1 class="mx-2 mb-5">{{ $totalRespondenStatus12 }}</h1>
            </div>
        </div>
    </div>
    <div class="row g-3">
            <div class="col-md-6 col-lg-8 mb-3">
                    <div class="card h-100 text-center">
                        <h4 class="mt-3">Jumlah Responden Berdasarkan Kategori SHPB</h4>
                        <canvas id="kategoriChart" width="100" height="60" class="mx-4 me-4"></canvas>
                    </div>
                </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 text-center">
                    <h4 class="mt-3">Persentase Responden Berdasarkan Status Pendataan</h4>
                    <canvas id="statusChart" width="100" height="20" class="mx-4 me-4"></canvas>
                </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        // Pie Chart Berdasarkan Status Pendataan
        var ctx1 = document.getElementById('statusChart').getContext('2d');
        var statusChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    data: {!! json_encode($chartData['data']) !!},
                    backgroundColor: ['#AED59D','#FF7676', '#F7C98F', '#E2DAD6']
                }]
            },
            options: {
            plugins: {
                legend: {
                    display: false // Menghilangkan legenda di luar
                },
                datalabels: {
                    color: ['#576B80','#576B80', '#576B80', '#576B80'],
                    formatter: (value, context) => {
                        // Menghitung total data
                        let total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                        // Menghitung persentase
                        let percentage = ((value / total) * 100).toFixed(0);
                        return `${percentage}% ${context.chart.data.labels[context.dataIndex]}`; // Menampilkan label dan persentase
                    },
                    font: {
                        weight: 'bold',
                        size: 12
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

        // Bar Chart Berdasarkan Kategori SHPB
        var ctx2 = document.getElementById('kategoriChart').getContext('2d');
        var kategoriChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartData2['labels2']) !!},
                datasets: [{
                    data: {!! json_encode($chartData2['data2']) !!},
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8DD6E0']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false // Menghilangkan legenda di luar
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>



@endsection

@section('footer-code')



@endsection
