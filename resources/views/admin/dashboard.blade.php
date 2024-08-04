@extends('admin.header')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="card-title " >Jumlah Lapangan Futsal</h3>
            </div>
            <div class="card-body"style="padding-bottom: 0;">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-8">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($kecamatan as $item)
                    '{{ $item->name }} ({{ $lapanganCountByKecamatan[$item->id]->lapangan_count ?? 0}})',
                @endforeach
            ],
            datasets: [{
                label: 'Jumlah Mitra Lapangan ('+ {{ $lapangan->count() }} + ')', // Label untuk dataset
                data: [
                    @foreach ($kecamatan as $kec)
                        {{ $lapanganCountByKecamatan[$kec->id]->lapangan_count ?? 0 }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
