@extends('layouts.admin')
@section('title','About')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">About</h5>
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
              <h5>All About Details</h5>
            </div>
            <div class="card-body">
              <div class="dt-responsive table-responsive">
                <table id="" class="table table-striped table-bordered nowrap table-sm ytable">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Title</th>
                      <th>Sub Title</th>
                      <th>Our Mission</th>
                      <th>Mission Details</th>
                      <th>Self Image</th>
                      <th>Leader Name</th>
                      <th>Leader Designation</th>
                      <th>Company Name</th>
                      <th>Complete Projects</th>
                      <th>Happy Clients</th>
                      <th>Skills Experts</th>
                      <th>Media Posts</th>
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
                      <th>Sub Title</th>
                      <th>Our Mission</th>
                      <th>Mission Details</th>
                      <th>Self Image</th>
                      <th>Leader Name</th>
                      <th>Leader Designation</th>
                      <th>Company Name</th>
                      <th>Complete Projects</th>
                      <th>Happy Clients</th>
                      <th>Skills Experts</th>
                      <th>Media Posts</th>
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
                <h5 class="modal-title h4" id="myLargeModalLabel">Add New About</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('abouts.store')}}" method="post" id="add-form" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                      <label for="e_title" class="col-form-label pt-0">Title <sup class="text-size-20 top-1">*</sup></label>
                      <input type="text" class="form-control" id="title" name="title" required>
                  </div>

                  <div class="col-md-12">
                      <label for="sub_title" class="col-form-label pt-0">Sub Title</label>
                      <textarea class="form-control" id="sub_title" name="sub_title"></textarea>
                  </div>

                  <div class="col-md-12">
                    <label for="our_mission" class="col-form-label pt-0">Our Mission <sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="our_mission" name="our_mission" required>
                </div>

                  <div class="col-md-12">
                      <label for="mission_details" class="col-form-label pt-0">Mission Details</label>
                      <textarea class="form-control" id="mission_details" name="mission_details"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="self_image" class="col-form-label pt-0">Self Image <sup class="text-size-20 top-1">*</sup></label>
                    <input type="file" class="dropify" data-height="200" name="self_image" />
                    <small id="imageHelp" class="form-text text-muted">This is your About section image</small>
                  </div>


                  <div class="col-md-12">
                    <label for="leader_name" class="col-form-label pt-0">Leader Name</label>
                    <input type="text" class="form-control" id="leader_name" name="leader_name">
                </div>

                <div class="col-md-12">
                    <label for="leader_designation" class="col-form-label pt-0">Leader Designation</label>
                    <input type="text" class="form-control" id="leader_designation" name="leader_designation">
                </div>

                <div class="col-md-12">
                    <label for="company_name" class="col-form-label pt-0">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name">
                </div>

                <div class="col-md-12">
                    <label for="complete_projects" class="col-form-label pt-0">Complete Projects</label>
                    <input type="number" class="form-control" id="complete_projects" name="complete_projects">
                </div>

                <div class="col-md-12">
                    <label for="happy_clients" class="col-form-label pt-0">Happy Clients</label>
                    <input type="number" class="form-control" id="happy_clients" name="happy_clients">
                </div>

                <div class="col-md-12">
                    <label for="skills_experts" class="col-form-label pt-0">Skills Experts</label>
                    <input type="number" class="form-control" id="skills_experts" name="skills_experts">
                </div>

                <div class="col-md-12">
                    <label for="media_posts" class="col-form-label pt-0">Media Posts</label>
                    <input type="number" class="form-control" id="media_posts" name="media_posts">
                </div>
                
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
                <h5 class="modal-title" id="editModalLabel">Edit About</h5>
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
  $(function about(){
    var table = $('.ytable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('abouts.index') }}",
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'title', name: 'title' },
        { data: 'sub_title', name: 'sub_title' },
        { data: 'our_mission', name: 'our_mission' },
        { data: 'mission_details', name: 'mission_details' },
        { data: 'self_image', name: 'self_image' },
        { data: 'leader_name', name: 'leader_name' },
        { data: 'leader_designation', name: 'leader_designation' },
        { data: 'company_name', name: 'company_name' },
        { data: 'complete_projects', name: 'complete_projects' },
        { data: 'happy_clients', name: 'happy_clients' },
        { data: 'skills_experts', name: 'skills_experts' },
        { data: 'media_posts', name: 'media_posts' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
      ]
    });
  });

      // For editing About 
      $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get("abouts/" + id + "/edit", function(data) {
            $('.modal-body').html(data);
        });
    });
</script>

@endsection