@extends('admin.layouts.master')

@section('title', 'Death Donate List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Death Donate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Death Donate</li>
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
                    <h3 class="card-title">Death Donate List</h3>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>Account Holder Name(Death)</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Death Date</th>
                                <th>Death Time</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Death Organs Tissues Status</th>
                                <th>Collect Organ Location</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($death_donates as $key => $death_donate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $death_donate->user->name }}</td>
                                    <td>{{ $death_donate->donate->first_name }}</td>
                                    <td>{{ $death_donate->donate->last_name }}</td>
                                    <td>{{ $death_donate->death_date }}</td>
                                    <td>{{ $death_donate->death_time }}</td>
                                    <td>{{ $death_donate->phone }}</td>
                                    <td>{{ $death_donate->email }}</td>
                                    <td>{{ $death_donate->donate->gender }}</td>
                                    <td>{{ $death_donate->address }}</td>
                                    <td>{{ $death_donate->death_organs_tissues_status }}</td>
                                    <td>{{ $death_donate->collect_organ_location }}</td>
                                    <td>{{ $death_donate->anything_description }}</td>
                                    
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl no.</th>
                                <th>Account Holder Name(Death)</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Death Date</th>
                                <th>Death Time</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Death Organs Tissues Status</th>
                                <th>Collect Organ Location</th>
                                <th>Note</th>
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
