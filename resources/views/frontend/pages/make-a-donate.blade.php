@extends('frontend.layouts.master')

@section('content')
   
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Make a Donation</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area section_padding">
        <div class="container">
    
        <div data-scroll-index='1' class="make_donation_area section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb-55">
                            <h3><span>Make A Donation</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form action="{{ route('confused.or.organ.from') }}" class="donation_form" method="GET" >
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="single_amount">
                                        <div class="input_field">
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control" placeholder="Are you sure?" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="single_amount">
                                    <div class="fixed_donat d-flex align-items-center justify-content-between">
                                        <div class="select_prise">
                                            <h4>Select :</h4>
                                        </div>
                                            <div class="single_doonate"> 
                                                <input type="radio" id="blns_1" name="orgen_donate" required value="yes">
                                                <label for="blns_1">Yes</label>
                                            </div>
                                            
                                            <div class="single_doonate"> 
                                                <input type="radio" id="Confused" name="orgen_donate" value="confused">
                                                <label for="Confused">Confused</label>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="donate_now_btn text-center">
                                        <button type="submit" class="boxed-btn4">Donate Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
   
    
@endsection    

@section('scripts')

@endsection