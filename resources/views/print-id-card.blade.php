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
			<select class="form-control" id="card_size">
				<option value="cr80">CR80 (Standard)</option>
				<option value="vertical">Vertical (Large)</option>
			</select>
			<button type="button" class="btn btn-primary" onclick="printIDCards()">
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
		@include('partials.id-cards') <!-- Include student ID cards partial -->
	</div>
</div>

@push('styles')
<style>
/* Base Card Styles */
.id-card {
	width: 3.375in; /* Default size for CR80 */
	height: 2.125in;
	background: #fff;
	border: 1px solid #cc0000;
	position: relative;
	overflow: hidden;
	margin: 10px;
	padding: 0.1in;
}

.id-card.vertical {
	width: 2.125in; /* Large size for vertical */
	height: 3.375in;
}

.id-card .header {
	background: linear-gradient(to right, #cc0000 0%, #990000 100%);
	margin: -0.1in -0.1in 0.15in -0.1in;
	padding: 0.1in;
	display: flex;
	align-items: center;
}

.id-card .school-logo {
	width: 0.5in;
	height: 0.5in;
	background: white;
	border-radius: 50%;
	padding: 0.05in;
	margin-right: 0.1in;
}

.id-card .school-info {
	flex: 1;
}

.id-card .school-name {
	color: white;
	font-size: 0.14in;
	font-weight: bold;
	margin: 0;
	text-transform: uppercase;
	line-height: 1.2;
}

.id-card .school-address {
	color: rgba(255,255,255,0.9);
	font-size: 0.08in;
	margin: 0.02in 0 0;
	line-height: 1.2;
}

.id-card .content {
	display: flex;
	gap: 0.15in;
}

.id-card .photo-container {
	width: 0.9in;
}

.id-card .student-photo {
	width: 0.9in;
	height: 1.1in;
	border: 2px solid #cc0000;
	overflow: hidden;
	background: #fff;
}

.id-card .student-photo img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.id-card .details {
	flex: 1;
	font-size: 0.1in;
}

.id-card .student-name {
	font-weight: bold;
	color: #cc0000;
	font-size: 0.12in;
	margin-bottom: 0.05in;
	text-transform: uppercase;
}

.id-card .info-table {
	width: 100%;
	border-spacing: 0;
	border-collapse: collapse;
}

.id-card .info-table td {
	padding: 0.02in 0;
	line-height: 1.3;
	vertical-align: top;
}

.id-card .info-table td:first-child {
	width: 0.8in;
	color: #666;
	font-weight: 500;
}

.id-card .footer {
	position: absolute;
	bottom: 0.1in;
	left: 0.1in;
	right: 0.1in;
	display: flex;
	justify-content: space-between;
	align-items: flex-end;
	border-top: 1px solid #eee;
	padding-top: 0.05in;
}

.id-card .signature {
	text-align: center;
}

.id-card .signature img {
	height: 0.3in;
	max-width: 1in;
	object-fit: contain;
}

.id-card .signature-label {
	font-size: 0.07in;
	color: #666;
	margin-top: 0.02in;
}

/* Print Styles */
@media print {
	@page {
		size: A4;
		margin: 0.5cm;
	}
	
	.no-print {
		display: none !important;
	}
	
	.id-card {
		page-break-inside: avoid;
		margin: 0.125in;
		box-shadow: none;
		-webkit-print-color-adjust: exact;
		print-color-adjust: exact;
	}

	.col-md-4 {
		width: 33.33%;
		float: left;
		padding: 0.125in;
	}
}
</style>
@endpush

@push('scripts')
<script>
function printIDCards() {
	window.print();
}

$(document).ready(function() {
	// Card size switching
	$('#card_size').change(function() {
		const size = $(this).val();
		$('.id-card').removeClass('cr80 vertical').addClass(size);
	});

	// School filter change
	$('#school_filter').change(function() {
		var schoolId = $(this).val();
		if(schoolId) {
			loadClasses(schoolId);
			$('#class_filter').prop('disabled', false);
			filterStudents();
		} else {
			$('#class_filter').prop('disabled', true).html('<option value="">Select Class</option>');
			$('#section_filter').prop('disabled', true).html('<option value="">Select Section</option>');
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
			$('#section_filter').prop('disabled', true).html('<option value="">Select Section</option>');
		}
	});

	// Section filter change
	$('#section_filter, #sort_by').change(function() {
		filterStudents();
	});

	function loadClasses(schoolId) {
		$.get('/api/schools/' + schoolId + '/classes', function(data) {
			var html = '<option value="">Select Class</option>';
			data.forEach(function(cls) {
				html += `<option value="${cls.id}">${cls.name}</option>`;
			});
			$('#class_filter').html(html);
		});
	}

	function loadSections(classId) {
		$.get('/api/classes/' + classId + '/sections', function(data) {
			var html = '<option value="">Select Section</option>';
			data.forEach(function(section) {
				html += `<option value="${section.id}">${section.name}</option>`;
			});
			$('#section_filter').html(html);
		});
	}

	function filterStudents() {
		showLoading();
		var schoolId = $('#school_filter').val();
		var classId = $('#class_filter').val();
		var sectionId = $('#section_filter').val();
		var sortBy = $('#sort_by').val();

		$.get('/api/students/filter', {
			school_id: schoolId,
			class_id: classId,
			section_id: sectionId,
			sort_by: sortBy
		}, function(data) {
			$('#id-cards-container').html(data);
		}).fail(function() {
			$('#id-cards-container').html('<div class="text-center p-5"><i class="fas fa-exclamation-circle text-danger fa-2x"></i><p class="mt-2">Error loading ID cards. Please try again.</p></div>');
		});
	}
});
</script>
@endpush
@endsection
