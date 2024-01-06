@extends('admin.layouts.master')

@section('title', 'Donate List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Donate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Donate</li>
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
                    <h3 class="card-title">Donate List</h3>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>Account Holder Name</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Permission To Donate</th>
                                <th>Organs Tissues For</th>
                                <th>Specific Organs Tissues</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($donates as $key => $donate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $donate->user->name }}</td>
                                    <td>{{ $donate->first_name }}</td>
                                    <td>{{ $donate->last_name }}</td>
                                    <td>{{ $donate->phone }}</td>
                                    <td>{{ $donate->email }}</td>
                                    <td>{{ $donate->height }}</td>
                                    <td>{{ $donate->weight }}</td>
                                    <td>{{ $donate->gender }}</td>
                                    <td>{{ $donate->address }}</td>
                                    <td>{{ $donate->permission_to_donate }}</td>
                                    <td>{{ $donate->organs_tissues_for }}</td>
                                    <td>{{ $donate->specific_organs_tissues_name }}</td>
                                    <td>{{ $donate->anything_description }}</td>
                                    <td>
                                        @if ($donate->use_status == '1')
                                            <a href="{{ route('admin.donate-status', $donate->id) }}"
                                                class="btn btn-sm btn-success">Used Organ </a>
                                        @else
                                            <a href="{{ route('admin.donate-status', $donate->id) }}"
                                                class="btn btn-sm btn-danger">Unused Organ</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            @if ($donate->use_status == '0')
                                            <button class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#edit_{{ $donate->id }}"><i class="fas fa-money-check-alt mr-1"></i>Used Organ</button>
                                            @else
                                            <i class="fas fa-shield-cross"></i>
                                            <button class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#show_{{ $donate->id }}"><i class="fas fa-eye mr-1"></i>View Used Organ</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @if ($donate->use_status == '0')
                                @include('admin.show.donate-edit-model', [
                                    'donate' => $donate
                                ]);
                                @else
                                @include('admin.show.donate-show-model', [
                                    'donate' => $donate
                                ]);
                                @endif
                                
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl no.</th>
                                <th>Account Holder Name</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Permission To Donate</th>
                                <th>Organs Tissues For</th>
                                <th>Specific Organs Tissues</th>
                                <th>Note</th>
                                <th>Status</th>
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
