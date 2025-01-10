@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="display-4 mb-4">Privacy Policy</h1>
            <p class="lead mb-5">Last updated: {{ now()->format('F j, Y') }}</p>

            <div class="privacy-content">
                <section class="mb-5">
                    <h2>1. Information We Collect</h2>
                    <p>Detailed privacy policy content...</p>
                </section>
                <!-- Add more privacy policy sections -->
            </div>
        </div>
    </div>
</div>
@endsection 