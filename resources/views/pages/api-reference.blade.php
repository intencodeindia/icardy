@extends('layouts.guest')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="api-sidebar p-4">
                <h5 class="mb-3">API Reference</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#introduction">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#authentication">Authentication</a>
                    </li>
                    <!-- Add more API sections -->
                </ul>
            </div>
        </div>
        <div class="col-lg-9 p-4">
            <div class="api-content">
                <h1>API Documentation</h1>
                <p class="lead">Complete reference for the ICARDY API</p>
                <!-- Add API documentation content -->
            </div>
        </div>
    </div>
</div>
@endsection 