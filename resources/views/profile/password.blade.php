@extends('layouts.main')

@section('title', 'Setting Page')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('profile._menu')
        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
            <form action="{{ route('profile.updatepassword') }}" method="POST">
                @method('PUT')
                @csrf

                <div class="card">
                    <div class="card-header card-title">
                        <strong>Edit Profile | {{ $user->name }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Current Password</label>
                                    

                                    <input type="password" name="current_password" id="current_password"
                                        value="{{ old('current_password') }}"
                                        class="form-control @error('current_password')
                                        is-invalid
                                    @enderror">
                                    @error('current_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">New Password</label>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Password Confirm</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        value="{{ old('password_confirmation') }}"
                                        class="form-control @error('password_confirmation')
                                        is-invalid
                                    @enderror">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <button type="submit" class="btn btn-success">Update Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('assets/js/jasny-bootstrap.min.js') }}"></script>
@endsection
