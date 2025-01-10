@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Help Center</h1>
        <p class="lead text-muted">Find answers to common questions and learn how to use ICARDY</p>
        
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6">
                <div class="search-box">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Search for help...">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-rocket text-primary me-2"></i>
                        <h3 class="h5 mb-0">Getting Started</h3>
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none">Quick Start Guide</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">System Requirements</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Account Setup</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">First Steps</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-id-card text-success me-2"></i>
                        <h3 class="h5 mb-0">ID Card Management</h3>
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none">Creating ID Cards</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Template Design</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Batch Processing</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Card Printing</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-cogs text-info me-2"></i>
                        <h3 class="h5 mb-0">System Settings</h3>
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none">User Management</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Security Settings</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Integration Setup</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none">Customization</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Articles Section -->
    <div class="mt-5">
        <h2 class="h4 mb-4">Popular Articles</h2>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">How to Create Your First ID Card</h5>
                        <p class="card-text text-muted">Step-by-step guide to creating and printing your first ID card...</p>
                        <a href="#" class="btn btn-link px-0">Read More →</a>
                    </div>
                </div>
            </div>
            <!-- Add more popular articles -->
        </div>
    </div>
</div>
@endsection 