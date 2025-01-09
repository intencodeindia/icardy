@extends('layouts.guest')

@section('content')
<div class="landing-page">
	<!-- Hero Section with Video Background -->
	<div class="hero-section position-relative">
		<div class="overlay"></div>
		<div class="container position-relative">
			<div class="row align-items-center min-vh-100">
				<div class="col-lg-6">
					<div class="hero-content text-white">
						<span class="badge bg-primary mb-3">ID Card Management System</span>
						<h1 class="display-4 fw-bold mb-4">Smart ID Solutions for Educational Institutions</h1>
						<p class="lead mb-4">One platform to create, manage and print professional ID cards for students, faculty, and staff. Featuring smart card integration, access control, and attendance tracking.</p>
						<div class="hero-buttons">
							<a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3">
								<i class="fas fa-rocket me-2"></i>Get Started Free
							</a>
							<a href="#features" class="btn btn-outline-light btn-lg">
								<i class="fas fa-play me-2"></i>Watch Demo
							</a>
						</div>
						<div class="mt-4 stats-container">
							<div class="row g-3">
								<div class="col-4">
									<div class="stat-item">
										<h3>1000+</h3>
										<p>Schools</p>
									</div>
								</div>
								<div class="col-4">
									<div class="stat-item">
										<h3>1M+</h3>
										<p>ID Cards</p>
									</div>
								</div>
								<div class="col-4">
									<div class="stat-item">
										<h3>99%</h3>
										<p>Satisfaction</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="auth-form floating-form">
						<div class="text-center mb-4">
							<img src="{{ asset('assets/images/logo/logo-idikaatti.png') }}" alt="Logo" class="img-fluid mb-3" style="max-height: 60px;">
							<h4 class="fw-bold">Sign in to your account</h4>
							<p class="text-muted">Access your ID card management dashboard</p>
						</div>
						
						@if(session('status'))
							<div class="alert alert-success">
								<i class="fas fa-check-circle me-2"></i>{{ session('status') }}
							</div>
						@endif
						
						@if($errors->any())
							<div class="alert alert-danger">
								<ul class="mb-0">
									@foreach($errors->all() as $error)
										<li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<form method="POST" action="{{ route('login') }}" class="floating-labels">
							@csrf
							<div class="form-floating mb-3">
								<input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
								<label for="email">Email address</label>
							</div>
							<div class="form-floating mb-3">
								<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
								<label for="password">Password</label>
							</div>
							<div class="row align-items-center mb-4">
								<div class="col">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="remember_me" name="remember">
										<label class="form-check-label" for="remember_me">Remember me</label>
									</div>
								</div>
								<div class="col text-end">
									<a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
								</div>
							</div>
							<button type="submit" class="btn btn-primary w-100 btn-lg mb-3">
								<i class="fas fa-sign-in-alt me-2"></i>Sign In
							</button>
							<div class="text-center">
								<span class="text-muted">Don't have an account?</span>
								<a href="{{ route('register') }}" class="text-primary fw-bold">Create Account</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Features Section -->
	<section id="features" class="features-section py-5">
		<div class="container">
			<div class="section-header text-center mb-5">
				<h6 class="text-primary fw-bold text-uppercase">Features</h6>
				<h2 class="display-5 fw-bold">Everything You Need for ID Management</h2>
				<p class="lead text-muted">Comprehensive solutions for all your identification needs</p>
			</div>
			<div class="row g-4">
				<div class="col-lg-3 col-md-6">
					<div class="feature-card">
						<div class="feature-icon bg-primary-soft">
							<i class="fas fa-id-card"></i>
						</div>
						<h4>Smart ID Cards</h4>
						<p>Create professional ID cards with RFID/NFC capabilities for access control.</p>
						<ul class="feature-list">
							<li><i class="fas fa-check"></i> RFID Integration</li>
							<li><i class="fas fa-check"></i> QR Code Support</li>
							<li><i class="fas fa-check"></i> Custom Templates</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="feature-card">
						<div class="feature-icon bg-success-soft">
							<i class="fas fa-users-cog"></i>
						</div>
						<h4>User Management</h4>
						<p>Efficiently manage different types of users and their permissions.</p>
						<ul class="feature-list">
							<li><i class="fas fa-check"></i> Role-based Access</li>
							<li><i class="fas fa-check"></i> Bulk Import</li>
							<li><i class="fas fa-check"></i> Data Security</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="feature-card">
						<div class="feature-icon bg-info-soft">
							<i class="fas fa-print"></i>
						</div>
						<h4>Batch Printing</h4>
						<p>Print multiple ID cards simultaneously with quality assurance.</p>
						<ul class="feature-list">
							<li><i class="fas fa-check"></i> Bulk Printing</li>
							<li><i class="fas fa-check"></i> Quality Control</li>
							<li><i class="fas fa-check"></i> Print Queue</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="feature-card">
						<div class="feature-icon bg-warning-soft">
							<i class="fas fa-chart-line"></i>
						</div>
						<h4>Analytics</h4>
						<p>Track and analyze ID card usage and access patterns.</p>
						<ul class="feature-list">
							<li><i class="fas fa-check"></i> Usage Reports</li>
							<li><i class="fas fa-check"></i> Access Logs</li>
							<li><i class="fas fa-check"></i> Data Insights</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ID Card Types Section -->
	<section class="id-types-section py-5 bg-light">
		<div class="container">
			<div class="section-header text-center mb-5">
				<h6 class="text-primary fw-bold text-uppercase">ID Card Types</h6>
				<h2 class="display-5 fw-bold">Solutions for Every Need</h2>
				<p class="lead text-muted">Customized ID cards for different user categories</p>
			</div>
			<div class="row g-4">
				<div class="col-md-4">
					<div class="card-type-item">
						<img src="{{ asset('images/student-card.png') }}" alt="Student ID" class="img-fluid mb-3">
						<h4>Student ID Cards</h4>
						<ul>
							<li>Class & Section Information</li>
							<li>Library Access Integration</li>
							<li>Transport Management</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card-type-item">
						<img src="{{ asset('images/faculty-card.png') }}" alt="Faculty ID" class="img-fluid mb-3">
						<h4>Faculty ID Cards</h4>
						<ul>
							<li>Department Details</li>
							<li>Access Control Integration</li>
							<li>Resource Management</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card-type-item">
						<img src="{{ asset('images/staff-card.png') }}" alt="Staff ID" class="img-fluid mb-3">
						<h4>Staff ID Cards</h4>
						<ul>
							<li>Role-based Access</li>
							<li>Time Tracking</li>
							<li>Facility Access</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="footer py-5">
		<div class="container">
			<div class="row g-4">
				<div class="col-lg-4">
					<img src="{{ asset('assets/images/logo/logo-idikaatti.png') }}" alt="Logo" class="footer-logo mb-3" style="max-height: 60px;">
					<p class="text-white-50">Your comprehensive solution for institutional ID card management.</p>
					<div class="social-links">
						<a href="#"><i class="fab fa-facebook"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-linkedin"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
					</div>
				</div>
				<div class="col-lg-2">
					<h5 class="text-white mb-3">Quick Links</h5>
					<ul class="footer-links">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Features</a></li>
						<li><a href="#">Pricing</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
				<div class="col-lg-2">
					<h5 class="text-white mb-3">Support</h5>
					<ul class="footer-links">
						<li><a href="#">Help Center</a></li>
						<li><a href="#">Documentation</a></li>
						<li><a href="#">API Reference</a></li>
						<li><a href="#">Status</a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<h5 class="text-white mb-3">Newsletter</h5>
					<p class="text-white-50">Stay updated with our latest features and releases.</p>
					<form class="newsletter-form">
						<div class="input-group">
							<input type="email" class="form-control" placeholder="Enter your email">
							<button class="btn btn-primary">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
			<hr class="mt-5 mb-4 border-light">
			<div class="row align-items-center">
				<div class="col-md-6">
					<p class="text-white-50 mb-0">© 2024 Your Company. All rights reserved.</p>
				</div>
				<div class="col-md-6 text-md-end">
					<a href="#" class="text-white-50 me-3">Privacy Policy</a>
					<a href="#" class="text-white-50">Terms of Service</a>
				</div>
			</div>
		</div>
	</footer>
