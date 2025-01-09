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
@endsection
