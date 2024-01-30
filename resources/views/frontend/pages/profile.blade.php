@extends('frontend.layouts.master')

@section('styles')
@endsection

@section('content')



    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
            
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Organ Donate List</h2>
                    </div>
                    <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Height</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Address</th>
                            <th scope="col">Specific Organs Tissues</th>
                            <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donates as $key => $donate)
                            <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{$donate->first_name}}</td>
                            <td>{{$donate->last_name}}</td>
                            <td>{{$donate->phone}}</td>
                            <td>{{$donate->height}}</td>
                            <td> {{$donate->weight}}</td>
                            <td>{{$donate->address}}</td>
                            <td>{{$donate->specific_organs_tissues_name}}</td>
                            <td>{{$donate->anything_description}}</td>
                            </tr>
                            <tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                    
            </div>
        </section>
    <!-- ================ contact section end ================= -->

    
@endsection    

@section('scripts')

@endsection