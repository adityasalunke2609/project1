@extends('layouts.app') @section('content') <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body"> {{-- success message --}} @if (session('success'))
                            <div class="alert alert-success"> {{ session('success') }} </div>
                            @endif {{-- validation errors --}} @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('updateprofile') }}"> @csrf <div class="mb-3">
                                    <label>Name</label> <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $user->name) }}"> </div>
                                <div class="mb-3"> <label>Email</label> <input type="email" name="email"
                                        class="form-control" value="{{ old('email', $user->email) }}"> </div> <button
                                    type="submit" class="btn btn-primary w-100"> Update Profile </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
</div> @endsection
