<form action="{{ route('abouts.update', $about->id) }}" method="post" id="edit-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label for="e_title" class="col-form-label pt-0">Title <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $about->title }}" required>
            </div>

            <div class="col-md-12">
                <label for="sub_title" class="col-form-label pt-0">Sub Title</label>
                <textarea class="form-control" id="sub_title" name="sub_title">{{ $about->sub_title }}</textarea>
            </div>

            <div class="col-md-12">
                <label for="our_mission" class="col-form-label pt-0">Our Mission</label>
                <textarea class="form-control" id="our_mission" name="our_mission">{{ $about->our_mission }}</textarea>
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
                <input type="file" class="dropify" data-height="200" name="self_image" value="{{ $about->self_image }}" />
                <small class="form-text text-muted">Upload a new image for the About section (Max: 2MB)</small>
            </div>
        </div>

        
        <div class="col-md-12">
            <label for="leader_name" class="col-form-label pt-0">Leader Name</label>
            <input type="text" class="form-control" id="leader_name" name="leader_name" value="{{ $about->leader_name }}">
        </div>

        <div class="col-md-12">
            <label for="leader_designation" class="col-form-label pt-0">Leader Designation</label>
            <input type="text" class="form-control" id="leader_designation" name="leader_designation" value="{{ $about->leader_designation }}">
        </div>

        <div class="col-md-12">
            <label for="company_name" class="col-form-label pt-0">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $about->company_name }}">
        </div>

        <div class="col-md-12">
            <label for="complete_projects" class="col-form-label pt-0">Complete Projects</label>
            <input type="number" class="form-control" id="complete_projects" name="complete_projects" value="{{ $about->complete_projects }}">
        </div>

        <div class="col-md-12">
            <label for="happy_clients" class="col-form-label pt-0">Happy Clients</label>
            <input type="number" class="form-control" id="happy_clients" name="happy_clients" value="{{ $about->happy_clients }}">
        </div>

        <div class="col-md-12">
            <label for="skills_experts" class="col-form-label pt-0">Skills Experts</label>
            <input type="number" class="form-control" id="skills_experts" name="skills_experts" value="{{ $about->skills_experts }}">
        </div>

        <div class="col-md-12">
            <label for="media_posts" class="col-form-label pt-0">Media Posts</label>
            <input type="number" class="form-control" id="media_posts" name="media_posts" value="{{ $about->media_posts }}">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>

{{-- For file upload script --}}
<script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>
