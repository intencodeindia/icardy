@extends('layouts.app')

@section('content')
<div class="row page-titles mx-0">
	<div class="col-sm-6 justify-content-sm-start mt-2 mt-sm-0 d-flex">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="{{ route('schools') }}">Schools</a></li>
			<li class="breadcrumb-item active">Students</li>
		</ol>
	</div>
	<div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
		<div class="btn-group">
			<button type="button" class="btn btn-primary btn-sm mb-2 dropdown-toggle" data-bs-toggle="dropdown">
				Add Students
			</button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#add-student-modal">
					Manual Entry
				</a>
				<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#import-students-modal">
					Import from Excel/CSV
				</a>
				<a class="dropdown-item" href="{{ route('students.template.download') }}">
					Download Template
				</a>
			</div>
		</div>
	</div>
</div>

<div class="row">
 	@if(session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
	@endif

	@if($students->count() > 0)
		@foreach($students as $student)
		<div class="col-xl-3 col-lg-3 col-md-6">
			<div class="card kanbanPreview-bx h-100">
				<div class="card-body">
					<!-- Student Photo -->
					<div class="text-center mb-3">
						@if($student->photo)
							<img src="{{ asset('storage/'.$student->photo) }}" alt="{{ $student->name }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
						@else
							<img src="{{ asset('assets/images/avatar.png') }}" alt="Default Avatar" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
						@endif
					</div>
					<!-- Student Info -->
					<div class="text-center mb-3">
						<h4 class="fs-18 mb-1 font-w600">{{ $student->name }}</h4>
						<p class="mb-0">{{ $student->registration_number }}</p>
					</div>
					<!-- Additional Info -->
					<div class="info-list">
						<div class="d-flex mb-2">
							<i class="fa fa-user me-3 text-primary"></i>
							<span>{{ $student->father_name }}</span>
						</div>
						<div class="d-flex mb-2">
							<i class="fa fa-phone me-3 text-primary"></i>
							<span>{{ $student->phone_number }}</span>
						</div>
						<div class="d-flex mb-2">
							<i class="fa fa-calendar me-3 text-primary"></i>
							<span>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d M, Y') }}</span>
						</div>
					</div>
					<!-- Actions -->
					<div class="text-center mt-3">
						<button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-student-modal-{{ $student->id }}">
							<i class="fa fa-edit me-2"></i>Edit
						</button>
						<button type="button" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-student-{{ $student->id }}').submit();">
							<i class="fa fa-trash me-2"></i>Delete
						</button>
						<form id="delete-student-{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-none">
							@csrf
							@method('DELETE')
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Edit Student Modal -->
		<div class="modal fade" id="edit-student-modal-{{ $student->id }}">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Student</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-md-6">
									<div class="form-group mb-3">
										<label>Registration Number</label>
										<input type="text" name="registration_number" class="form-control" value="{{ $student->registration_number }}" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group mb-3">
										<label>Name</label>
										<input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group mb-3">
										<label>Father's Name</label>
										<input type="text" name="father_name" class="form-control" value="{{ $student->father_name }}" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group mb-3">
										<label>Phone Number</label>
										<input type="text" name="phone_number" class="form-control" value="{{ $student->phone_number }}" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group mb-3">
										<label>Date of Birth</label>
										<input type="date" name="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group mb-3">
										<label>Blood Group</label>
										<input type="text" name="blood_group" class="form-control" value="{{ $student->blood_group }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group mb-3">
										<label>Gender</label>
										<select name="gender" class="form-control" required>
											<option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
											<option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
											<option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group mb-3">
										<label>Photo</label>
										<input type="file" name="photo" class="form-control" accept="image/*">
										@if($student->photo)
											<small class="text-muted">Current: <a href="{{ asset('storage/'.$student->photo) }}" target="_blank">View</a></small>
										@endif
									</div>
								</div>
							</div>
							<div class="form-group mb-3">
								<label>Address</label>
								<textarea name="address" class="form-control" required>{{ $student->address }}</textarea>
							</div>
							<div class="modal-footer px-0 pb-0">
								<button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-sm btn-primary">Update Student</button>
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
					<img src="{{ asset('assets/images/no-data.png') }}" alt="No students found" class="img-fluid" style="max-width: 200px;">
					<h4 class="mt-3">No Students Found</h4>
					<p>Start by adding a new student using the button above.</p>
				</div>
			</div>
		</div>
	@endif

	<!-- Add Student Modal -->
	<div class="modal fade" id="add-student-modal">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New Student</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="school_id" value="{{ $school->id }}">
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>School</label>
									<input type="text" class="form-control" value="{{ $school->name }}" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Class</label>
									<select name="class_id" id="add_class_id" class="form-control" required>
										<option value="">Select Class</option>
										@foreach($classes as $class)
											<option value="{{ $class->id }}">{{ $class->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Section (Optional)</label>
									<select name="section_id" id="add_section_id" class="form-control">
										<option value="">Select Section</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Registration Number</label>
									<input type="text" name="registration_number" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Name</label>
									<input type="text" name="name" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Father's Name</label>
									<input type="text" name="father_name" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Phone Number</label>
									<input type="text" name="phone_number" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Date of Birth</label>
									<input type="date" name="date_of_birth" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Blood Group</label>
									<input type="text" name="blood_group" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Gender</label>
									<select name="gender" class="form-control" required>
										<option value="male">Male</option>
										<option value="female">Female</option>
										<option value="other">Other</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label>Photo</label>
									<input type="file" name="photo" class="form-control" accept="image/*">
								</div>
							</div>
							<div class="form-group mb-3">
								<label>Address</label>
								<textarea name="address" class="form-control" required></textarea>
							</div>
							<div class="modal-footer px-0 pb-0">
								<button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-sm btn-primary">Save Student</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Import Students Modal -->
	<div class="modal fade" id="import-students-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Import Students</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="school_id" value="{{ $school->id }}">
						
						<div class="form-group mb-3">
							<label>School</label>
							<input type="text" class="form-control" value="{{ $school->name }}" readonly>
						</div>
						
						<div class="form-group mb-3">
							<label>Class</label>
							<select name="class_id" id="class_id" class="form-control" required>
								<option value="">Select Class</option>
								@foreach($classes as $class)
									<option value="{{ $class->id }}">{{ $class->name }}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group mb-3">
							<label>Section (Optional)</label>
							<select name="section_id" id="section_id" class="form-control">
								<option value="">Select Section</option>
							</select>
						</div>

						<div class="form-group mb-3">
							<label>Excel/CSV File</label>
							<input type="file" name="file" class="form-control" required accept=".xlsx,.csv">
							<small class="text-muted">
								<a href="{{ route('students.template.download') }}" class="text-primary">
									<i class="fas fa-download"></i> Download Template
								</a><br>
								Please follow the template format exactly. Required fields: registration_number, name, father_name, address, date_of_birth (YYYY-MM-DD), phone_number, gender (male/female/other)
							</small>
						</div>

						<div class="modal-footer px-0 pb-0">
							<button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Import Students</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
	// For import modal
	$('#class_id').change(function() {
		loadSections($(this).val(), '#section_id');
	});

	// For add student modal
	$('#add_class_id').change(function() {
		loadSections($(this).val(), '#add_section_id');
	});

	function loadSections(classId, targetSelect) {
		if(classId) {
			$.ajax({
				url: '/api/classes/' + classId + '/sections',
				type: 'GET',
				success: function(data) {
					$(targetSelect).empty().append('<option value="">Select Section</option>');
					$.each(data, function(key, value) {
						$(targetSelect).append('<option value="'+ value.id +'">'+ value.name +'</option>');
					});
				}
			});
		} else {
			$(targetSelect).empty().append('<option value="">Select Section</option>');
		}
	}
});
</script>
@endpush
@endsection