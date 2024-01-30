@extends('frontend.layouts.master')

@section('content')


    <!-- news__area_start  -->
    <div class="news__area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Death News Form</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                   
                    <div class="col-lg-12">
                        <form class=""  novalidate="novalidate" action="{{ route('death.organ.doantion.status.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Death Doner Name <span
                                                style="color: red">*</span></label>
                                        <select name="donate_id" class="form-control">
                                            <option value="">Select Death Doner Name</option>
                                            @foreach ($donates as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('donate_id') == $item->id ? 'selected' : '' }}>{{ $item->first_name }} {{ $item->last_name }}-({{ $item->phone }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Death Date<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="death_date" id="death_date" type="date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter date'" placeholder="Enter date" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Death Time<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="death_time" id="death_time" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter death time'" placeholder="Enter death time" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Phone<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="phone" id="phone" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone'" placeholder="Enter phone" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Address<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="address" id="address" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter address'" placeholder="Enter address" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Address Line 2</label>
                                        <input class="form-control" name="address_line" id="address_line" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter address line 2'" placeholder="Enter address line 2">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">City<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="city" id="city" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter city'" placeholder="Enter city" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Postal Code<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="postal_code" id="postal_code" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter postal code'" placeholder="Enter postal code" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Country<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="country" id="country" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter country'" placeholder="Enter country" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Email<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder="Enter email" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">I  Authorize Death organs/tissues status<span
                                            style="color: red">*</span></label>
                                        <select name="death_organs_tissues_status" class="form-control" required>
                                            <option value="">Select Death organs/tissues status</option>
                                            <option value="Use" {{ old('death_organs_tissues_status') == 'Use' ? 'selected' : '' }}>Use
                                            </option>
                                            <option value="Available" {{ old('death_organs_tissues_status') == 'Available' ? 'selected' : '' }}>Available
                                            </option>
                                            <option value="Others" {{ old('death_organs_tissues_status') == 'Others & transplant' ? 'selected' : '' }}>Others
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Collect Organ Address/Hospital/others<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="collect_organ_location" id="collect_organ_location" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Collect Organ Address/Hospital/others'" placeholder="Enter Collect Organ Address/Hospital/others" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Anything you want to add (any notes, Specific organs and/or tissues avaiable, use, etc.)</label>
                                        <textarea class="form-control w-100" name="anything_description" id="anything_description" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter anything'" placeholder=" Enter anything"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
        </div>
    </div>
    <!-- news__area_end  -->

    
@endsection    

@section('scripts')

@endsection