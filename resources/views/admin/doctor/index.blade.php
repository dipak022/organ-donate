@extends('admin.layouts.master')

@section('title', 'Doctor List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Doctor</h1>
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
                    <h3 class="card-title">Doctor List</h3>
                    <div class="float-right">
                        <a href="{{ route('admin.doctor.create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus mr-2"></i>Add Doctor</a>
                        <a href="{{ route('admin.doctor-trash') }}" class="btn btn-danger btn-sm"><i
                                class="fas fa-trash-restore mr-2"></i>Trashed Doctor</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
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
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $doctor->doctor_id }}</td>
                                    @if ($doctor->type == 1)
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
                                                class="btn btn-sm btn-success">Active</a>
                                        @else
                                            <a href="{{ route('admin.doctor-status', $doctor->id) }}"
                                                class="btn btn-sm btn-danger">Inactive</a>
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
                                            <a href="{{ route('admin.doctor.edit', $doctor->id) }}"
                                                class="btn btn-info btn-sm mr-2"><i class="fas fa-edit mr-1"></i>Edit</a>
                                            <form action="{{ route('admin.doctor.destroy', $doctor->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-danger dltBtn"><i
                                                        class="fas fa-trash mr-1"></i>Trash</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl no.</th>
                                <th>Doctor ID</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
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
