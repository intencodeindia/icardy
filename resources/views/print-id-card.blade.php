@extends('layouts.app')

@section('content')
<div class="row page-titles mx-0 no-print">
	<div class="col-sm-6 p-md-0">
		<div class="welcome-text">
			<h4>Student ID Cards</h4>
		</div>
	</div>
	<div class="col-sm-6 p-md-0 justify-content-end mt-2 mt-sm-0 d-flex">
		<div class="d-flex gap-2">
			<button type="button" class="btn btn-primary" id="printButton">
				<i class="fas fa-print"></i> Print Cards
			</button>
		</div>
	</div>
</div>

<!-- Filters Section -->
<div class="row mb-4 no-print">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-end">
					<div class="col-md-3">
						<label class="form-label">School</label>
						<select id="school_filter" class="form-control">
							<option value="">All Schools</option>
							@foreach($schools as $school)
								<option value="{{ $school->id }}">{{ $school->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						<label class="form-label">Class</label>
						<select id="class_filter" class="form-control" disabled>
							<option value="">All Classes</option>
						</select>
					</div>
					<div class="col-md-3">
						<label class="form-label">Section</label>
						<select id="section_filter" class="form-control" disabled>
							<option value="">All Sections</option>
						</select>
					</div>
					<div class="col-md-3">
						<label class="form-label">Sort By</label>
						<select id="sort_by" class="form-control">
							<option value="name">Name (A-Z)</option>
							<option value="name_desc">Name (Z-A)</option>
							<option value="registration_number">Registration Number (Asc)</option>
							<option value="registration_number_desc">Registration Number (Desc)</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ID Cards Print Area -->
<div class="id-cards-print-area">
	<div class="row" id="id-cards-container">
		@include('partials.id-cards')
	</div>
</div>

@push('styles')
<style>
@media print {
	@page {
		size: 3.375in 2.125in landscape;
		margin: 0;
	}
	
	html, body {
		margin: 0;
		padding: 0;
		width: 3.375in;
		height: 2.125in;
	}
	
	.no-print {
		display: none !important;
	}
	
	.id-cards-print-area {
		padding: 0;
	}
	
	.row {
		display: block;
	}
	
	.col-md-3 {
		width: 100% !important;
		padding: 0 !important;
		float: none !important;
		page-break-after: always;
	}
	
	.id-card {
		margin: 0 !important;
		box-shadow: none !important;
		border-radius: 0 !important;
	}
	
	* {
		-webkit-print-color-adjust: exact !important;
		print-color-adjust: exact !important;
		color-adjust: exact !important;
	}
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
	// Print functionality
	document.getElementById('printButton').addEventListener('click', function() {
		const printStyle = document.createElement('style');
		printStyle.innerHTML = `
			@page {
				size: 3.375in 2.125in landscape;
				margin: 0;
			}
			@media print {
				html, body {
					width: 3.375in;
					height: 2.125in;
				}
				.id-card {
					page-break-after: always;
				}
			}
		`;
		document.head.appendChild(printStyle);
		
		window.print();
		
		// Remove the style after printing
		setTimeout(() => {
			document.head.removeChild(printStyle);
		}, 1000);
	});

	// Filter functionality
	$('#school_filter').change(function() {
		var schoolId = $(this).val();
		if(schoolId) {
			loadClasses(schoolId);
			$('#class_filter').prop('disabled', false);
			filterStudents();
		} else {
			$('#class_filter').prop('disabled', true).html('<option value="">All Classes</option>');
			$('#section_filter').prop('disabled', true).html('<option value="">All Sections</option>');
			filterStudents();
		}
	});

	// Class filter change
	$('#class_filter').change(function() {
		var classId = $(this).val();
		if(classId) {
			loadSections(classId);
			$('#section_filter').prop('disabled', false);
			filterStudents();
		} else {
			$('#section_filter').prop('disabled', true).html('<option value="">All Sections</option>');
			filterStudents();
		}
	});

	// Section filter and sort change
	$('#section_filter, #sort_by').change(function() {
		filterStudents();
	});

	function loadClasses(schoolId) {
		$.get('/api/schools/' + schoolId + '/classes', function(data) {
			var html = '<option value="">All Classes</option>';
			data.forEach(function(cls) {
				html += `<option value="${cls.id}">${cls.name}</option>`;
			});
			$('#class_filter').html(html);
		});
	}

	function loadSections(classId) {
		$.get('/api/classes/' + classId + '/sections', function(data) {
			var html = '<option value="">All Sections</option>';
			data.forEach(function(section) {
				html += `<option value="${section.id}">${section.name}</option>`;
			});
			$('#section_filter').html(html);
		});
	}

	function filterStudents() {
		$('#id-cards-container').html('<div class="text-center p-5"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-2">Loading ID cards...</p></div>');
		
		var schoolId = $('#school_filter').val();
		var classId = $('#class_filter').val();
		var sectionId = $('#section_filter').val();
		var sortBy = $('#sort_by').val();

		$.get('/api/students/filter', {
			school_id: schoolId,
			class_id: classId,
			section_id: sectionId,
			sort_by: sortBy
		})
		.done(function(data) {
			$('#id-cards-container').html(data);
		})
		.fail(function() {
			$('#id-cards-container').html('<div class="text-center p-5"><i class="fas fa-exclamation-circle text-danger fa-2x"></i><p class="mt-2">Error loading ID cards. Please try again.</p></div>');
		});
	}
});
</script>
@endpush
@endsection
