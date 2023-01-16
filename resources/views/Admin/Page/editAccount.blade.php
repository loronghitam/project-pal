@extends('Admin.Layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('succes'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('succes') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card mb-4">
            <!-- Account -->
            <hr class="my-0"/>
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{url('/user')}}">
                    @csrf
                    <div class="mt-2">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="firstName" class="form-label">Username</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="firstName"
                                    name="username"
                                    autofocus
                                    value="{{ $user->username }}"
                                />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="lastName" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" id="lastName"
                                       value="{{ $user->name }}"
                                />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="email"
                                    name="email"
                                    value="{{ $user->email }}"

                                />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">New Password</label>
                                <input class="form-control" type="password" id="state" name="password"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Confirm New Password</label>
                                <input class="form-control" type="password" id="state" name="password_confirmation"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Password Saat Ini</label>
                                <input class="form-control" type="password" id="state" name="passwordNow"/>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
@endsection
