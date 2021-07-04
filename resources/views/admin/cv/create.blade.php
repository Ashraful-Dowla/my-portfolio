@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload CV</h3>
                    </div>
                    <form id="cvForm" method="post" action="{{ route('cv.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="cv_upload">CV Upload</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="cv" id="cv_upload">
                                        <label class="custom-file-label" for="cv_upload">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
            </div>
            {!! Toastr::message() !!}
        </div>
    </div>
    <script src="{{ asset('assets/admin/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        bsCustomFileInput.init();
        $(function() {
            $('#cvForm').validate({
                rules: {
                    cv: {
                        required: true,
                        extension: "pdf",
                        maxsize: 1 * 1024 * 1024 //MB
                    }
                },
                messages: {
                    cv: {
                        required: "Please upload CV",
                        extension: "CV type must be pdf",
                        maxsize: "CV size must be less than 1mb"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
