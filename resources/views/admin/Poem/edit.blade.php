<!-- edit.blade.php -->
<form id="editForm" method="post" action="{{ route('poem.update', $poem->id) }}">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="e_title" class="col-form-label pt-0">Title <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="e_title" value="{{$poem->title}}" name="title" required>
            </div>
            {{-- <div class="form-group col-md-6">
                <label for="e_slug" class="col-form-label pt-0">Slug <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="e_slug" value="{{$poem->slug}}" name="slug" required>
            </div> --}}
            <div class="form-group col-md-6">
                <label for="e_category_id" class="col-form-label pt-0">Category <sup class="text-size-20 top-1">*</sup></label>
                <select class="form-control" id="e_category_id" name="category_id" required>
                    @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $poem->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label for="e_excerpt" class="col-form-label pt-0">Author <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="e_title" name="Author_name" value={{$poem->Author_name}} required>
            </div>
            <div class="col-md-12">
                <label for="e_excerpt" class="col-form-label pt-0">Designation <sup class="text-size-20 top-1">*</sup></label>
                <input type="text" class="form-control" id="e_title" name="Author_designation"  value={{$poem->Author_designation}} required>
            </div>
            <div class="form-group">
                <label for="e_content" class="col-form-label pt-0">Content <sup class="text-size-20 top-1">*</sup></label>
                <textarea class="form-control" id="e_content" name="content" required>{{$poem->content}}</textarea>
            </div>
            {{-- <div class="form-group">
                    <label for="image" class="col-form-label pt-0">Current Image</label>
                    <br>
                    @if($article->image)
                    <img src="{{ asset($article->image) }}" alt="img" class="img-fluid" style="max-width: 100px;">
                    @else
                    <p>No logo uploaded.</p>
                    @endif
                </div> --}}
            {{-- <div class="form-group">
                <label for="e_image" class="col-form-label pt-0">Image <sup class="text-size-20 top-1">*</sup></label>
                <input type="file" class="dropify" id="e_image" name="image">
                <img id="existing_image" src="" width="100" alt="Existing Image">
            </div> --}}
            <div class="form-group">
                <label for="e_published_at" class="col-form-label pt-0">Published At</label>
                <input type="datetime-local" class="form-control" id="e_published_at" name="published_at" value="{{$poem->published_at}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
      </div>
    </div>
</form> 
{{-- <script src="{{asset('/')}}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/fileuploads/js/file-upload.js"></script> --}}