@extends('layouts.guest')
@section('title','Profile')
@section('content')

<!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->

        <div class="container">
  <div class="main-body">

    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                width="150">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $profile->name }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $profile->email }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $profile->phone }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ $profile->address }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-info " 
                  href="{{ route('CustomerProfile.edit')}}">Edit</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
    
<!-- /.dashboard-body -->

@endsection