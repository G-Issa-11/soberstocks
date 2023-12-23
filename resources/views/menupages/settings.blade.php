@extends('layouts.home')

@section('head')
@endsection

@section('content')
<div class="container mt-4">
<link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    {{-- delete profile picture --}}
    @auth
    <div class="mt-4 text-center">
            <div class="profile-picture-container position-relative" id="profilePictureContainer">
                @if (Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="profile-picture" id="profilePicture">
                @else
                    <!-- Display default profile picture when the user doesn't have one -->
                    <img src="{{ asset('assets/images/user-avatar.png') }}" alt="Default Profile Picture" class="profile-picture" id="profilePicture">
                @endif
                
                <form method="POST" action="{{ route('settings.deleteProfilePicture') }}" id="deleteProfilePictureForm">
                    @csrf
                    <button type="submit" class="delete-button" id="deleteButton">🗑️</button>
                </form>
            </div>
        </div>
        

    <!-- Update Password Section -->
    <div class="card">
        <div class="card-header">
            <h4>Update Password</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                
            @endif

            <form method="POST" action="{{ route('settings.updatePassword') }}">
                @csrf
                @error('new_password')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                    
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-update">Update Password</button>
            </form>
        </div>
    </div>

    <!-- Update Profile Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h4>Update Profile</h4>
        </div>
        <div class="card-body">
            @if(session('success_profile'))
                <div class="alert alert-success" role="alert">
                    {{ session('success_profile') }}
                </div>
            @endif

            @if(session('error_profile'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error_profile') }}
                </div>
            @endif

            <form method="POST" action="{{ route('settings.updateProfile') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                </div>

                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                </div>

                {{-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="delete_profile_picture" name="delete_profile_picture" value="1">
                    <label class="form-check-label" for="delete_profile_picture">Delete Profile Picture</label>
                </div> --}}

                <button type="submit" class="btn btn-update">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endauth

@endsection
