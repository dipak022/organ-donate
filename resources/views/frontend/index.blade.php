@extends('frontend.layouts.master')

@section('content')
   


    <!-- slider_area_start -->
    @include('frontend.layouts.slider')
    <!-- slider_area_end -->


    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Organ Donation List</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="causes_active owl-carousel">
                    @foreach($donates as $key => $donate)
                        <div class="single_cause">
                            
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">
                                            </span>
                                        </div>
                                      </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span>Frist Name: {{$donate->first_name}} </span>
                                    <span>Last Name: {{$donate->last_name}} </span>
                                </div>
                                <h4>Phone : {{$donate->phone}}</h4>
                                @if($donate->specific_organs_tissues_name)
                                <h6>Specific Organs Tissues : {{$donate->specific_organs_tissues_name}}</h6>
                                @else
                                <h6>Organs Tissues : Anything Donation</h6>
                                @endif
                                @if($donate->email)
                                <h6>Email : {{$donate->email}}</h6>
                                @endif
                                <h6>Height : {{$donate->height}}</h6>
                                <h6>Height : {{$donate->height}}</h6>
                                <h6>Weight : {{$donate->weight}}</h6>
                                <h6>Address : {{$donate->address}}</h6>
                                <h6>City : {{$donate->city}}</h6>
                                <p>{{$donate->anything_description}}</p>
                                
                            </div>
                            
                        </div>
                        @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->

     <!-- popular_causes_area_start  -->
     <div class="popular_causes_area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Doctors consultancy List</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="causes_active owl-carousel">
                    @foreach($doctors as $key => $doctor)
                        <div class="single_cause">
                            
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">
                                            </span>
                                        </div>
                                      </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span>Dept. Name: <br> {{$doctor->department->name}} </span>
                                    <span>Desg. Name: <br> {{$doctor->designation->name}} </span>
                                </div>
                                <h4>Name : {{$doctor->name}}</h4>
                                <h6>Specialist : {{$doctor->specialist}}</h6>
                                <h6>Email : {{$doctor->email}}</h6>
                                <h6>Phone : {{$doctor->mobile }}</h6>
                                <h6>Hospital Name : {{$doctor->hosp_name }}</h6>
                                <h6>Address : {{$doctor->address}}</h6>
                                
                            </div>
                            
                        </div>
                        @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->



    
    
    <br>
   
    
@endsection    

@section('scripts')

@endsection