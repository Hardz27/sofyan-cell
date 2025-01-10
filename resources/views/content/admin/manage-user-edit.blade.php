@extends('layout.admin.main')

@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Profile</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                    </ol>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-4">
                    <form action="{{ route('user-update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit User</div>
                            </div>
                            <div class="card-body">
                                <div class="text-center chat-image mb-5">
                                    <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                        <a class="" href="profile.html"><img alt="avatar" src="../assets/images/users/7.jpg" class="brround"></a>
                                    </div>
                                    <div class="main-chat-msg-name">
                                        <a href="profile.html">
                                            <h5 class="mb-1 text-dark fw-semibold">{{ $user->username }}</h5>
                                        </a>
                                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ $user->email }}</p>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <div class="wrap-input100 validate-input input-group">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" value="{{ $user->username }}" name="username" type="text" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <div class="wrap-input100 validate-input input-group">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" value="{{ $user->email }}" name="email" type="text" placeholder="Email">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="form-label">Current Password</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" name="password" type="password" placeholder="Current Password">
                                    </div>
                                    <!-- <input type="password" class="form-control" value="password"> -->
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" name="new_password" type="password" placeholder="New Password">
                                    </div>
                                    <!-- <input type="password" class="form-control" value="password"> -->
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                        </a>
                                        <input class="input100 form-control" name="confirm_password" type="password" placeholder="Confirm Password">
                                    </div>
                                    <!-- <input type="password" class="form-control" value="password"> -->
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary">Update</button>
                                <button class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection