@extends('admin.layouts.master')

@section('title', 'Add Customer')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Customer</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Customer</a></li>
                        <li class="breadcrumb-item active">Add Customer</li>
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
                    <h3 class="card-title">Add Customer Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.customer.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Customer Name<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" placeholder="Customer Name" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Father Name</label>
                                    <input type="text" class="form-control" name="father_name" id="father_name"
                                        value="{{ old('father_name') }}" placeholder="Father Name">
                                    @error('father_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Mother Name</label>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name"
                                        value="{{ old('mother_name') }}" placeholder="Mother Name" required>
                                    @error('mother_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Email<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}" placeholder="Email" required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Mobile Number<span
                                            style="color: red">*</span></label>
                                    <input class="form-control" type="text" name="mobile"
                                        placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}"
                                        title="Enter 11 digits mobile number" value="{{ old('mobile') }}" required>
                                    @error('mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Birth Reg.</label>
                                    <input type="number" class="form-control" name="birth_reg" id="birth_reg"
                                        value="{{ old('birth_reg') }}" placeholder="Birth Reg.">
                                    @error('birth_reg')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">NID</label>
                                    <input type="number" class="form-control" name="nid" id="nid"
                                        value="{{ old('nid') }}" placeholder="NID">
                                    @error('nid')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Passport</label>
                                    <input type="text" class="form-control" name="passport" id="passport"
                                        value="{{ old('passport') }}" placeholder="Passport">
                                    @error('passport')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Occupation</label>
                                    <input type="text" class="form-control" name="occupation" id="occupation"
                                        value="{{ old('occupation') }}" placeholder="Occupation">
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
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
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
                                        <option value="">Select Religion</option>
                                        <option value="Hinduism" {{ old('religion') == 'Hinduism' ? 'selected' : '' }}>
                                            Hinduism</option>
                                        <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Buddhism" {{ old('religion') == 'Buddhism' ? 'selected' : '' }}>
                                            Buddhism</option>
                                        <option value="Christianity"
                                            {{ old('religion') == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                        <option value="Jainism" {{ old('religion') == 'Jainism' ? 'selected' : '' }}>
                                            Jainism</option>
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
                                        <option value="">Select Marital Status</option>
                                        <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>
                                            Single</option>
                                        <option value="Married"
                                            {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Widowed"
                                            {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                        <option value="Separated"
                                            {{ old('marital_status') == 'Separated' ? 'selected' : '' }}>Separated</option>
                                        <option value="Divorced"
                                            {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    </select>
                                    @error('marital_status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Blood Group</label>
                                    <select class="form-control" name="blood_grp">
                                        <option value="">Select Blood Group</option>
                                        <option value="A+VE" {{ old('blood_grp') == 'A+VE' ? 'selected' : '' }}>A+VE
                                        </option>
                                        <option value="A-VE" {{ old('blood_grp') == 'A-VE' ? 'selected' : '' }}>A-VE
                                        </option>
                                        <option value="B+VE" {{ old('blood_grp') == 'B+VE' ? 'selected' : '' }}>B+VE
                                        </option>
                                        <option value="B-VE" {{ old('blood_grp') == 'B-VE' ? 'selected' : '' }}>B-VE
                                        </option>
                                        <option value="O+VE" {{ old('blood_grp') == 'O+VE' ? 'selected' : '' }}>O+VE
                                        </option>
                                        <option value="O-VE" {{ old('blood_grp') == 'O-VE' ? 'selected' : '' }}>O-VE
                                        </option>
                                        <option value="AB+VE" {{ old('blood_grp') == 'AB+VE' ? 'selected' : '' }}>AB+VE
                                        </option>
                                        <option value="AB-VE" {{ old('blood_grp') == 'AB-VE' ? 'selected' : '' }}>AB-VE
                                        </option>
                                    </select>
                                    </select>
                                    @error('blood_grp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control"
                                        value="{{ old('dob') }}">
                                    @error('generic_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Present Address</label>
                                    <textarea class="form-control" rows="2" name="present_address" id="present_address" value="{{ old('present_address') }}"
                                        placeholder="Enter Present Address..."></textarea>
                                    @error('present_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Present City</label>
                                    <input type="text" class="form-control" name="present_city" id="present_city"
                                        value="{{ old('present_city') }}" placeholder="Present city">
                                    @error('present_city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Present District</label>
                                    <input type="text" class="form-control" name="present_district" id="present_district"
                                        value="{{ old('present_district') }}" placeholder="Present District">
                                    @error('present_district')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Present Division</label>
                                    <input type="text" class="form-control" name="division" id="present_division"
                                        value="{{ old('present_division') }}" placeholder="Present Division">
                                    @error('present_division')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Permanent Address</label>
                                    <textarea class="form-control" rows="2" name="permanent_address" id="permanent_address" value="{{ old('permanent_address') }}"
                                        placeholder="Enter Permanent Address..."></textarea>
                                    @error('permanent_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Permanent City</label>
                                    <input type="text" class="form-control" name="permanent_city" id="permanent_city"
                                        value="{{ old('permanent_city') }}" placeholder="Permanent City">
                                    @error('permanent_city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Permanent District</label>
                                    <input type="text" class="form-control" name="permanent_district" id="permanent_district"
                                        value="{{ old('permanent_district') }}" placeholder="Permanent District">
                                    @error('permanent_district')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Permanent Division</label>
                                    <input type="text" class="form-control" name="permanent_division" id="permanent_division"
                                        value="{{ old('permanent_division') }}" placeholder="Permanent Division">
                                    @error('permanent_division')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Country</label>
                                    <input type="text" class="form-control" name="country" id="country"
                                        value="{{ old('country') }}" placeholder="Country">
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Guardian Name</label>
                                    <input type="text" class="form-control" name="guard_name" id="guard_name"
                                        value="{{ old('guard_name') }}" placeholder="Guardian Name">
                                    <input type="checkbox" id="fatherNameCheck">
                                    <label for="" class="col-form-label">&nbsp;Same as Father Name</label>
                                    @error('guard_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label"> Guardian Mobile Number</label>
                                    <input class="form-control" type="text" name="guard_mobile"
                                        placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}"
                                        title="Enter 11 digits mobile number" value="{{ old('guard_mobile') }}">
                                   
                                    @error('guard_mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Guardian address</label>
                                    <textarea class="form-control" rows="2" name="guard_address" id="guard_address"
                                        value="{{ old('guard_address') }}" placeholder="Enter Address..."></textarea>
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
