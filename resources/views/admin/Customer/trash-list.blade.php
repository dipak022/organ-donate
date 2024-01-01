@extends('admin.layouts.master')

@section('title', 'Customer - Trash List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trashed Customer</h1>
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
                    <h3 class="card-title">Trashed Customer List</h3>
                    <a href="{{ route('admin.customer.index') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fas fa-sign-in-alt mr-2"></i>Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.customer.multi-delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><button type="submit" class="btn btn-danger dltBtn"><i class="fas fa-trash mr-1"></i>Delete
                                            Multiple</button></th>
                                    <th>Sl no.</th>
                                    <th>Customer Name</th>
                                    <th>Generic Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customer as $key => $customer)
                                    <tr>
                                        <td class="text-center"><input type="checkbox" class="form-control"
                                                name="ids[{{ $customer->id }}]" value="{{ $customer->id }}" id="">
                                        </td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $customer->customer_id }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->mobile }}</td>
                                        <td>{{ $customer->age }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>
                                            @if ($customer->status == '1')
                                                <a href="{{ route('admin.customer-status', $customer->id) }}"
                                                    class="btn btn-sm btn-success disabled">Active</a>
                                            @else
                                                <a href="{{ route('admin.customer-status', $customer->id) }}"
                                                    class="btn btn-sm btn-danger disabled">Inactive</a>
                                            @endif
                                        </td>
                                        <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.customer-restore', $customer->id) }}"
                                                    class="btn btn-info btn-sm mr-2"><i
                                                        class="fas fa-recycle mr-1"></i>Restore</a>
                                                <a href="{{ route('admin.customer.force-delete', $customer->id) }}"
                                                    class="btn btn-danger btn-sm dltBtn"><i
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
