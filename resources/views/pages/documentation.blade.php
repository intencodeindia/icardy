@extends('layouts.guest')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="documentation-sidebar p-4 sticky-top" style="top: 2rem;">
                <div class="d-flex align-items-center mb-4">
                    <i class="fas fa-book text-primary me-2"></i>
                    <h5 class="mb-0">Documentation</h5>
                </div>
                <div class="search-box mb-4">
                    <input type="text" class="form-control" placeholder="Search docs...">
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#getting-started">
                            <i class="fas fa-rocket me-2"></i>
                            Getting Started
                        </a>
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#installation">Installation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#configuration">Configuration</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">
                            <i class="fas fa-star me-2"></i>
                            Features
                        </a>
                    </li>
                    <!-- Add more navigation items -->
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 p-4">
            <div class="documentation-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Documentation</li>
                    </ol>
                </nav>

                <h1 class="display-5 mb-4">ICARDY Documentation</h1>
                <p class="lead">Complete guide to using the ICARDY platform</p>

                <div class="content-section mb-5" id="getting-started">
                    <h2>Getting Started</h2>
                    <p>Welcome to ICARDY documentation. This guide will help you get started with our ID card management system...</p>
                </div>

                <div class="content-section mb-5" id="installation">
                    <h3>Installation</h3>
                    <p>Follow these steps to install and set up ICARDY in your environment...</p>
                    <div class="code-block bg-light p-3 rounded">
                        <pre><code>composer require icardy/core
npm install
php artisan migrate</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.documentation-sidebar {
    background: #f8f9fa;
    border-radius: 8px;
    height: calc(100vh - 4rem);
    overflow-y: auto;
}

.documentation-sidebar .nav-link {
    color: #495057;
    padding: 0.5rem 0;
}

.documentation-sidebar .nav-link:hover {
    color: #0d6efd;
}

.documentation-sidebar .nav-link.active {
    color: #0d6efd;
    font-weight: 500;
}

.code-block {
    background: #f8f9fa;
    border-radius: 4px;
    font-family: monospace;
}

.content-section {
    scroll-margin-top: 2rem;
}
</style>
@endsection 