@extends('layouts.admin')



@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h4 class="card-title mb-4">Status Pendididkan Penduduk</h4>
                        <a href="#" class="btn btn-secondary">Tambahkan data pendidikan</a>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h5 class="mb-0 font-size-20 text-truncate">9595</h5>
                            <p class="text-muted text-truncate">Bersekolah</p>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0 font-size-20 text-truncate">36524</h5>
                            <p class="text-muted text-truncate">Tidak bersekolah</p>
                        </div>
                    </div>

                    <canvas id="doughnut" height="260"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h4 class="card-title mb-4">Status Pekerjaan Masyarakat</h4>
                        <a href="#" class="btn btn-secondary">Tambahkan data pekerjaan</a>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h5 class="mb-0 font-size-20 text-truncate">9595</h5>
                            <p class="text-muted text-truncate">Bekerja</p>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0 font-size-20 text-truncate">36524</h5>
                            <p class="text-muted text-truncate">Tidak bekerja</p>
                        </div>
                    </div>

                    <canvas id="pie" height="260" width="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h4 class="card-title mb-4">Status Jenis Kelamin dan Usia Penduduk</h4>
                        <a href="#" class="btn btn-secondary">Tambahkan data jenis kelamin & usia penduduk</a>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h5 class="mb-0 font-size-20 text-truncate">86541</h5>
                            <p class="text-muted text-truncate">Laki-laki</p>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0 font-size-20 text-truncate">2541</h5>
                            <p class="text-muted text-truncate">Perempuan</p>
                        </div>
                    </div>

                    <canvas id="lineChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script src="{{ asset('vendor/lexa-admin/libs/chart.js/Chart.bundle.min.js') }}"></script>
<script>

    $(document).ready(function () {
        const parent = $('#doughnut').parent();
        $('#doughnut, #lineChart, #pie').attr('width', parent.width());

        new Chart($('#doughnut'), {
            type: 'doughnut',
            data: {
                labels: [
                    'Bersekolah',
                    'Tidak bersekolah',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart($('#pie'), {
            type: 'doughnut',
            data: {
                labels: [
                    'ASN',
                    'Wiraswasta',
                    'Karyawan',
                    'Petani',
                    'Pensiunan',
                    'Pengrajin',
                    'Pengembala',
                    'Nelayan',
                    'Lainnya'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 30, 10, 30, 40, 60, 50, 20],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(24, 162, 135)',
                        'rgb(154, 231, 240)',
                        'rgb(54, 122, 155)',
                        'rgb(44, 131, 223)',
                        'rgb(64, 212, 252)',
                        'rgb(34, 166, 111)',
                        'rgb(24, 132, 165)',

                    ],
                    hoverOffset: 4
                }]
            }
        });


        new Chart($('#lineChart'), {
            type: 'bar',
            data: {
                labels: [
                    'Usia 10 - 15 tahun',
                    'Usia 16 - 20 tahun',
                    'Usia 21 - 25 tahun',
                    'Usia 26 - 30 tahun',
                    'Usia 31 - 40 tahun',
                    'Usia 41 - 50 tahun',
                    'Usia 50 tahun keatas',
                ],
                datasets: [{
                    label: "Status usia penduduk",
                    backgroundColor: "rgba(122, 111, 190, 0.2)",
                    borderColor: "#3eb7ba",
                    borderCapStyle: "butt",
                    fill: true,
                    lineTension: .5,
                    borderDash: [],
                    borderDashOffset: 0,
                    borderJoinStyle: "miter",
                    pointBorderColor: "#3eb7ba",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#3eb7ba",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [25, 40, 50, 20, 50, 20, 30]
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 100,
                            min: 10,
                            stepSize: 10
                        }
                    }]
                }
            }
        });
    });
</script>
@endsection
