<form action="{{ route('abouts.update', $about->id) }}" method="post" id="edit-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label for="e_title" class="col-form-label pt-0">Title <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="e_title" name="title" value="{{ old('title', $about->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="sub_title" class="col-form-label pt-0">Sub Title</label>
                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title', $about->sub_title) }}">
                @error('sub_title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="our_mission" class="col-form-label pt-0">Our Mission</label>
                <textarea class="form-control" id="our_mission" name="our_mission">{{ old('our_mission', $about->our_mission) }}</textarea>
                @error('our_mission')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="self_image" class="col-form-label pt-0">Current Self Image</label>
                <br>
                @if($about->self_image)
                    <img src="{{ asset($about->self_image) }}" alt="self_image" class="img-fluid" style="max-width: 100px;">
                @else
                    <p>No image uploaded.</p>
                @endif
            </div>

            <div class="form-group">
                <label for="self_image" class="col-form-label pt-0">Upload New Image (optional)</label>
                <input type="file" class="dropify" data-height="200" name="self_image" />
                <small class="form-text text-muted">Upload a new image for the About section (Max: 2MB)</small>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>


<script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>
