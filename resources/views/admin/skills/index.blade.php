@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of skills</h3>
                        <a href="{{ route('skills.create') }}" class="btn btn-light float-right">Add Skill</a>
                    </div>
                    <div class="card-body">
                        <table id="skillTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Progress value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $skill)
                                    <tr>
                                        <td>{{ $skill->id }}</td>
                                        <td>{{ $skill->name }}</td>
                                        <td>{{ $skill->progress_value }}</td>
                                        <td>
                                            <a href="{{ route('skills.edit', ['skill' => $skill->id]) }}"
                                                class="btn btn-primary">Update</a>
                                            <button id="{{ $skill->id }}"
                                                onclick="event.preventDefault(); deleteData(this.id);"
                                                class="btn btn-danger">Delete</button>
                                        </td>
                                        <form class="d-none" id="{{ 'form-delete-' . $skill->id }}"
                                            action="{{ route('skills.destroy', ['skill' => $skill->id]) }}" method="post">
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
        $('#skillTable').DataTable({
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
