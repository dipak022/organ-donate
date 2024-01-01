
<!-- Profile Image -->
 <div class="card card-primary card-outline">
    <div class="card-body box-profile">
    <div class="text-center">
        @if($customer_info->image)
        <img class="profile-user-img img-fluid img-circle"
            src="{{ asset($customer->image) }}"
            alt="{{$customer_info->name}}">
        @else
        <img class="profile-user-img img-fluid img-circle"
            src="{{ asset('avatar1.jpg') }}">
        
        @endif
    </div>
    <h3 class="profile-username text-center">{{ucfirst($customer_info->name)}}</h3>
    <ul class="list-group list-group-unbordered mb-3">
    <li class="list-group-item">
        <b>Customer Id</b> <a class="float-right">{{ucfirst($customer_info->customer_id)}}</a>
    </li>
    <li class="list-group-item">
        <b>Age</b> <a class="float-right">{{ucfirst($customer_info->age)}}</a>
    </li>
    <li class="list-group-item">
        <b>Blood Group</b> <a class="float-right">{{ucfirst($customer_info->blood_grp)}}</a>
    </li>
    <li class="list-group-item">
        <b>Mobile</b> <a class="float-right">{{ucfirst($customer_info->mobile)}}</a>
    </li>
    </ul>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- About Me Box -->
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Patient Report Detail</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

    <a style="color:black;" href="{{route('admin.spectacle.report.show',$customer_info->customer_id)}}" target="blank" class="nav-item {{ Route::is('admin.spectacle.report.show') ? 'text-success' : ''}}"><strong><i class="far fa-user mr-1"></i> Spectacle</strong></a><hr>

    <a style="color:black;" href="{{route('admin.history.report.show',$customer_info->customer_id)}}" target="blank" class="nav-item {{ Route::is('admin.history.report.show') ? 'text-success' : ''}}"><strong><i class="far fa-user mr-1"></i> History</strong></a><hr>

    <a style="color:black;" href="{{route('admin.ocular.report.show',$customer_info->customer_id)}}" target="blank" class="nav-item {{ Route::is('admin.ocular.report.show') ? 'text-success' : ''}}"><strong><i class="far fa-user mr-1"></i> Ocular</strong></a><hr>

    <a style="color:black;" href="{{route('admin.stitexam.report.show',$customer_info->customer_id)}}" target="blank" class="nav-item {{ Route::is('admin.stitexam.report.show') ? 'text-success' : ''}}"><strong><i class="far fa-user mr-1"></i> Stit Exam</strong></a><hr>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
