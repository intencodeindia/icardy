<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="ICARDY, ID cards, employee cards, student cards, faculty cards, identity management" />
	<meta name="author" content="ICARDY" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="ICARDY: Identity Card Management Platform for Businesses, Schools and Organizations" />
	<meta property="og:title" content="ICARDY - Identity Card Management Platform" />
	<meta property="og:description" content="Create and manage ID cards for employees, students and faculty members with ICARDY's comprehensive identity card management platform" />
	<meta name="format-detection" content="telephone=no">
    <title>ICARDY - Identity Card Management Platform</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
	<link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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

</head>

<body class="vh-100">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo/logo-idikaatti.png') }}" alt="Logo" style="max-height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('register') }}">Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
@yield('content')
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
						<li><a href="{{ route('about') }}">About Us</a></li>
						<li><a href="{{ route('features') }}">Features</a></li>
						<li><a href="{{ route('pricing') }}">Pricing</a></li>
						<li><a href="{{ route('contact') }}">Contact</a></li>
					</ul>
				</div>
				<div class="col-lg-2">
					<h5 class="text-white mb-3">Support</h5>
					<ul class="footer-links">
						<li><a href="{{ route('help.center') }}">Help Center</a></li>
						<li><a href="{{ route('documentation') }}">Documentation</a></li>
						<li><a href="{{ route('api.reference') }}">API Reference</a></li>
						<li><a href="{{ route('status') }}">Status</a></li>
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
					<a href="{{ route('privacy') }}" class="text-white-50 me-3">Privacy Policy</a>
					<a href="{{ route('terms') }}" class="text-white-50">Terms of Service</a>
				</div>
			</div>
		</div>
	</footer>
</div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/deznav-init.js') }}"></script>
	<script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
