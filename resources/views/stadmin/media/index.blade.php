@extends('layouts.staradmin')
@section('title', 'Services media')
@section('content')

<div class="container">
    <h2 class="mb-4">Service Media</h2>

    <!-- Button to Open the Modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#uploadModal">
        Add Media
    </button>

    <!-- Display Images and Videos -->
    <div class="row">
        @foreach($medias as $media)
        <div class="col-md-4 mb-3">
            <div class="card">
                @if($media->type === 'image')
                <img src="{{ asset('image/services/' . $media->file_path) }}" class="card-img-top" alt="Service Image">
                @elseif($media->type === 'video')
                <video class="card-img-top" controls>
                    <source src="{{ asset('image/services/' . $media->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                @endif
                <div class="card-body text-center">
                    <form action="{{ route('service-media.destroy', $media->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal for Uploading Media -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-4">
                        <label for="service_id" value="{{ __('service_id') }}">Service Name</label>
                        <select class="form-control" name="service_id" id="service_id" required>
                            <option value="">Select service name</option>
                            @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                        @error('service_id') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="mediaFiles" class="form-label">Select Images or Videos</label>
                        <input type="file" class="form-control" name="files[]" id="mediaFiles" multiple>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("{{ route('service-media.store') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                alert("Files uploaded successfully!");
                location.reload();
            })
            .catch(error => console.error("Error:", error));
    });
</script>
@endsection