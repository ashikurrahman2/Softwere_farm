@extends('layouts.admin')
@section('title', 'Services')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Service</h5>
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
                        <h5>All Service Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap table-sm ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Service Title</th>
                                        <th>Service Description</th>
                                        <th>Service Experience</th>
                                        <th>Service Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data populated by DataTables via AJAX -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Service Title</th>
                                        <th>Service Description</th>
                                        <th>Service Experience</th>
                                        <th>Service Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HTML5 Export Buttons end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<!-- Insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('service.store') }}" method="post" id="add-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="service_title" class="col-form-label pt-0">Service Title <sup class="text-size-20 top-1">*</sup></label>
                            <input type="text" class="form-control" id="service_title" name="service_title" required>
                        </div>

                        <div class="col-md-12">
                            <label for="service_description" class="col-form-label pt-0">Service Description</label>
                            <textarea class="form-control" id="service_description" name="service_description"></textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="experience" class="col-form-label pt-0">Service Experience <sup class="text-size-20 top-1">*</sup></label>
                            <input type="number" class="form-control" id="experience" name="experience" required>
                            <small id="textHelp" class="form-text text-muted">Must be integer number</small>
                        </div>

                        <div class="col-md-12">
                            <label for="service_image" class="col-form-label pt-0">Service Image <sup class="text-size-20 top-1">*</sup></label>
                            <input type="file" class="dropify" data-height="200" name="service_image" />
                            <small id="imageHelp" class="form-text text-muted">This is your Service section image</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
                <h5 class="modal-title" id="editModalLabel">Edit Service</h5>
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
    $(function() {
        var table = $('.ytable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('service.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'service_title', name: 'service_title' },
                { data: 'service_description', name: 'service_description' },
                { data: 'experience', name: 'experience' },
                { data: 'service_image', name: 'service_image' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        // Load edit service form
        $('body').on('click', '.edit', function() {
            let id = $(this).data('id');
            $.get("service/" + id + "/edit", function(data) {
                $('#editModal .modal-body').html(data);
            });
        });
    });
</script>

@endsection
