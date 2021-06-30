@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Skills</h3>
                    </div>
                    <form id="skillForm" method="post" action="{{ route('skills.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="skill_name">Name</label>
                                <input type="text" name="name" class="form-control" id="skill_name"
                                    placeholder="Skill name">
                            </div>
                            <div class="form-group">
                                <label for="skill_progress_value">Progress value</label>
                                <input type="number" name="progress_value" class="form-control" id="skill_progress_value"
                                    placeholder="Progress value">
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
    <script>
        $(function() {
            $('#skillForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    progress_value: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: "Please enter a skill name"
                    },
                    progress_value: {
                        required: "Please enter a progress value"
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
