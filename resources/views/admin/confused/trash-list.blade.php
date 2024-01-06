@extends('admin.layouts.master')

@section('title', 'Confused - Trash List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trashed Confused</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Confused</li>
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
                    <h3 class="card-title">Trashed Confused List</h3>
                    <a href="{{ route('admin.confused.index') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fas fa-sign-in-alt mr-2"></i>Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.confused.multi-delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><button type="submit" class="btn btn-danger dltBtn"><i
                                                class="fas fa-trash mr-1"></i>Delete
                                            Multiple</button></th>
                                    <th>Sl no.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($confuseds as $key => $confused)
                                    <tr>
                                        <td class="text-center"><input type="checkbox" class="form-control"
                                                name="ids[{{ $confused->id }}]" value="{{ $confused->id }}"
                                                id=""></td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $confused->name }}</td>
                                        <td>{{ $confused->description }}</td>
                                        <td>
                                            @if ($confused->status == '1')
                                                <a href="{{ route('admin.confused-status', $confused->id) }}"
                                                    class="btn btn-sm btn-success disabled">Active</a>
                                            @else
                                                <a href="{{ route('admin.confused-status', $confused->id) }}"
                                                    class="btn btn-sm btn-danger disabled">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.confused-restore', $confused->id) }}"
                                                    class="btn btn-info btn-sm mr-2"><i
                                                        class="fas fa-recycle mr-1"></i>Restore</a>
                                                <a href="{{ route('admin.confused.force-delete', $confused->id) }}"
                                                    class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete this item?')"><i
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
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
