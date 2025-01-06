@extends('layouts.app')

@section('content')
<!-- Add Project -->
<div class="row page-titles mx-0">
	<div class="col-sm-6 justify-content-sm-start mt-2 mt-sm-0 d-flex">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active"><a href="javascript:void(0)">Schools</a></li>
		</ol>
		
	</div>
	<div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
		<button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#add-school-modal">Add School</button>
	</div>
</div>
<div class="row">
	@if(session('success'))
	<script>
		toastr.success("{{ session('success') }}", "Success!", {
			positionClass: "toast-top-right",
			timeOut: 5000,
			closeButton: true,
			debug: false,
			newestOnTop: true,
			progressBar: true,
			preventDuplicates: true,
			onclick: null,
			showDuration: "300",
			hideDuration: "1000",
			extendedTimeOut: "1000",
			showEasing: "swing",
			hideEasing: "linear",
			showMethod: "fadeIn",
			hideMethod: "fadeOut"
		});
	</script>
	@endif

	@if($schools->count() > 0)
	@foreach ($schools as $school)
	<div class="col-xl-3 col-lg-3 col-md-6">
		<div class="card kanbanPreview-bx">
			<div class="card-body">
				<div class="sub-card bg-primary d-flex text-white">
					<div class="me-auto pe-2">
						<h4 class="fs-20 mb-0 font-w600 text-white">{{ $school->name }}</h4>
						<span class="fs-14 op6 font-w200">{{ $school->address }}</span>
					</div>
					<div class="ms-auto ps-2">
					<a href="{{ route('schools.show', $school->id) }}" class="plus-icon">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
						<a href="javascript:void(0);" class="plus-icon" data-bs-toggle="modal" data-bs-target="#edit-school-modal-{{ $school->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Edit School Modal -->
	<div class="modal fade" id="edit-school-modal-{{ $school->id }}">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit School</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal">
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('schools.update', $school->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="name">School Name</label>
									<input type="text" name="name" id="name" class="form-control" value="{{ $school->name }}" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="address">Address</label>
									<textarea name="address" id="address" class="form-control" required>{{ $school->address }}</textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="phone">Phone</label>
									<input type="text" name="phone" id="phone" class="form-control" value="{{ $school->phone }}" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" class="form-control" value="{{ $school->email }}" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="website">Website</label>
									<input type="url" name="website" id="website" class="form-control" value="{{ $school->website }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="logo">School Logo</label>
									<input type="file" name="logo" id="logo" class="form-control" accept="image/*">
									@if($school->logo)
									<small class="text-muted">Current: <a href="{{ asset($school->logo) }}" target="_blank">View</a></small>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="principle_sign">Principal Signature</label>
									<input type="file" name="principle_sign" id="principle_sign" class="form-control" accept="image/*">
									@if($school->principle_sign)
									<small class="text-muted">Current: <a href="{{ asset($school->principle_sign) }}" target="_blank">View</a></small>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="stamp_image">School Stamp</label>
									<input type="file" name="stamp_image" id="stamp_image" class="form-control" accept="image/*">
									@if($school->stamp_image)
									<small class="text-muted">Current: <a href="{{ asset($school->stamp_image) }}" target="_blank">View</a></small>
									@endif
								</div>
							</div>
						</div>
						<div class="modal-footer px-0 pb-0">
							<button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Update School</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@else
	<div class="col-xl-12 col-lg-12 col-md-12">
		<div class="card kanbanPreview-bx">
			<div class="card-body">
				<div class="text-center">
					<img src="{{ asset('assets/images/no-data.png') }}" alt="No schools found" class="img-fluid" style="width: 200px; height: 200px;">
					<h4 class="text-center">No schools found</h4>
					<button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#add-school-modal">Add School</button>
				</div>
			</div>
		</div>
	</div>
	@endif
	<!-- Add School Modal -->
	<div class="modal fade" id="add-school-modal">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add School</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal">
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('schools.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="name">School Name</label>
									<input type="text" name="name" id="name" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="address">Address</label>
									<textarea name="address" id="address" class="form-control" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="phone">Phone</label>
									<input type="text" name="phone" id="phone" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="website">Website</label>
									<input type="url" name="website" id="website" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="logo">School Logo</label>
									<input type="file" name="logo" id="logo" class="form-control" accept="image/*">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="principle_sign">Principal Signature</label>
									<input type="file" name="principle_sign" id="principle_sign" class="form-control" accept="image/*">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="stamp_image">School Stamp</label>
									<input type="file" name="stamp_image" id="stamp_image" class="form-control" accept="image/*">
								</div>
							</div>
						</div>
						<div class="modal-footer px-0 pb-0">
							<button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Save School</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection