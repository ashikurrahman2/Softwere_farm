@extends('layouts.admin')
@section('title','Article')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">New Article</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.home') }}"><i
                                        class="ph-duotone ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Add Article</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- [ breadcrumb ] end -->
        <!-- [ form-element ] start -->
        <form  action="{{ route('article.store') }}" method="post" id="add-form" enctype="multipart/form-data">
            @csrf
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-light">All New Article</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Title <sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input id="title" type="text" name="title" value="{{old('title')}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Author Name<sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input id="Author_name" type="text" name="Author_name" value="{{old('Author_name')}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Author Designation<sup class="text-size-20 top-1">*</sup></label>
                                        <div class="input-group">
                                            <input id="Author_designation" type="text" name="Author_designation" value="{{old('Author_designation')}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Page Content</label>
                                        <textarea class="form-control textarea" name="content" id="summernote" rows="4" >{{old('content')}}</textarea> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Publish Date</label>
                                        <input type="datetime-local" class="form-control" id="published_at" name="published_at">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div><!-- HTML Input Types -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </form><!-- [ form-element ] end -->    

    </div>
</div>
@endsection
