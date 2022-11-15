@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">All Contacts</h2>
                        <div class="ml-auto">
                            <a href="form.html" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <select class="custom-select">
                                        <option value="" selected="">All Deparment</option>
                                        <option value="1">Department One</option>
                                        <option value="2">Department Two</option>
                                        <option value="3">Department Three</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search..."
                                            aria-label="Search..." aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <th scope="row">{{ $department->id }}</th>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->email }}</td>
                                    <td>{{ $department->phone }}</td>
                                    <td width="150">
                                        <a href="{{ route('department.show', $department->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="{{ route('department.edit', $department->id) }}" class="btn btn-sm btn-circle btn-outline-secondary"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                            onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $departments->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
