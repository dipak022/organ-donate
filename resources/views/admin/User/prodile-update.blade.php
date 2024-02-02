@extends('admin.layouts.master')

@section('title', 'Profile Settings')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active">Profile Settings</li>
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
                    <h3 class="card-title">Profile Settings</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">User Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $user->name }}" placeholder="User Name" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Email</label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->email }}" placeholder="Email" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Mobile</label>
                                    <input class="form-control" type="text" name="mobile"
                                        placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}"
                                        title="Enter 11 digits mobile number" value="{{ $user->mobile }}" required>
                                    @error('mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Profile Avatar</label>
                                    <input type="file" id="file" class="form-control" name="image" onchange="readURL(this);"  accept="image">
                                    <img src="{{ asset($user->image) }}" id="image" style="height:80px;with:100px;">
                                    <input type="hidden" name="old_image" value="{{ $user->image }}">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
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
    </script>
    <script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(100)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
