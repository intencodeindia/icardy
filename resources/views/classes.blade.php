@extends('layouts.app')

@section('content')
<div class="row page-titles mx-0">
	<div class="col-sm-6 justify-content-sm-start mt-2 mt-sm-0 d-flex">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="{{ route('schools') }}">Schools</a></li>
			<li class="breadcrumb-item active">Classes</li>
		</ol>
	</div>
	<div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
		<button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#add-class-modal">Add Class</button>
	</div>
</div>

<div class="row">
	@if(session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
	@endif

	@if($classes->count() > 0)
	@foreach($classes as $class)
	<div class="col-xl-3 col-lg-3 col-md-6">
		<div class="card kanbanPreview-bx h-100">
			<div class="card-body">
				<!-- Card Header -->
				<div class="sub-card bg-info d-flex text-white align-items-center flex-wrap">
					<div class="me-auto pe-2">
						<h4 class="fs-20 mb-0 font-w600 text-white">{{ $class->name }}</h4>
						<div class="mt-2">
							@foreach($class->sections as $section)
							<span class="badge bg-primary me-1">{{ $section->name }}</span>
							@endforeach
						</div>
					</div>

					<!-- Dropdown Menu -->
					<div class="dropdown">
						<button type="button" class="btn text-white" data-bs-toggle="dropdown">
							<i class="fa fa-ellipsis-v"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end">
							<a class="dropdown-item" href="{{ route('sections', ['class' => $class->id]) }}">
								<i class="fa fa-eye me-2"></i> View Sections
							</a>
							<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit-class-modal-{{ $class->id }}">
								<i class="fa fa-edit me-2"></i> Edit
							</a>
							<a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('delete-class-{{ $class->id }}').submit();">
								<i class="fa fa-trash me-2"></i> Delete
							</a>
							<form id="delete-class-{{ $class->id }}" action="{{ route('classes.destroy', $class->id) }}" method="POST" class="d-none">
								@csrf
								@method('DELETE')
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Edit Class Modal -->
	<div class="modal fade" id="edit-class-modal-{{ $class->id }}">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Class</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('classes.update', $class->id) }}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group mb-3">
							<label for="name">Class Name</label>
							<input type="text" name="name" id="name" class="form-control" value="{{ $class->name }}" required>
						</div>
						<div class="modal-footer px-0 pb-0">
							<button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Update Class</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@else
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body text-center">
				<img src="{{ asset('assets/images/no-data.png') }}" alt="No classes found" class="img-fluid" style="max-width: 200px;">
				<h4 class="mt-3">No Classes Found</h4>
				<p>Start by adding a new class using the button above.</p>
			</div>
		</div>
	</div>
	@endif

	<!-- Add Class Modal -->
	<div class="modal fade" id="add-class-modal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New Class</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('classes.store') }}" method="POST">
						@csrf
						<input type="hidden" name="school_id" value="{{ request()->route('school') }}">
						<div class="form-group mb-3">
							<label for="name">Class Name</label>
							<input type="text" name="name" id="name" class="form-control" required>
						</div>
						<div class="modal-footer px-0 pb-0">
							<button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Save Class</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection