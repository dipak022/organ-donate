@extends('admin.layouts.master')

@section('title', 'Message List')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Setup</a></li>
                        <li class="breadcrumb-item active">Message</li>
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
                    <h3 class="card-title">Message List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>Sender Name</th>
                                <th>Message</th>
                                <th>Replay</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($messages as $key => $message)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $message->user->name }}</td>
                                    <td>{{ $message->description }}</td>
                                    <td>{{ $message->replay }}</td>
                                    <td>
                                        @if ($message->status == '0')
                                        <span class="badge badge-success">Done</span>
                                        @else
                                        <span class="badge badge-danger">No Replay</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.message.edit', $message->id) }}"
                                                class="btn btn-info btn-sm mr-2"><i class="fas fa-edit mr-1"></i>Edit</a>
                                           
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl no.</th>
                                <th>Sender Name</th>
                                <th>Message</th>
                                <th>Replay</th>
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
