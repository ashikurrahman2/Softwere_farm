<!-- edit.blade.php -->
<form id="editForm" method="post" action="{{ route('advertisement.update', $advertisement->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group">
            <label for="brand_name">Title <sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $advertisements->title }}" required>
        </div>
        <div class="form-group">
            <label for="image" class="col-form-label pt-0">Current Brand Logo</label>
            <br>
            @if($advertisement->image)
            <img src="{{ asset($advertisements->image) }}" alt="image" class="img-fluid" style="max-width: 100px;">
            @else
            <p>No logo uploaded.</p>
            @endif
        </div>
        <div class="form-group">
            <label for="brand_logo" class="col-form-label pt-0">Image</label>
            <input type="file" class="dropify" data-height="200" name="image">
            <small id="emailHelp" class="form-text text-muted">Upload a new Brand Logo if needed.</small>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form> 
<script src="{{asset('/')}}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/fileuploads/js/file-upload.js"></script>