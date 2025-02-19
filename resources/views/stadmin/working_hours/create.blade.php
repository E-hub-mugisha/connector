@extends('layouts.staradmin')
@section('title','Add Hours')
@section('content')

<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Working hours</h6>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif

    <form action="{{ route('working_hours.store') }}" method="POST">
        @csrf
        <input type="hidden" name="sprovider_id" value="{{ $sprovider->id }}">
        <div class="mb-3">
            <label for="day" class="form-label">Day</label>
            <input type="text" class="form-control" name="day" id="day" placeholder="Enter Day">
            @error('day')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="is_closed" class="form-label">Is Closed</label>
            <input type="checkbox" name="is_closed" id="is_closed" value="1">
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" class="form-control" name="start_time" id="start_time">
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" class="form-control" name="end_time" id="end_time">
            @error('end_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('is_closed').addEventListener('change', function() {
    let timeFields = document.querySelectorAll('#time-fields');
    if (this.checked) {
        timeFields.forEach(function(field) {
            field.style.display = 'none';
        });
    } else {
        timeFields.forEach(function(field) {
            field.style.display = 'block';
        });
    }
});
</script>
@endsection
