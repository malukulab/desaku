@extends('layouts.admin')



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Status Jumlah Trantib dan Bencana</h4>

                    <canvas id="lineChart" height="430"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tabel Rincian Jumlah Trantib dan Bencana</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
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
