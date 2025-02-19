<div>
    
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form wire:submit.prevent="createBlog">
                        @csrf
                        <div class="form-group">
                            <label for="title" value="{{ __('title') }}">title *</label>
                            <input type="text" class="form-control" id="title" name="title" wire:model="title" wire:keyup="generateSlug" required>
                            @error('title') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="slug" value="{{ __('slug') }}">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" wire:model="slug" required>
                            @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="blog_category" value="{{ __('blog_category') }}">blog category</label>
                            <select class="form-control" wire:model="blog_category">
                                <option value="">Select blog category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('blog_category') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="content" value="{{ __('content') }}">content</label>
                            <textarea class="form-control" id="summernote" name="content" wire:model="content" required></textarea>
                            @error('content') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="image" value="{{ __('image') }}">image</label>
                            <input type="file" class="form-control" id="image" name="image" wire:model="image" required>
                            @error('image') <p class="text-danger">{{$message}}</p>@enderror
                            @if($image)
                            <img src="{{$image->temporaryUrl()}}" width="60" />
                            @endif
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="thumbnail" value="{{ __('thumbnail') }}">thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" wire:model="thumbnail" required>
                            @error('thumbnail') <p class="text-danger">{{$message}}</p>@enderror
                            @if($thumbnail)
                            <img src="{{$thumbnail->temporaryUrl()}}" width="60" />
                            @endif
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Blog</span>
                            </button>
                        </div><!-- End .form-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>