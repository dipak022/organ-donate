@extends('admin.layouts.master')

@section('title', 'Confused List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Confused</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Setup</a></li>
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
                    <h3 class="card-title">Confused List</h3>
                    <div class="float-right">
                        <a href="{{ route('admin.confused.create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus mr-2"></i>Add Confused</a>
                        <a href="{{ route('admin.confused-trash') }}" class="btn btn-danger btn-sm"><i
                                class="fas fa-trash-restore mr-2"></i>Trashed Confused</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
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
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $confused->name }}</td>
                                    <td>{{ $confused->description }}</td>
                                    <td>
                                        @if ($confused->status == '1')
                                            <a href="{{ route('admin.confused-status', $confused->id) }}"
                                                class="btn btn-sm btn-success">Active</a>
                                        @else
                                            <a href="{{ route('admin.confused-status', $confused->id) }}"
                                                class="btn btn-sm btn-danger">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.confused.edit', $confused->id) }}"
                                                class="btn btn-info btn-sm mr-2"><i class="fas fa-edit mr-1"></i>Edit</a>
                                            <form action="{{ route('admin.confused.destroy', $confused->id) }}"
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
                                <th>Title</th>
                                <th>Description</th>
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
