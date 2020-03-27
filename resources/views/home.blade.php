@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "iDisplayLength": 50
        });

    });
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Transaksi</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{$booking->count()}}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh transaksi
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Sedang Disewa</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{$booking->where('status', 'process')->count()}}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> sedang disewa
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-book text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Motor</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{$car->count()}}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Total jumlah motor
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Client</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{$client->count()}}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh client
                </p>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="card card-secondary card-outline">

        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order Date</th>
                        <th>Booking Code</th>
                        <th>Client Name</th>
                        <th>Motor</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($booking_data as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->order_date }}</td>
                        <td>{{ $row->booking_code }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->car_name }}</td>
                        <td><label class="badge badge-warning">Disewa</label></td>
                        <td><a href="{{ route('returns.information', ['booking_code' => $row->booking_code ]) }}" class="btn btn-primary btn-sm">Process Return</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>

@endsection