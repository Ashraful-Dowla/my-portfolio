@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Testimonial of {{ $testimonial->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $testimonial->name }}" class="form-control" id="name"
                                placeholder="Name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" class="form-control" id="designation"
                                value="{{ $testimonial->designation }}" placeholder="Designation" disabled>
                        </div>
                        <div class="form-group">
                            <label>Quote</label>
                            <textarea class="form-control" rows="3" name="quote" placeholder="Enter quote"
                                disabled>{{ $testimonial->quote }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="upload_image">Uploaded Image</label><br />
                            @if ($testimonial->avatar)
                                <img src="{{ asset('storage/images/' . $testimonial->avatar) }}" class="image-fluid"
                                    alt="image" width="200" height="200">
                            @else
                                <img src="{{ asset('assets/admin/img/dummy.png') }}" class="image-fluid"
                                    alt="image" width="200" height="200">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        bsCustomFileInput.init();
    </script>
@endsection
