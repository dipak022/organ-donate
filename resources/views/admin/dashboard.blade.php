{{-- <x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> --}}

@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

                          

    <!-- Main content -->
    <section class="content">
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <div class="form-group">
                <form action="{{ route('admin.dashboard') }}" class="dt_adv_search pb-2">
                  <div class="row">
                    <label class="col-sm-1 col-form-label" for="from">From :</label>
                    <div class="col-sm-4">
                        <input value="{{isset($from) ? $from : ''}}" type="text" class="form-control date-pic" id="from"
                            name="from" placeholder="YYYY-MM-DD">
                    </div>
                    <label class="col-sm-1 col-form-label" for="to">To :</label>
                    <div class="col-sm-4">
                        <input value="{{isset($to) ? $to : ''}}" type="text" class="form-control date-pic" id="to" name="to"
                            placeholder="YYYY-MM-DD">
                    </div>
                    
                    <div class="col-sm-2">
                        <input type="submit" class=" dt-button  btn btn-primary" value="Search">
                    </div>
                  </div>
              </form>
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid">
        <br>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  0
                </h3>

                <p>Total Appoinment</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  0
                <sup style="font-size: 20px"></sup></h3>
                <p>Appoinment Not Visitd</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  0
                </h3>

                <p>Appoinment Visitd</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  0
                </h3>

                <p>Appointment Amount</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <br>


        


        





        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button"
        aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
@endsection
