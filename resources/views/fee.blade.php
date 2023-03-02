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
                <h4>Fees Details</h4>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($members as $member)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->mobile }}</td>
                            <td>
                                <i class="fas fa-eye mx-2" style="color: blue; cursor: pointer;" data-toggle="modal" data-target="#view_card" onclick="get_view(<?php echo $member->id  ?>)"></i>
                                <i class="fa fa-edit mx-2" style="color: pink; cursor: pointer;" data-toggle="modal" data-target="#fee_card" onclick="get_id(<?php echo $member->id  ?>)"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="view_card" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fees Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="view_tab">

            </div>
            <div class="modal-footer justify-content-between">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="fee_card" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pay Fee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pay_fee') }}" method="post" id="quickForm">
                    @csrf
                    <div class="row mx-3">
                        <input type="hidden" name="member_id" id="member_id">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Month:</label>
                                <div class="input-group date" id="year_select" data-target-input="nearest">
                                    <input type="text" name="year" class="form-control datetimepicker-input" data-target="#year_select" />
                                    <div class="input-group-append" data-target="#year_select" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 7px;">
                            <div class="form-group">
                                <label></label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" data-dropdown-css-class="select2-purple" name="month[]" style=" width: 100%;">
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Amount:</label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter Amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Due Date:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="due_date" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-15">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function get_view(m_id) {
        $("#view_tab").html("")
        $.ajax({
            type: "GET",
            url: "{{ route('view') }}",
            data: {
                'm_id': m_id
            },
            success: function(data) {
                if (data.status) {
                    $("#view_tab").html(data.html)
                    console.log(data.html);
                }
            }
        });
    }
</script>

<script>
    function get_id(id) {
        $("#member_id").val(id)
    }
</script>

<script>
    $(function() {
        $('#quickForm').validate({
            rules: {
                year: {
                    required: true,
                },
                "month[]": {
                    required: true,
                },
                amount: {
                    required: true,
                },
                due_date: {
                    required: true,
                },
            },
            messages: {
                year: {
                    required: "Please select a year",
                },
                "month[]": {
                    required: "Please select a month",
                },
                amount: {
                    required: "Please enter a amout"
                },
                due_date: {
                    required: "Please enter Due date",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endsection