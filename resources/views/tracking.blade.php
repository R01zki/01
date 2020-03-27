@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Motor</th>
                        <th>License</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $no++}}</td>
                        <td>Motor 1</td>
                        <td>G 4675 MU</td>
                        <td>
                            <a href=" {{ route('tracking1') }} " class="btn btn-sm btn-primary">Track</a>
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
</section>

@endsection