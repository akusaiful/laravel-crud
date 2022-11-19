@extends('layouts.main')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-title">
                    <strong>Department Details</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="first_name" class="col-md-3 col-form-label">Name</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $department->name }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $department->email }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-3 col-form-label">Phone</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $department->phone }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-3 col-form-label">Total Contact</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $department->contacts()->count() }}</p>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-end">
                                <div class="offset-md-3">
                                    <form action="{{ route('department.delete', $department->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @method('DELETE'),
                                        @csrf
                                    <a href="{{ route('department.edit', $department->id) }}" class="btn btn-info">Edit</a>
                                    
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    <a href="{{ route('department.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <div class="card mt-4">
                <div class="card-header card-title">
                    <strong>Contact Details on Deparment {{ $department->name }}</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">


                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NO</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $key => $contact)
                                        <tr>
                                            <td>{{ $key + $contacts->firstItem() }}</td>
                                            <td><a href="{{ route('contact.show', $contact) }}">{{ $contact->name }}</a></td>
                                            <td>{{ $contact->email }}</td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>

                            <div class="mt-4">
                                {{ $contacts->links() }}
                            </div>



                           
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
