@extends('layouts.guest')
@section('title','Edit Profile')
@section('content')


    <div class="container">
        <div class="bg-white card-box border-20 mt-40">
            <h4 class="dash-title-three">Edit Profile</h4>
            <div class="row">
                <form action="{{ route('profile.update', $user->id) }} }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30">
                        <button type="submit" class="dash-btn-two tran3s me-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection