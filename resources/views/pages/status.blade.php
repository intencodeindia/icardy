@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">System Status</h1>
        <p class="lead text-muted">Current status of ICARDY services</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="status-indicator bg-success me-2"></div>
                        <h3 class="h5 mb-0">All Systems Operational</h3>
                    </div>
                    <p class="text-muted">Updated: {{ now()->format('F j, Y H:i:s') }}</p>
                </div>
            </div>
            <!-- Add status components -->
        </div>
    </div>
</div>
@endsection 