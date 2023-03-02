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
				<h5>Dashboard</h5>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Sr.No</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Address</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@php $i = 1; @endphp
						@foreach ($members as $member)
						<tr>
							<td>{{$i++}}</td>
							<td>{{ $member->name }}</td>
							<td>{{ $member->mobile }}</td>
							<td>{{ $member->address }}</td>
							<td>
								<i class="fas fa-eye" style="color: blue; cursor: pointer;" onclick="get_view(<?php echo $member->id  ?>)"></i>
								<i class=" fa fa-edit" style="color: pink; cursor: pointer; margin-left:10px;" onclick="get_edit(<?php echo $member->id  ?>)"></i>
								<a href="{{ route('delete', $member->id) }}" onclick="return confirm('Do you really want to Delete?');"><i class=" fa fa-trash" style="color: red; cursor: pointer; margin-left:10px;"></i></a>
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
				<h4 class="modal-title">Member Details</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row my-1">
					<div class="col-md-6">
						<div class="row ml-3">
							<div class="col-md-3">
								<h5>Name</h5>
							</div>
							<div class="col-md-9">
								<p id="v_name" class="p_tag"></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row ml-3">
							<div class="col-md-3">
								<h5>Mobile</h5>
							</div>
							<div class="col-md-9">
								<p id="v_mobile" class="p_tag"></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row my-1">
					<div class="col-md-6">
						<div class="row ml-3">
							<div class="col-md-3">
								<h5>Email</h5>
							</div>
							<div class="col-md-9">
								<p id="v_email" class="p_tag"></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row ml-3">
							<div class="col-md-3">
								<h5>Adhar No</h5>
							</div>
							<div class="col-md-9">
								<p id="v_adhar" class="p_tag"></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row my-1">
					<div class="col-md-6">
						<div class="row ml-3">
							<div class="col-md-3">
								<h5>Gender</h5>
							</div>
							<div class="col-md-9">
								<p id="v_gender" class="p_tag"></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row ml-3">
							<div class="col-md-3">
								<h5>Age</h5>
							</div>
							<div class="col-md-9">
								<p id="v_age" class="p_tag"></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row my-1">
					<div class="col-md-6">
						<div class="row ml-3">
							<div class="col-md-3">
								<h5>Address</h5>
							</div>
							<div class="col-md-9">
								<p id="v_add" class="p_tag"></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row ml-3">
							<div class="col-md-3">
								<h5>Locker NO</h5>
							</div>
							<div class="col-md-9">
								<p id="v_lock" class="p_tag"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit_card" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Member</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{ route('edit') }}" id="quickForm">
					@csrf
					<input type="hidden" name="id" id="id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group mx-3">
								<label for="">Name</label>
								<input type="text" class="form-control" name="name" id="e_name" placeholder="Enter name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mx-3">
								<label for="">Mobile</label>
								<input type="number" class="form-control" name="mobile" id="e_mobile" placeholder="Enter Mobile">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group mx-3">
								<label for="">Email address</label>
								<input type="email" class="form-control" name="email_id" id="e_mail" placeholder="Enter Email">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mx-3">
								<label for="">Adhar No</label>
								<input type="number" class="form-control" name="adhar" id="e_adhar" placeholder="Enter Adhar">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group mx-3">
								<label for="">Gender</label>
								<select class="form-control" name="gender" id="e_gender">
									<option value="Male">Male</option>
									<option value="Femail">Femail</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mx-3">
								<label for="">Age</label>
								<input type="number" class="form-control" name="age" placeholder="Enter Age" id="e_age">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group mx-3">
								<label for="">text address</label>
								<textarea class="form-control" rows="3" name="address" placeholder="Enter Address" id="e_address"></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mx-3">
								<label for="">Locker No</label>
								<input type="number" class="form-control" name="locker" placeholder="Enter Age" id="e_locker">
							</div>
						</div>
					</div>

					<div class="text-center my-3">
						<button type="submit" name="submit" class="btn btn-primary">
							<span class="indicator-label">Submit</span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
			</div>
			<div class="modal-footer justify-content-between">
			</div>
		</div>
	</div>s
</div>

@endsection

@section('scripts')
<script>
	function get_view(m_id) {
		$.ajax({
			type: "GET",
			url: "{{ route('member_view') }}",
			data: {
				'm_id': m_id
			},
			success: function(data) {
				if (data.status) {
					$("#v_name").html(data.query[0].name)
					$("#v_mobile").html(data.query[0].mobile)
					$("#v_email").html(data.query[0].email)
					$("#v_adhar").html(data.query[0].adhar)
					$("#v_gender").html(data.query[0].gender)
					$("#v_age").html(data.query[0].age)
					$("#v_add").html(data.query[0].address)
					$("#v_lock").html(data.query[0].locker)

					$("#view_card").modal("toggle");
				}
			}
		});
	}


	function get_edit(m_id) {
		$.ajax({
			type: "GET",
			url: "{{ route('member_view') }}",
			data: {
				'm_id': m_id
			},
			success: function(data) {
				if (data.status) {
					$("#e_name").val(data.query[0].name)
					$("#e_mobile").val(data.query[0].mobile)
					$("#e_mail").val(data.query[0].email)
					$("#e_adhar").val(data.query[0].adhar)
					$("#e_gender").val(data.query[0].gender)
					$("#e_age").val(data.query[0].age)
					$("#e_address").val(data.query[0].address)
					$("#e_locker").val(data.query[0].locker)
					$("#id").val(data.query[0].id)

					$("#edit_card").modal("toggle");
				}
			}
		});
	}
</script>

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