@extends('include.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Fee Report</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('fee_report') }}">
                    @csrf
                    <div class="row m">
                        <div class='col-sm-4' style="margin-left: 250px;">
                            <div class="form-group">
                                <label class="control-label">Report Type</label>
                                <div class='input-group date'>
                                    <select class="form-control" name="report_type">
                                        <option value="All Member Fee Report">All Member Fee Report</option>
                                        <option value="Due Fee Report">Due Fee Report</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-12 col-xs-12 form-group">
                            <div>
                                <button style="margin-left: 30px; margin-top:27px;" type="submit" name="submit" class="btn btn-primary">Get Report</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @isset($details)
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Report</h1>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Month</th>
                            <th>Due Date</th>
                            <th>Fee Submit Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($details as $detail)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $detail->name }}</td>
                            <td>{{ $detail->mobile }}</td>
                            <td>{{ $detail->address }}</td>
                            <td>{{ $detail->amount }}</td>
                            <td>{{ $detail->month }}</td>
                            <td>{{ $detail->due_date }}</td>
                            <td>{{ date("d-m-Y H:i:s", strtotime($detail->created_at))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endisset
    </section>
</div>
@endsection