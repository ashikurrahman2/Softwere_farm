@extends('layouts.admin')
@section('title','Teams')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Teams</h5>
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>All Teams Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="teamTable" class="table table-striped table-bordered nowrap table-sm ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Member Name</th>
                                        <th>Member Details</th>
                                        <th>Member Image</th>
                                        <th>Designation</th>
                                        <th>Company Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data populated by DataTables via AJAX -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Member Name</th>
                                        <th>Member Details</th>
                                        <th>Member Image</th>
                                        <th>Designation</th>
                                        <th>Company Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<!-- Insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Add New Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('team.store')}}" method="post" id="add-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="member_name" class="col-form-label pt-0">Member Name <sup class="text-size-20 top-1">*</sup></label>
                            <input type="text" class="form-control" id="member_name" name="member_name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="member_details" class="col-form-label pt-0">Member Details</label>
                            <input type="text" class="form-control" id="member_details" name="member_details">
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-form-label pt-0">Member Image <sup class="text-size-20 top-1">*</sup></label>
                            <input type="file" class="dropify" data-height="200" name="image" />
                            <small id="imageHelp" class="form-text text-muted">This is your Member section image</small>
                        </div>
                        <div class="col-md-12">
                            <label for="designation" class="col-form-label pt-0">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>
                        <div class="col-md-12">
                            <label for="company_name" class="col-form-label pt-0">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name">
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
                <h5 class="modal-title" id="editModalLabel">Edit Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit form content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function team() {
        var table = $('#teamTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('team.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'member_name', name: 'member_name' },
                { data: 'member_details', name: 'member_details' },
                { data: 'image', name: 'image' },
                { data: 'designation', name: 'designation' },
                { data: 'company_name', name: 'company_name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    // For editing team 
    $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get("team/" + id + "/edit", function(data) {
            $('.modal-body').html(data);
        });
    });
</script>
@endsection
