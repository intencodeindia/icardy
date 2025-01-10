@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif
<!-- Add Project -->
<div class="row page-titles mx-0">
	<div class="col-sm-6">
		<h4 class="mb-0">School Details</h4>
	</div>
	<div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item active"><a href="javascript:void(0)">School Details</a></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4 class="card-title">{{ $school->name }}</h4>
				<a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#edit-school-modal-{{ $school->id }}">
					<i class="fa fa-edit text-dark bg-transparent"></i>Edit School
				</a>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-xl-3 col-lg-4">
						<div class="clearfix">
							@if($school->logo)
							<img src="{{ asset('storage/'.$school->logo) }}" alt="{{ $school->name }} Logo" class="img-fluid rounded mb-3">
							@else
							<img src="{{ asset('assets/images/school-placeholder.png') }}" alt="Default School Logo" class="img-fluid rounded mb-3">
							@endif
						</div>
					</div>
					<div class="col-xl-9 col-lg-8">
						<div class="row">
							<div class="col-xl-6">
								<div class="info-group mb-3">
									<h5 class="text-primary mb-2"><i class="fa fa-map-marker me-2"></i>Address</h5>
									<p class="mb-0">{{ $school->address }}</p>
								</div>
								<div class="info-group mb-3">
									<h5 class="text-primary mb-2"><i class="fa fa-phone me-2"></i>Contact Details</h5>
									<p class="mb-1"><strong>Phone:</strong> <a href="tel:{{ $school->phone }}">{{ $school->phone }}</a></p>
									<p class="mb-1"><strong>Email:</strong> <a href="mailto:{{ $school->email }}">{{ $school->email }}</a></p>
									@if($school->website)
									<p class="mb-0"><strong>Website:</strong> <a href="{{ $school->website }}" target="_blank">{{ $school->website }}</a></p>
									@endif
								</div>
							</div>
							<div class="col-xl-6">
								<div class="info-group mb-3">
									<h5 class="text-primary mb-2"><i class="fa fa-certificate me-2"></i>Official Documents</h5>
									@if($school->principle_sign)
									<div class="mb-3">
										<p class="mb-1"><strong>Principal Signature:</strong></p>
										<img src="{{ asset('storage/'.$school->principle_sign) }}" alt="Principal Signature" class="img-fluid rounded" style="max-height: 100px;">
									</div>
									@endif
									@if($school->stamp_image)
									<div class="mb-0">
										<p class="mb-1"><strong>School Stamp:</strong></p>
										<img src="{{ asset('storage/'.$school->stamp_image) }}" alt="School Stamp" class="img-fluid rounded" style="max-height: 100px;">
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12">
						<div class="d-flex justify-content-end">
							<a href="{{ route('classes', $school->id) }}" class="btn btn-sm btn-success me-2">
								<i class="fa fa-plus me-2"></i>Add Class
							</a>
							<a href="{{ route('students', $school->id) }}" class="btn btn-sm btn-info me-2">
								<i class="fa fa-plus me-2"></i>Add Student
							</a>

							<a href="{{ route('schools') }}" class="btn btn-sm btn-warning me-2">
								<i class="fa fa-arrow-left me-2"></i>Back to Schools
							</a>

						</div>
					</div>
				</div>
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
												<small class="text-muted">Current: <a href="{{ asset('storage/'.$school->logo) }}" target="_blank">View</a></small>
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
												<small class="text-muted">Current: <a href="{{ asset('storage/'.$school->principle_sign) }}" target="_blank">View</a></small>
												@endif
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-3">
												<label for="stamp_image">School Stamp</label>
												<input type="file" name="stamp_image" id="stamp_image" class="form-control" accept="image/*">
												@if($school->stamp_image)
												<small class="text-muted">Current: <a href="{{ asset('storage/'.$school->stamp_image) }}" target="_blank">View</a></small>
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
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">School Classes</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs border-2" id="classTab" role="tablist">
							@foreach($classes as $index => $class)
							<li class="nav-item" role="presentation">
								<button class="nav-link text-primary bg-transparent rounded-0 {{ $index === 0 ? 'active' : '' }}"
									id="class{{ $class->id }}-tab"
									data-bs-toggle="tab"
									data-bs-target="#class{{ $class->id }}"
									type="button"
									role="tab">
									<i class="fas fa-user-graduate"></i> {{ $class->name }}
								</button>
							</li>
							@endforeach
						</ul>
						<div class="tab-content" id="classTabContent">
							@foreach($classes as $index => $class)
							<div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="class{{ $class->id }}" role="tabpanel">
								<div class="row mt-4">
									@php
									$classStudents = $students->where('class_id', $class->id);
									@endphp

									@forelse($classStudents as $student)
									<div class="col-xl-3 col-lg-3 col-md-6 mb-4">
										<div class="card shadow-sm bg-white px-3 kanbanPreview-bx h-100">
											<div class="card-body">
												<!-- Student Photo -->
												<div class="text-center my-3">
													@if($student->photo)
													<img src="{{ asset('storage/'.$student->photo) }}" alt="{{ $student->name }}" class="rounded-0" style="width: 80px; height: 80px; object-fit: cover;">
													@else
													<img src="{{ asset('assets/images/avatar.png') }}" alt="Default Avatar" class="rounded-0" style="width: 80px; height: 80px; object-fit: cover;">
													@endif
												</div>
												<!-- Student Info -->
												<div class="text-center mb-3">
													<h4 class="fs-18 mb-1 font-w600">{{ $student->name }}</h4>
													<p class="mb-0">{{ $student->registration_number }}</p>
												</div>
												<!-- Additional Info -->
												<div class="info-list text-center">
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
												<div class="text-end mt-3">
													<a type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-student-modal-{{ $student->id }}">
														<i class="fa fa-edit me-2"></i>Edit
													</a>
													<a type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-student-{{ $student->id }}').submit();">
														<i class="fa fa-trash"></i>Delete
													</a>
													<form id="delete-student-{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-none">
														@csrf
														@method('DELETE')
													</form>
												</div>
											</div>
										</div>
									</div>
									@empty
									<div class="col-12">
										<div class="alert alert-info">
											No students found in this class.
										</div>
									</div>
									@endforelse
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection