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
                            <form action="{{ route('contact.update', $contact) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $contact->name) }}">

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
                                            value="{{ old('phone', $contact->phone) }}">
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
                                            value="{{ old('email', $contact->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" name="address" id="address"
                                            class="form-control @error('address')
                                            is-invalid
                                        @enderror"
                                            value="{{ old('address', $contact->address) }}">
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="department_id" class="col-md-3 col-form-label">Department</label>
                                    <div class="col-md-9">

                                        <select name="department_id" id="department_id" class="form-control">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    @if ($department->id == $contact->department_id) selected @endif>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('department_id')
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
                                        <a href="{{ route('contact.index') }}" class="btn btn-outline-secondary">Cancel</a>
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
