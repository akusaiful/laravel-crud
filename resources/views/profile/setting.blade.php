@extends('layouts.main')

@section('title', 'Setting Page')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('profile._menu')
        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Edit Profile | {{ $user->name }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="{{ old('email', $user->email) }}">
                                </div>


                            </div>
                            <div class="offset-md-1 col-md-3">
                                <div class="form-group">
                                    <label for="bio">Profile picture</label>

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                                            <img src="{{ $user->getAvatar() }}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists img-thumbnail"
                                            style="max-width: 150px; max-height: 150px;"></div>
                                        <div class="mt-2">
                                            <span class="btn btn-outline-secondary btn-file"><span
                                                    class="fileinput-new">Select
                                                    image</span><span class="fileinput-exists">Change</span>
                                                <input type="file" name="profile_picture" accept="image/*"></span>
                                            <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                                data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
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
