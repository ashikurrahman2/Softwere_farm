@extends('layouts.admin')
@section('title','Poem')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">কবিতা</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul class="breadcrumb">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add New</button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
      <div class="row">
        <!-- HTML5 Export Buttons table start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header table-card-header">
              <h5>সব কবিতা সমূহ</h5>
            </div>
            <div class="card-body">
              <div class="dt-responsive table-responsive">
                <table id="" class="table table-striped table-bordered nowrap table-sm ytable">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th>Category Name</th>
                      <th>Excerpt</th>
                      <th>Content</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Data populated by DataTables via AJAX -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Title</th>
                      <th>Category Name</th>
                      <th>Excerpt</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div><!-- HTML5 Export Buttons end -->

      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
  <!-- Insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Add New Poem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('poem.store')}}" method="post" id="add-form">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                      <label for="e_title" class="col-form-label pt-0">Title <sup class="text-size-20 top-1">*</sup></label>
                      <input type="text" class="form-control" id="e_title" name="title" required>
                  </div>
                  {{-- <div class="col-md-12">
                    <label for="e_excerpt" class="col-form-label pt-0">Slug <sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="e_title" name="slug" required>
                </div> --}}
                  <div class="col-md-12">
                      <label for="e_excerpt" class="col-form-label pt-0">Author <sup class="text-size-20 top-1">*</sup></label>
                      <input type="text" class="form-control" id="e_title" name="Author_name" required>
                  </div>
                  <div class="col-md-12">
                      <label for="e_excerpt" class="col-form-label pt-0">Designation <sup class="text-size-20 top-1">*</sup></label>
                      <input type="text" class="form-control" id="e_title" name="Author_designation" required>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="summernote" rows="4"></textarea>
                        {{-- <textarea class="form-control" name="content" id="summernote" rows="4">{{ old('content') }}</textarea> --}}
                    </div>
                </div>
                
                  <div class="col-md-12">
                      <label for="e_published_at" class="col-form-label pt-0">Published At</label>
                      <input type="datetime-local" class="form-control" id="e_published_at" name="published_at">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
          
              </div>
            </form>
        </div>
    </div>
</div>


 <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Poem</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- Edit form content will be loaded here -->
          </div>
      </div>
  </div>
</div>


  <!-- Script -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(function poem(){
      var table=$('.ytable').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ route('poem.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'title', name: 'title' },
                { data: 'slug', name: 'slug' },
                { data: 'Author_name', name: 'Author_name' },
                { data: 'Author_designation', name: 'Author_designation' },
                { data: 'content', name: 'content' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
      });
    });
// For Edit Child Category
    $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get("poem/" + id + "/edit", function(data) {
            $('.modal-body').html(data);
        });
    });

  //dropify image
 
  </script>
  
@endsection