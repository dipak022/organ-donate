@extends('admin.layouts.master')

@section('title', 'Customer List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Customer</a></li>
                        <li class="breadcrumb-item active">Customer List</li>
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
                    <h3 class="card-title">Customer List</h3>
                    <div class="float-right">
                        <a href="{{ route('admin.customer.create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus mr-2"></i>Add Customer</a>
                        <a href="{{ route('admin.customer-trash') }}" class="btn btn-danger btn-sm"><i
                                class="fas fa-trash-restore mr-2"></i>Trashed Customer</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Phone No.</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customer as $key => $customer)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $customer->customer_id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->mobile }}</td>
                                    <td>{{  \Carbon\Carbon::parse($customer->dob)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days') }} </td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        @if ($customer->status == '1')
                                            <a href="{{ route('admin.customer-status', $customer->id) }}"
                                                class="btn btn-sm btn-success">Active</a>
                                        @else
                                            <a href="{{ route('admin.customer-status', $customer->id) }}"
                                                class="btn btn-sm btn-danger">Inactive</a>
                                        @endif
                                    </td>
                                    <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.customer.edit', $customer->id) }}"
                                                class="btn btn-info btn-sm mr-2"><i class="fas fa-edit mr-1"></i>Edit</a>
                                            <form action="{{ route('admin.customer.destroy', $customer->id) }}"
                                                method="post">
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
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Phone No.</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Status</th>
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
