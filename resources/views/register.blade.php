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
        <h4>New Registration</h4>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('register_mem') }}" id="quickForm">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mx-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mx-3">
                <label for="">Mobile</label>
                <input type="number" class="form-control" name="mobile" placeholder="Enter Mobile">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mx-3">
                <label for="">Email address</label>
                <input type="email" class="form-control" name="email_id" placeholder="Enter Email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mx-3">
                <label for="">Adhar No</label>
                <input type="number" class="form-control" name="adhar" placeholder="Enter Adhar">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mx-3">
                <label for="">Gender</label>
                <select class="form-control" name="gender">
                  <option value="Male">Male</option>
                  <option value="Femail">Femail</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mx-3">
                <label for="">Age</label>
                <input type="number" class="form-control" name="age" placeholder="Enter Age">
              </div>
            </div>
          </div>

          <div class="form-group mx-3">
            <label for="">text address</label>
            <textarea class="form-control" rows="3" name="address" placeholder="Enter Address" required></textarea>
          </div>

          <div class="text-center my-3">
            <button type="submit" name="submit" class="btn btn-primary">
              <span class="indicator-label">Submit</span>
            </button>
          </div>
          <!--end::Actions-->
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

@section('scripts')
<script>
  $(function() {
    $('#quickForm').validate({
      rules: {
        name: {
          required: true,
        },
        mobile: {
          required: true,
        },
        email_id: {
          email: true,
        },
        age: {
          required: true,
        },
        address: {
          required: true,
        },
      },
      messages: {
        name: {
          required: "Please enter name",
        },
        mobile: {
          required: "Please enter Mobile NO",
        },
        email_id: {
          email: "Please enter a valid email address"
        },
        age: {
          required: "Please enter Age",
        },
        address: {
          required: "Please enter address",
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