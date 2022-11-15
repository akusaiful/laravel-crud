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
                            <form action="{{ route('department.store') }}" method="POST">
                                @csrf                                

                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $department->name) }}">

                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-3 col-form-label">Phone</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" id="phone"
                                            class="form-control @error('phone')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('phone', $department->phone) }}">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" id="email"
                                            class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('email', $department->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
