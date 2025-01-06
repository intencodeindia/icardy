@extends('layouts.app')

@section('content')
<!-- Add Project -->
<div class="row page-titles mx-0">
	<div class="col-sm-6">
	</div>
	<div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xl-3 col-lg-3 col-md-6">
		<div class="card kanbanPreview-bx">
			<div class="card-body">
				<div class="sub-card bg-primary d-flex text-white">
					<div class="me-auto pe-2">
						<h4 class="fs-20 mb-0 font-w600 text-white">To Do</h4>
						<span class="fs-14 op6 font-w200">Tasks to be done</span>
					</div>
					<a href="javascript:void(0);" class="plus-icon"><i class="fa fa-eye" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-lg-3 col-md-6">
		<div class="card kanbanPreview-bx">
			<div class="card-body">
				<div class="sub-card bg-info d-flex text-white">
					<div class="me-auto pe-2">
						<h4 class="fs-20 mb-0 font-w600 text-white">In Progress</h4>
						<span class="fs-14 op6 font-w200">Tasks in progress</span>
					</div>
					<a href="javascript:void(0);" class="plus-icon"><i class="fa fa-eye" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-lg-3 col-md-6">
		<div class="card kanbanPreview-bx">
			<div class="card-body">
				<div class="sub-card bg-warning d-flex text-white">
					<div class="me-auto pe-2">
						<h4 class="fs-20 mb-0 font-w600 text-white">Review</h4>
						<span class="fs-14 op6 font-w200">Tasks in review</span>
					</div>
					<a href="javascript:void(0);" class="plus-icon"><i class="fa fa-eye" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-lg-3 col-md-6">
		<div class="card kanbanPreview-bx">
			<div class="card-body">
				<div class="sub-card bg-success d-flex text-white">
					<div class="me-auto pe-2">
						<h4 class="fs-20 mb-0 font-w600 text-white">Completed</h4>
						<span class="fs-14 op6 font-w200">Finished tasks</span>
					</div>
					<a href="javascript:void(0);" class="plus-icon"><i class="fa fa-eye" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection