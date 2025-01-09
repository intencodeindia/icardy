@extends('layouts.app')

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Profile Settings</h4>
            <p class="mb-0">View and manage your profile</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="profile-statistics">
                    <div class="text-center">
                        <div class="profile-photo">
                            <img src="{{ asset('images/profile/profile.png') }}" class="img-fluid rounded-circle" alt="">
                        </div>
                        <h3 class="mt-4 mb-1">{{ Auth::user()->name }}</h3>
                        <p class="text-primary mb-0">{{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}</p>
                        @if(Auth::user()->email_verified_at)
                            <span class="badge badge-success mt-2">Email Verified</span>
                        @else
                            <span class="badge badge-warning mt-2">Email Not Verified</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#profile-info" data-bs-toggle="tab" class="nav-link active show">
                                    <i class="fa fa-user me-2"></i> Profile Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#change-password" data-bs-toggle="tab" class="nav-link">
                                    <i class="fa fa-lock me-2"></i> Change Password
                                </a>
                            </li>
                        </ul>
                        
                        <div class="tab-content">
                            <div id="profile-info" class="tab-pane fade active show">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Account Information</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name</label>
                                                    <p class="form-control-static">{{ Auth::user()->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email Address</label>
                                                    <p class="form-control-static">{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Account Role</label>
                                                    <p class="form-control-static">
                                                        <span class="badge badge-primary">
                                                            {{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Member Since</label>
                                                    <p class="form-control-static">
                                                        {{ Auth::user()->created_at->format('d M Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="change-password" class="tab-pane fade">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Security Settings</h4>
                                        @if(session('status'))
                                            <div class="alert alert-success">
                                                <i class="fa fa-check-circle me-2"></i>
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        
                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="mb-0">
                                                    @foreach($errors->all() as $error)
                                                        <li><i class="fa fa-times-circle me-2"></i>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('profile.password.update') }}">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Current Password</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                            <input type="password" name="current_password" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">New Password</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                            <input type="password" name="password" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Confirm New Password</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                            <input type="password" name="password_confirmation" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end mt-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save me-2"></i>Update Password
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection