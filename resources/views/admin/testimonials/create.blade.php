@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Testimonials</h3>
                    </div>
                    <form id="testimonialForm" method="post" action="{{ route('testimonials.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" name="designation" class="form-control" id="designation"
                                    placeholder="Designation">
                            </div>
                            <div class="form-group">
                                <label>Quote</label>
                                <textarea class="form-control" rows="3" name="quote" placeholder="Enter quote"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image_upload">Image Upload</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="avatar" id="image_upload">
                                        <label class="custom-file-label" for="image_upload">Choose file</label>
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
            $('#testimonialForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 1,
                        maxlength: 255
                    },
                    designation: {
                        required: true,
                        minlength: 1,
                        maxlength: 255
                    },
                    quote: {
                        required: true,
                        minlength: 10,
                        maxlength: 255
                    },
                    avatar: {
                        extension: "jpg|jpeg|png",
                        maxsize: 1 * 1024 * 1024 //MB
                    }
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                        minlength: "Name field required minimum 1 character",
                        minlength: "Name field required maximum 255 characters",
                    },
                    designation: {
                        required: "Please enter a desgination",
                        minlength: "Name field required minimum 1 character",
                        maxlength: "Name field required maximum 255 characters",
                    },
                    quote: {
                        required: "Please enter a quote",
                        minlength: "Name field required minimum 10 characters",
                        maxlength: "Name field required maximum 255 characters",
                    },
                    avatar: {
                        extension: "Image type must be jpg, jpeg, png",
                        maxsize: "Image size must be less than 1mb"
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