</div>

<style>
/* Add these styles to your existing CSS */

.hero-section {
	background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
	position: relative;
	overflow: hidden;
}

.overlay {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background: rgba(0,0,0,0.5);
}

.floating-form {
	background: rgba(255,255,255,0.95);
	backdrop-filter: blur(10px);
	border-radius: 20px;
	padding: 2rem;
	box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}

.feature-card {
	background: white;
	border-radius: 15px;
	padding: 2rem;
	box-shadow: 0 5px 20px rgba(0,0,0,0.05);
	transition: all 0.3s ease;
	height: 100%;
}

.feature-card:hover {
	transform: translateY(-10px);
	box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.feature-icon {
	width: 70px;
	height: 70px;
	border-radius: 20px;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 30px;
	margin-bottom: 1.5rem;
}

.bg-primary-soft { background: rgba(13,110,253,0.1); color: #0d6efd; }
.bg-success-soft { background: rgba(25,135,84,0.1); color: #198754; }
.bg-info-soft { background: rgba(13,202,240,0.1); color: #0dcaf0; }
.bg-warning-soft { background: rgba(255,193,7,0.1); color: #ffc107; }

.feature-list {
	list-style: none;
	padding: 0;
	margin: 1rem 0 0;
}

.feature-list li {
	margin-bottom: 0.5rem;
	color: #6c757d;
}

.feature-list li i {
	color: #198754;
	margin-right: 0.5rem;
}

.card-type-item {
	background: white;
	border-radius: 15px;
	padding: 2rem;
	text-align: center;
	transition: all 0.3s ease;
}

.card-type-item:hover {
	transform: translateY(-10px);
	box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.footer {
	background: #1a1a1a;
}

.footer-links {
	list-style: none;
	padding: 0;
}

.footer-links li a {
	color: #ffffff80;
	text-decoration: none;
	transition: color 0.3s ease;
}

.footer-links li a:hover {
	color: white;
}

.social-links a {
	color: white;
	margin-right: 1rem;
	font-size: 1.2rem;
	transition: opacity 0.3s ease;
}

.social-links a:hover {
	opacity: 0.8;
}

.newsletter-form .form-control {
	background: rgba(255,255,255,0.1);
	border: none;
	color: white;
}

.stat-item {
	text-align: center;
	background: rgba(255,255,255,0.1);
	padding: 1rem;
	border-radius: 10px;
}

.stat-item h3 {
	color: white;
	margin: 0;
	font-size: 1.5rem;
	font-weight: bold;
}

.stat-item p {
	color: rgba(255,255,255,0.7);
	margin: 0;
	font-size: 0.9rem;
}

@media (max-width: 991.98px) {
	.hero-content {
		text-align: center;
		margin-bottom: 3rem;
	}
	
	.floating-form {
		margin-bottom: 2rem;
	}
}
</style>
@endsection