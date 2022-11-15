@extends('layouts.main')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-title">
                    <strong>Add New Contact</strong>
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-12">
                            <!-- JANGAN BUAT-BUAT LUPA LETAK TAG FORM -->
                            <form action="{{ route('department.update', $department->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $department->name }}">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-3 col-form-label">Phone</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ $department->phone }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" id="email" class="form-control"
                                            value="{{ $department->email }}">
                                    </div>
                                </div>


                                <hr>
                                <div class="form-group row mb-0">
                                    <div class="col-md-9 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="index.html" class="btn btn-outline-secondary">Cancel</a>
                                    </div>
                                </div>
                                <!-- SINI JGN LUPA JUGA ENDING FORM -->
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
