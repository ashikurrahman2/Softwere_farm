<form action="{{ route('team.update', $team->id) }}" method="post" id="add-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label for="member_name" class="col-form-label pt-0">Member Name <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="member_name" name="member_name" value="{{ $team->member_name }}" required>
            </div>

            <div class="col-md-12">
                <label for="member_details" class="col-form-label pt-0">Member Details</label>
                <textarea class="form-control" id="member_details" name="member_details">{{ $team->member_details }}</textarea>
            </div>

            <div class="col-md-12">
                <label for="company_name" class="col-form-label pt-0">Company Name <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $team->company_name }}" required>
            </div>

            <div class="col-md-12">
                <label for="designation" class="col-form-label pt-0">Designation <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="designation" name="designation" value="{{ $team->designation }}" required>
            </div>
            
        <div class="form-group">
            <label for="image" class="col-form-label pt-0">Current Team Image</label>
            <br>
            @if($team->image)
                <img src="{{ asset($team->image) }}" alt="image" class="img-fluid" style="max-width: 100px;">
            @else
                <p>No image uploaded.</p>
            @endif
        </div>

            <div class="col-md-12">
                <label for="image" class="col-form-label pt-0">Image <sup class="text-size-20 top-1">*</sup></label>
                <input type="file" class="dropify" data-height="200" name="image" value="{{ $team->image }}" />
                <small id="imageHelp" class="form-text text-muted">This is your team member's image</small>
            </div>
            {{-- <div class="col-md-12">
                <label for="skills_id" class="col-form-label pt-0">Member Skills</label>
                <select class="form-control" id="skills_id" name="skills_id" value={{ $team->skills_id }} required>
                    <option value="">Select Skills</option>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->skills_name }}</option>
                    @endforeach
                </select>
            </div> --}}
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
{{-- For file upload script --}}
<script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>