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
					<div class="feature-icon d-flex align-items-center justify-content-center bg-info-soft">
							<i class="fas fa-user-graduate"></i>
						</div>
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
						<div class="feature-icon d-flex align-items-center justify-content-center bg-success-soft">
							<i class="fas fa-user-tie"></i>
						</div>
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
						
						<div class="feature-icon d-flex align-items-center justify-content-center bg-info-soft">
							<i class="fas fa-user-shield"></i>
						</div>
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
	<section class="process-section py-5">
		<div class="container">
			<div class="section-header text-center mb-5">
				<h6 class="text-primary fw-bold text-uppercase">How it works</h6>
				<h2 class="display-5 fw-bold">Simple 4-Step Process</h2>
				<p class="lead text-muted">Get started with our ID card management system in minutes</p>
			</div>
			<div class="row g-4">
				<div class="col-md-3">
					<div class="process-item text-center">
						<div class="process-icon bg-primary-soft mb-3">
							<i class="fas fa-user-plus fa-2x"></i>
						</div>
						<h4>1. Register School</h4>
						<p>Create your school account and verify your institution</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="process-item text-center">
						<div class="process-icon bg-success-soft mb-3">
							<i class="fas fa-users fa-2x"></i>
						</div>
						<h4>2. Add Users</h4>
						<p>Import or add students, faculty, and staff details</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="process-item text-center">
						<div class="process-icon bg-info-soft mb-3">
							<i class="fas fa-id-card fa-2x"></i>
						</div>
						<h4>3. Design Cards</h4>
						<p>Choose templates and customize ID card designs</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="process-item text-center">
						<div class="process-icon bg-warning-soft mb-3">
							<i class="fas fa-print fa-2x"></i>
						</div>
						<h4>4. Print & Manage</h4>
						<p>Print ID cards and start managing access</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Pricing Section -->
	<section class="pricing-section py-5 bg-light" id="pricing">
		<div class="container">
			<div class="section-header text-center mb-5">
				<h6 class="text-primary fw-bold text-uppercase">Pricing Plans</h6>
				<h2 class="display-5 fw-bold">Choose Your Plan</h2>
				<p class="lead text-muted">Affordable annual plans based on your student count</p>
			</div>
			<div class="row g-4 justify-content-center">
				<div class="col-lg-4 col-md-6">
					<div class="pricing-card">
						<div class="pricing-header">
							<h3>Starter</h3>
							<div class="price">
								<span class="currency">$</span>
								<span class="amount">499</span>
								<span class="period">/year</span>
							</div>
							<p>Up to 500 Students</p>
						</div>
						<div class="pricing-features">
							<ul>
								<li><i class="fas fa-check"></i> Basic ID Card Templates</li>
								<li><i class="fas fa-check"></i> QR Code Integration</li>
								<li><i class="fas fa-check"></i> Bulk Import</li>
								<li><i class="fas fa-check"></i> Basic Analytics</li>
								<li><i class="fas fa-check"></i> Email Support</li>
								<li class="disabled"><i class="fas fa-times"></i> RFID Integration</li>
								<li class="disabled"><i class="fas fa-times"></i> API Access</li>
							</ul>
						</div>
						<div class="pricing-footer">
							<a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg w-100">Get Started</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="pricing-card popular">
						<div class="popular-badge">Most Popular</div>
						<div class="pricing-header">
							<h3>Professional</h3>
							<div class="price">
								<span class="currency">$</span>
								<span class="amount">999</span>
								<span class="period">/year</span>
							</div>
							<p>Up to 2000 Students</p>
						</div>
						<div class="pricing-features">
							<ul>
								<li><i class="fas fa-check"></i> Advanced ID Card Templates</li>
								<li><i class="fas fa-check"></i> QR Code Integration</li>
								<li><i class="fas fa-check"></i> Bulk Import/Export</li>
								<li><i class="fas fa-check"></i> Advanced Analytics</li>
								<li><i class="fas fa-check"></i> Priority Support</li>
								<li><i class="fas fa-check"></i> RFID Integration</li>
								<li><i class="fas fa-check"></i> Basic API Access</li>
							</ul>
						</div>
						<div class="pricing-footer">
							<a href="{{ route('register') }}" class="btn btn-primary btn-lg w-100">Get Started</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="pricing-card">
						<div class="pricing-header">
							<h3>Enterprise</h3>
							<div class="price">
								<span class="currency">$</span>
								<span class="amount">1999</span>
								<span class="period">/year</span>
							</div>
							<p>Unlimited Students</p>
						</div>
						<div class="pricing-features">
							<ul>
								<li><i class="fas fa-check"></i> Custom ID Card Templates</li>
								<li><i class="fas fa-check"></i> Advanced Integration Suite</li>
								<li><i class="fas fa-check"></i> Advanced User Management</li>
								<li><i class="fas fa-check"></i> Custom Analytics</li>
								<li><i class="fas fa-check"></i> 24/7 Premium Support</li>
								<li><i class="fas fa-check"></i> Full RFID Integration</li>
								<li><i class="fas fa-check"></i> Complete API Access</li>
							</ul>
						</div>
						<div class="pricing-footer">
							<a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg w-100">Contact Sales</a>
						</div>
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

/* Process Section Styles */
.process-item {
	background: white;
	border-radius: 15px;
	padding: 2rem;
	box-shadow: 0 5px 20px rgba(0,0,0,0.05);
	transition: all 0.3s ease;
}

.process-icon {
	width: 80px;
	height: 80px;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	margin: 0 auto;
}

/* Pricing Section Styles */
.pricing-card {
	background: white;
	border-radius: 20px;
	padding: 2rem;
	box-shadow: 0 5px 20px rgba(0,0,0,0.05);
	transition: all 0.3s ease;
	position: relative;
	border: 1px solid #eee;
}

.pricing-card.popular {
	transform: scale(1.05);
	border: 2px solid #0d6efd;
}

.popular-badge {
	position: absolute;
	top: -12px;
	left: 50%;
	transform: translateX(-50%);
	background: #0d6efd;
	color: white;
	padding: 5px 15px;
	border-radius: 20px;
	font-size: 0.8rem;
}

.pricing-header {
	text-align: center;
	padding-bottom: 2rem;
	border-bottom: 1px solid #eee;
}

.price {
	margin: 1.5rem 0;
}

.price .currency {
	font-size: 1.5rem;
	vertical-align: top;
}

.price .amount {
	font-size: 3.5rem;
	font-weight: bold;
}

.price .period {
	color: #6c757d;
}

.pricing-features {
	padding: 2rem 0;
}

.pricing-features ul {
	list-style: none;
	padding: 0;
	margin: 0;
}

.pricing-features li {
	margin-bottom: 1rem;
	color: #6c757d;
}

.pricing-features li i {
	margin-right: 0.5rem;
	color: #198754;
}

.pricing-features li.disabled {
	color: #adb5bd;
}

.pricing-features li.disabled i {
	color: #dc3545;
}

.pricing-footer {
	text-align: center;
}

@media (max-width: 991.98px) {
	.pricing-card.popular {
		transform: scale(1);
	}
}
</style>
@endsection