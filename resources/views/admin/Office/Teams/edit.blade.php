<!-- Edit Team Modal -->
<div class="modal fade" id="editTeamModal" tabindex="-1" aria-labelledby="editTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('team.update', $team->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- PUT method for update operation -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeamModalLabel">Edit Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
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
                            <label for="image" class="col-form-label pt-0">Member Image <sup class="text-size-20 top-1">*</sup></label>
                            <input type="file" class="dropify" data-height="200" name="image" />
                            <img src="{{ asset($team->image) }}" height="50" class="mt-2">
                            <small id="imageHelp" class="form-text text-muted">This is your current member image</small>
                        </div>
                        <div class="col-md-12">
                            <label for="company_name" class="col-form-label pt-0">Company Name<sup class="text-size-20 top-1">*</sup></label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $team->company_name }}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="designation" class="col-form-label pt-0">Designation<sup class="text-size-20 top-1">*</sup></label>
                            <input type="text" class="form-control" id="designation" name="designation" value="{{ $team->designation }}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="skills_id" class="col-form-label pt-0">Member Skills</label>
                            <select class="form-control" id="skills_id" name="skills_id[]" multiple data-role="tagsinput" required>
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}" 
                                        @if(in_array($skill->id, $team->skills->pluck('id')->toArray())) selected @endif>
                                        {{ $skill->skills_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
