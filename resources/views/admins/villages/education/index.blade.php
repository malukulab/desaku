@extends('layouts.admin')



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Status Pendidikan Penduduk</h4>

                    <canvas id="lineChart" height="430"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tabel Rincian Pendidikan Penduduk</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Pendidikan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('head')
 <!-- DataTables -->
 <link href="{{ asset('vendor/lexa-admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

 <!-- Responsive datatable examples -->
 <link href="{{ asset('vendor/lexa-admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('script')
<script src="{{ asset('vendor/lexa-admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/lexa-admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('vendor/lexa-admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendor/lexa-admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('vendor/lexa-admin/js/pages/datatables.init.js') }}"></script>
<script src="{{ asset('vendor/lexa-admin/libs/chart.js/Chart.bundle.min.js') }}"></script>
<script>

    $(document).ready(function () {
        const parent = $('#lineChart').parent();
        $('#lineChart').attr('width', parent.width());

        new Chart($('#lineChart'), {
            type: 'doughnut',
            data: {
                labels: [
                    'Tidak pernah bersekolah',
                    'TK',
                    'SD',
                    'SLTP dan sederajat',
                    'SLTA dan sederajat',
                    'S1',
                    'S2',
                    'S3'
                ],
                datasets: [{
                    label: "Status pendidikan penduduk",
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
                    borderColor: "#3eb7ba",
                    borderCapStyle: "butt",
                    fill: false,
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
                    data: [25, 40, 50, 20, 50, 20, 30, 15]
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
