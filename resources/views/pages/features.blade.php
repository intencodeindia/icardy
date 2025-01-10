@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="section-header text-center mb-5">
        <h6 class="text-primary fw-bold text-uppercase">Our Features</h6>
        <h1 class="display-4 fw-bold">Comprehensive ID Card Management</h1>
        <p class="lead text-muted">Discover all the powerful features that make ICARDY the perfect choice for your institution</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100">
                <div class="feature-icon bg-primary-soft">
                    <i class="fas fa-id-card"></i>
                </div>
                <h3>Smart ID Cards</h3>
                <p>Create professional ID cards with advanced security features.</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> RFID Integration</li>
                    <li><i class="fas fa-check"></i> QR Code Support</li>
                    <li><i class="fas fa-check"></i> NFC Capabilities</li>
                    <li><i class="fas fa-check"></i> Custom Templates</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100">
                <div class="feature-icon bg-success-soft">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Security Features</h3>
                <p>Enhanced security measures to protect identity data.</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Encryption</li>
                    <li><i class="fas fa-check"></i> Access Control</li>
                    <li><i class="fas fa-check"></i> Audit Trails</li>
                    <li><i class="fas fa-check"></i> Secure Storage</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100">
                <div class="feature-icon bg-info-soft">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Data Management</h3>
                <p>Efficient handling of student and staff information.</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Bulk Import</li>
                    <li><i class="fas fa-check"></i> Data Validation</li>
                    <li><i class="fas fa-check"></i> Search & Filter</li>
                    <li><i class="fas fa-check"></i> Export Options</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Additional Features Section -->
    <div class="text-center mb-5 mt-5">
        <h2 class="h3 mb-4">Additional Features</h2>
    </div>

    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="text-center feature-mini">
                <i class="fas fa-mobile-alt mb-3 text-primary"></i>
                <h4 class="h5">Mobile Access</h4>
                <p class="text-muted">Access your system on any device</p>
            </div>
        </div>
        <!-- Add more mini features -->
    </div>
</div>
@endsection 