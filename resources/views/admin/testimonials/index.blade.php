@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Testimonials</h3>
                        <a href="{{ route('testimonials.create') }}" class="btn btn-light float-right">Add Testimonial</a>
                    </div>
                    <div class="card-body">
                        <table id="testimonialTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->id }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->designation }}</td>
                                        <td>
                                            <a href="{{ route('testimonials.edit', ['testimonial' => $testimonial->id]) }}"
                                                class="btn btn-primary">Update</a>
                                            <a href="{{ route('testimonials.show', ['testimonial' => $testimonial->id]) }}"
                                                class="btn btn-warning">
                                                View</a>
                                            <button id="{{ $testimonial->id }}"
                                                onclick="event.preventDefault(); deleteData(this.id);"
                                                class="btn btn-danger">Delete</button>
                                        </td>
                                        <form class="d-none" id="{{ 'form-delete-' . $testimonial->id }}"
                                            action="{{ route('testimonials.destroy', ['testimonial' => $testimonial->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {!! Toastr::message() !!}
    </div>

    <script src="{{ asset('assets/admin/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <script>
        $('#testimonialTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });

        function deleteData(id) {
            if (confirm('Are you sure you want to delete?')) {
                $("#form-delete-" + id).submit();
            }
        }
    </script>
@endsection
