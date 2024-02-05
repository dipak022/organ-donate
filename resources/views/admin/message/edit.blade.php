@extends('admin.layouts.master')

@section('title', 'Edit Message')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Setup</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.message.index') }}">Confused</a></li>
                        <li class="breadcrumb-item active">Edit Message</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Message</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.message.update', $message->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="col-form-label">Message <span
                                        style="color: red">*</span></label>
                                
                                <textarea class="form-control" name="description" id="description" rows="2" placeholder="Description" readonly>{{ $message->description }}</textarea>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="col-form-label">Replay</label>
                                <textarea class="form-control" name="replay" id="replay" rows="2" placeholder="Replay">{{ $message->replay }}</textarea>
                                @error('replay')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Submit</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </section>

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
@endsection
