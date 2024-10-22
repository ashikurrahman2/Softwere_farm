<form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <label for="service_title" class="col-form-label pt-0">Service Title <sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="title" name="service_title" value="{{ $service->service_title }}" required>
        </div>

        <div class="col-md-12">
            <label for="service_description" class="col-form-label pt-0">Service Description</label>
            <textarea class="form-control" id="sub_title" name="service_description">{{ $service->service_description }}</textarea>
        </div>

        <div class="col-md-12">
            <label for="experience" class="col-form-label pt-0">Service Experience <sup class="text-size-20 top-1">*</sup></label>
            <input type="number" class="form-control" id="experience" name="experience" value="{{ $service->experience }}" required>
            <small id="textHelp" class="form-text text-muted">Must be integer number</small>
        </div>

        <div class="form-group">
            <label for="image" class="col-form-label pt-0">Current Service Image</label>
            <br>
            @if($service->service_image)
                <img src="{{ asset($service->service_image) }}" alt="service_image" class="img-fluid" style="max-width: 100px;">
            @else
                <p>No image uploaded.</p>
            @endif
        </div>

        <div class="form-group">
            <label for="service_image" class="col-form-label pt-0">Service Image</label>
            <input type="file" class="dropify" data-height="200" name="service_image" data-default-file="{{ asset($service->service_image) }}">
            <small id="imageHelp" class="form-text text-muted">This is your service section image</small>
        </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
{{-- For file upload script --}}
<script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>