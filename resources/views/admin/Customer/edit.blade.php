@extends('admin.layouts.master')

@section('title', 'Edit Customer')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Customer</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Customer</a></li>
                        <li class="breadcrumb-item active">Edit Customer</li>
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
                    <h3 class="card-title">Edit Customer</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.customer.update', $customer->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Customer ID<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="customer_id" id="customer_id"
                                        value="{{ $customer->customer_id }}" placeholder="Customer ID" readonly>
                                    @error('customer_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Customer Name<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $customer->name }}" placeholder="Medicine Name" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Father Name</label>
                                    <input type="text" class="form-control" name="father_name" id="father_name"
                                        value="{{ $customer->father_name }}" placeholder="Father Name" required>
                                    @error('father_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Mother Name</label>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name"
                                        value="{{ $customer->mother_name }}" placeholder="Mother Name" required>
                                    @error('mother_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ $customer->email }}" placeholder="Email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Mobile Number<span
                                            style="color: red">*</span></label>
                                    <input class="form-control" type="text" name="mobile"
                                        placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}"
                                        title="Enter 11 digits mobile number" value="{{ $customer->mobile }}" required>
                                    @error('mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Birth Reg.</label>
                                    <input type="text" class="form-control" name="birth_reg" id="birth_reg"
                                        value="{{ $customer->birth_reg }}" placeholder="Birth Reg.">
                                    @error('birth_reg')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">NID</label>
                                    <input type="text" class="form-control" name="nid" id="nid"
                                        value="{{ $customer->nid }}" placeholder="NID">
                                    @error('nid')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Passport</label>
                                    <input type="text" class="form-control" name="passport" id="passport"
                                        value="{{ $customer->passport }}" placeholder="Passport">
                                    @error('passport')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Occupation</label>
                                    <input type="text" class="form-control" name="occupation" id="occupation"
                                        value="{{ $customer->occupation }}" placeholder="Occupation">
                                    @error('occupation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Gender<span
                                            style="color: red">*</span></label>
                                    <select name="gender" class="form-control" required>
                                        <option value="Male" @selected($customer->gender == 'Male')>Male
                                        </option>
                                        <option value="Female" @selected($customer->gender == 'Female')>Female</option>
                                        <option value="Other" @selected($customer->gender == 'Other')>Other</option>
                                    </select>
                                    @error('gender')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Religion<span
                                            style="color: red">*</span></label>
                                    <select name="religion" class="form-control" required>
                                        <option value="Hinduism" @selected($customer->religion == 'Hinduism')>Hinduism</option>
                                        <option value="Islam" @selected($customer->religion == 'Islam')>Islam</option>
                                        <option value="Buddhism" @selected($customer->religion == 'Buddhism')>Buddhism</option>
                                        <option value="Christianity" @selected($customer->religion == 'Christianity')>Christianity</option>
                                        <option value="Jainism" @selected($customer->religion == 'Jainism')>Jainism</option>
                                    </select>
                                    @error('religion')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Marital Status</label>
                                    <select name="marital_status" class="form-control">
                                        <option value="Single" @selected($customer->marital_status == 'Single')>Single</option>
                                        <option value="Married" @selected($customer->marital_status == 'Married')>Married</option>
                                        <option value="Widowed" @selected($customer->marital_status == 'Widowed')>Widowed</option>
                                        <option value="Separated" @selected($customer->marital_status == 'Separated')>Separated</option>
                                        <option value="Divorced" @selected($customer->marital_status == 'Divorced')>Divorced</option>
                                    </select>
                                    @error('marital_status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Bloog Group<span
                                            style="color: red">*</span></label>
                                    <select class="form-control" name="blood_grp">
                                        <option value="A+VE" @selected($customer->blood_grp == 'A+VE')>A+VE</option>
                                        <option value="A-VE" @selected($customer->blood_grp == 'A-VE')>A-VE</option>
                                        <option value="B+VE" @selected($customer->blood_grp == 'B+VE')>B+VE</option>
                                        <option value="B-VE" @selected($customer->blood_grp == 'B-VE')>B-VE</option>
                                        <option value="O+VE" @selected($customer->blood_grp == 'O+VE')>O+VE</option>
                                        <option value="O-VE" @selected($customer->blood_grp == 'O-VE')>O-VE</option>
                                        <option value="AB+VE" @selected($customer->blood_grp == 'AB+VE')>AB+VE</option>
                                        <option value="AB-VE" @selected($customer->blood_grp == 'AB-VE')>AB-VE</option>
                                    </select>
                                    </select>
                                    @error('blood_grp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Date of Birth<span
                                            style="color: red">*</span></label>
                                    <input type="date" name="dob" class="form-control"
                                        value="{{ $customer->dob }}">
                                    @error('generic_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Present Address</label>
                                    <textarea class="form-control" rows="2" name="present_address" id="present_address" placeholder="Enter Present Address...">{{ $customer->present_address }}</textarea>
                                    @error('present_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Present City</label>
                                    <input type="text" class="form-control" name="present_city" id="present_city"
                                        value="{{ $customer->present_city }}" placeholder="Present City">
                                    @error('present_city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Present District</label>
                                    <input type="text" class="form-control" name="present_district" id="present_district"
                                        value="{{ $customer->present_district }}" placeholder="Present District">
                                    @error('present_district')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Present Division</label>
                                    <input type="text" class="form-control" name="present_division" id="present_division"
                                        value="{{ $customer->present_division }}" placeholder="Present Division">
                                    @error('present_division')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Permanent Address</label>
                                    <textarea class="form-control" rows="2" name="permanent_address" id="permanent_address" placeholder="Enter Permanent Address...">{{ $customer->permanent_address }}</textarea>
                                    @error('permanent_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Permanent City</label>
                                    <input type="text" class="form-control" name="permanent_city" id="permanent_city"
                                        value="{{ $customer->permanent_city }}" placeholder="Permanent City">
                                    @error('permanent_city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Permanent District</label>
                                    <input type="text" class="form-control" name="permanent_district" id="permanent_district"
                                        value="{{ $customer->permanent_district }}" placeholder="Permanent District">
                                    @error('permanent_district')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Permanent Division</label>
                                    <input type="text" class="form-control" name="permanent_division" id="permanent_division"
                                        value="{{ $customer->permanent_division }}" placeholder="Permanent Division">
                                    @error('permanent_division')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Country</label>
                                    <input type="text" class="form-control" name="country" id="country"
                                        value="{{ $customer->country }}" placeholder="Country">
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Guardian Name</label>
                                    <input type="text" class="form-control" name="guard_name" id="guard_name"
                                        value="{{ $customer->guard_name }}" placeholder="Guardian Name">
                                    <input type="checkbox" id="fatherNameCheck">
                                    <label for="" class="col-form-label">&nbsp;Same as Father Name</label>
                                    @error('guard_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label"> Guardian Mobile Number</label>
                                    <input class="form-control" type="text" name="guard_mobile"
                                        placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}"
                                        title="Enter 11 digits mobile number" value="{{ $customer->guard_mobile }}">
                                    @error('guard_mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Guardian address</label>
                                    <textarea class="form-control" rows="2" name="guard_address" id="guard_address"
                                        placeholder="Enter Address...">{{ $customer->guard_address }}</textarea>
                                    <p></p>
                                    <input type="checkbox" id="addressCheckPermanent">
                                    <label for="" class="col-form-label">&nbsp;Same as Permanent Address</label>
                                    <br>
                                    <input type="checkbox" id="addressCheckPresent">
                                    <label for="" class="col-form-label">&nbsp;Same as Permanent Address</label>
                                    @error('guard_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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

@section('scripts')
    <script>
        $('#addressCheckPermanent').on('change', function(e) {
            e.preventDefault();
            if (this.checked) {
                $('#guard_address').val($('#permanent_address').val());
                //alert(first);

            } else {
                $('#guard_address').val("");
            }
        });

        $('#addressCheckPresent').on('change', function(e) {
            e.preventDefault();
            if (this.checked) {
                $('#guard_address').val($('#present_address').val());
                //alert(first);

            } else {
                $('#guard_address').val("");
            }
        });

        $('#fatherNameCheck').on('change', function(e) {
            e.preventDefault();
            if (this.checked) {
                $('#guard_name').val($('#father_name').val());
                //alert(first);

            } else {
                $('#guard_name').val("");
            }
        });
    </script>
@endsection
