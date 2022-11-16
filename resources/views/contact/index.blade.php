@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">All Contacts</h2>
                        <div class="ml-auto">
                            <a href="" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form action="">
                                <div class="row">


                                    <div class="col">
                                        <select name="filter_department" id="filter_department" class="custom-select"
                                            onchange="this.form.submit()">
                                            <option value="">All Departments</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    @if (request()->filter_department == $department->id) selected @endif>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <input type="text" name='querytext' class="form-control"
                                                placeholder="Search..." aria-label="Search..."
                                                aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if ($message = session('message'))
                        <div class="alert alert-success alert-fadeout">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="mt-2 mb-2">
                        Total records <b>{{ $contacts->total() }}</b> |
                        Showing record {{ $contacts->firstItem() }} from {{ $contacts->lastItem() }}
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Active</th>
                                <th scope="col">Bin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($contacts->total())
                                @foreach ($contacts as $index => $contact)
                                    <tr>
                                        <th scope="row">{{ $index + $contacts->firstItem() }}</th>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td class="text-center">{{ $contact->active }}</td>
                                        <td class="text-center">{{ $contact->is_deleted }}</td>
                                        <td width="150">
                                            <form action="{{ route('contact.destroy', $contact) }}" method="POST"
                                                onsubmit=" return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')


                                                <a href="" class="btn btn-sm btn-circle btn-outline-info"
                                                    title="Show"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('contact.edit', $contact) }}"
                                                    class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i
                                                        class="fa fa-edit"></i></a>

                                                <!-- Tidak boleh guna utk delete
                                                                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                                                        onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                                                    -->
                                                <button class="btn btn-sm btn-circle btn-outline-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No record found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    {{ $contacts->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
