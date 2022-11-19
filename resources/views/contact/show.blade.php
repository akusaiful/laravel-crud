@extends('layouts.main')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-title">
                    <strong>contact Details</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="first_name" class="col-md-3 col-form-label">Name</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $contact->name }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $contact->email }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-3 col-form-label">Phone</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $contact->phone }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-3 col-form-label">Address</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $contact->address }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-3 col-form-label">Department</label>
                                <div class="col-md-9">
                                    <p class="form-control-plaintext text-muted">{{ $contact->getDepartment() }}</p>
                                </div>
                            </div>
                        
                            <hr>
                            <div class="form-group row mb-0">
                                <div class="col-md-9 offset-md-3">
                                    <form action="{{ route('contact.destroy', $contact) }}" method="POST"
                                                onsubmit=" return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                    <a href="{{ route('contact.edit', $contact) }}" class="btn btn-info">Edit</a>                                    
                                    <button class="btn btn-outline-danger">Delete</button>
                                    <a href="{{ route('contact.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
