<form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <label for="member_name" class="col-form-label pt-0">Member Name</label>
            <input type="text" class="form-control" id="member_name" name="member_name" value="{{ $team->member_name }}" required>
        </div>

        <div class="col-md-12">
            <label for="member_details" class="col-form-label pt-0">Member Details</label>
            <input type="text" class="form-control" id="member_details" name="member_details" value="{{ $team->member_details }}">
        </div>

        <div class="form-group">
            <label for="image" class="col-form-label pt-0">Current Member Image</label>
            <br>
            @if($team->image)
                <img src="{{ asset($team->image) }}" alt="image" class="img-fluid" style="max-width: 100px;">
            @else
                <p>No image uploaded.</p>
            @endif
        </div>

        <div class="form-group">
            <label for="image" class="col-form-label pt-0">Member Image</label>
            <input type="file" class="dropify" data-height="200" name="image" data-default-file="{{ asset($team->image) }}">
            <small id="imageHelp" class="form-text text-muted">This is your Member section image</small>
        </div>

        <div class="col-md-12">
            <label for="designation" class="col-form-label pt-0">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" value="{{ $team->designation }}" required>
        </div>

        <div class="col-md-12">
            <label for="company_name" class="col-form-label pt-0">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $team->company_name }}">
        </div>

        <div class="col-md-12">
            <label for="skills" class="col-form-label pt-0">Member Skills</label>
            <input type="text" class="form-control" id="skills" name="skills" value="{{ $team->skills }}">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
{{-- For file upload script --}}
<script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>