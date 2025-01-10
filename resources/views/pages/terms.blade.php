@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="display-4 mb-4">Terms of Service</h1>
            <p class="lead mb-5">Last updated: {{ now()->format('F j, Y') }}</p>

            <div class="terms-content">
                <section class="mb-5">
                    <h2>1. Acceptance of Terms</h2>
                    <p>Detailed terms of service content...</p>
                </section>
                <!-- Add more terms sections -->
            </div>
        </div>
    </div>
</div>
@endsection 