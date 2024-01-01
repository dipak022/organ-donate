@extends('admin.layouts.master')

@section('title', 'Doctor - Trash List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trashed Doctor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                        <li class="breadcrumb-item active">Doctor List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trashed Doctor List</h3>
                    <a href="{{ route('admin.doctor.index') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fas fa-sign-in-alt mr-2"></i>Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.doctor.multi-delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><button type="submit" class="btn btn-danger dltBtn"><i
                                                class="fas fa-trash mr-1"></i>Delete
                                            Multiple</button></th>
                                    <th>Sl no.</th>
                                    <th>Doctor ID</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Created Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctor as $key => $doctor)
                                    <tr>
                                        <td class="text-center"><input type="checkbox" class="form-control"
                                                name="ids[{{ $doctor->id }}]" value="{{ $doctor->id }}" id="">
                                        </td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $doctor->doctor_id }}</td>
                                        @if ($doctor->type == '0')
                                            <td>Doctor</td>
                                        @else
                                            <td>Assistant</td>
                                        @endif
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->mobile }}</td>
                                        <td>
                                            @if ($doctor->status == '1')
                                                <a href="{{ route('admin.doctor-status', $doctor->id) }}"
                                                    class="btn btn-sm btn-success disabled">Active</a>
                                            @else
                                                <a href="{{ route('admin.doctor-status', $doctor->id) }}"
                                                    class="btn btn-sm btn-danger disabled">Inactive</a>
                                            @endif
                                        </td>
                                        @if ($doctor->image)
                                            <td><img src="{{ asset($doctor->image) }}" alt="" width="90"
                                                    height="90"></td>
                                        @else
                                            <td><img src="{{ asset('Images/default-image.jpg') }}" alt=""
                                                    width="90" height="90"></td>
                                        @endif
                                        <td>{{ $doctor->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.doctor-restore', $doctor->id) }}"
                                                    class="btn btn-info btn-sm mr-2"><i
                                                        class="fas fa-recycle mr-1"></i>Restore</a>
                                                <a href="{{ route('admin.doctor.force-delete', $doctor->id) }}"
                                                    class="btn btn-danger btn-sm "onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                        class="fas fa-trash mr-1"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Bulk Delete</th>
                                    <th>Sl no.</th>
                                    <th>Doctor ID</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Created Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
@endsection
