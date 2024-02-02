@extends('admin.layouts.master')

@section('title', 'Change Password')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.password.view') }}">Password</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.passwordAdmin.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Old Password <span
                                            style="color: red">*</span></label>
                                    <input class="form-control" id="myInput1" type="password" placeholder="Old Password"
                                        name="old_password" value="{{ old('old_password') }}" required>
                                    <input type="checkbox" onclick="showPass1()">
                                    <label for="">&nbsp;Show Password</label>
                                    @error('old_password')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">New Password <span
                                            style="color: red">*</span></label>
                                    <input class="form-control" id="myInput2" type="password" placeholder="New Password"
                                        name="new_password" value="{{ old('new_password') }}" required>
                                    <input type="checkbox" onclick="showPass2()">
                                    <label for="">&nbsp;Show Password</label>
                                    <span class="form-text text-muted">
                                        (Note: Your new password must be minimum 8 characters, at least 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character)
                                    </span>
                                    @error('new_password')
                                        <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Submit</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </section>

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>

@endsection

@section('scripts')
    <script>
        function showPass1() {
            var x = document.getElementById("myInput1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function showPass2() {
            var x = document.getElementById("myInput2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
