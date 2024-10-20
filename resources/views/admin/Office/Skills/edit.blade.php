<form action="{{ route('skill.update', $skill->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <label for="skills_name" class="col-form-label pt-0">Skill Name <sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="skills_name" name="skills_name" value="{{ $skill->skills_name }}" required>
        </div>

        <div class="col-md-12">
            <label for="skills_percentage" class="col-form-label pt-0">Skills Percentage <sup class="text-size-20 top-1">*</sup></label>
            <input type="number" class="form-control" id="skills_percentage" name="skills_percentage" value="{{ $skill->skills_percentage }}" required>
        </div>

        <div class="col-md-12">
            <label for="skills_experience" class="col-form-label pt-0">Skills Experience <sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="skills_experience" name="skills_experience" value="{{ $skill->skills_experience }}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>