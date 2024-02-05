@extends('admin.layouts.master')

@section('title', 'Death Donate List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Organ Transplant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Organ Transplant</li>
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
                    <h3 class="card-title">Organ Transplant List</h3>
                    
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
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($organ_transplants as $key => $organ_transplant)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $organ_transplant->user->name }}</td>
                                    <td>{{ $organ_transplant->donate->first_name }}</td>
                                    <td>{{ $organ_transplant->donate->last_name }}</td>
                                    <td>{{ $organ_transplant->death_date }}</td>
                                    <td>{{ $organ_transplant->death_time }}</td>
                                    <td>{{ $organ_transplant->phone }}</td>
                                    <td>{{ $organ_transplant->email }}</td>
                                    <td>{{ $organ_transplant->donate->gender }}</td>
                                    <td>{{ $organ_transplant->address }}</td>
                                    <td>{{ $organ_transplant->death_organs_tissues_status }}</td>
                                    <td>{{ $organ_transplant->anything_description }}</td>
                                    
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
