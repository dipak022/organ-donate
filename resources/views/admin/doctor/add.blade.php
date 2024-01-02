@extends('admin.layouts.master')

@section('title', 'Add Doctor')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Doctor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Doctor</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.doctor.index') }}">Doctor</a></li>
                        <li class="breadcrumb-item active">Add Doctor</li>
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
                    <h3 class="card-title">Add Doctor Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.doctor.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Type<span
                                            style="color: red">*</span></label>
                                    <select name="type" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Doctor
                                        </option>
                                       
                                    </select>
                                    @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Designation <span
                                            style="color: red">*</span></label>
                                    <select name="desig_id" class="form-control">
                                        <option value="">Select Designation</option>
                                        @foreach ($designation as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('desig_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Department <span
                                            style="color: red">*</span></label>
                                    <select name="dept_id" class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach ($department as $dep)
                                            <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Doctor Name<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" placeholder="Doctor Name" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Email <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}" placeholder="Email" required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Mobile Number <span
                                            style="color: red">*</span></label>
                                    <input class="form-control" type="text" name="mobile"
                                        placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}"
                                        title="Enter 11 digits mobile number" value="{{ old('mobile') }}" required>
                                    @error('mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Alternate Mobile</label>
                                    <input class="form-control" type="text" name="mobile2"
                                        placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}"
                                        title="Enter 11 digits mobile number" value="{{ old('mobile2') }}">
                                    @error('mobile2')
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
                            <div class="col-md-2">
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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Bloog Group</label>
                                    <select class="form-control" name="blood_grp">
                                        <option value="">Select Bloog Group</option>
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
                                    <label for="" class="col-form-label">Date of Birth<span
                                            style="color: red">*</span></label>
                                    <input type="date" name="dob" class="form-control"
                                        value="{{ old('dob') }}">
                                    @error('generic_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Degree</label>
                                    <input type="text" class="form-control" name="degree" id="degree"
                                        value="{{ old('degree') }}" placeholder="Degree">
                                    @error('degree')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Speciality</label>
                                    <input type="text" class="form-control" name="specialist" id="specialist"
                                        value="{{ old('specialist') }}" placeholder="Speciality">
                                    @error('specialist')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Exp. (Years)</label>
                                    <input type="number" class="form-control" name="exp" id="exp"
                                        value="{{ old('exp') }}" placeholder="Experience">
                                    @error('exp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Training Certificate</label>
                                    <input type="text" class="form-control" name="train_certi" id="train_certi"
                                        value="{{ old('train_certi') }}" placeholder="Training Certificate">
                                    @error('train_certi')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Consult Fee</label>
                                    <input type="number" class="form-control" name="consult_fee" id="consult_fee"
                                        value="{{ old('consult_fee') }}" placeholder="Consult Fee">
                                    @error('consult_fee')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Follow up Fee</label>
                                    <input type="number" class="form-control" name="follow_up_fee" id="follow_up_fee"
                                        value="{{ old('follow_up_fee') }}" placeholder="Follow up Fee">
                                    @error('follow_up_fee')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Hospital Name</label>
                                    <input type="text" class="form-control" name="hosp_name" id="hosp_name"
                                        value="{{ old('hosp_name') }}" placeholder="Hospital Name">
                                    @error('hosp_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">About</label>
                                    <textarea class="form-control" rows="2" name="about" id="about" value="{{ old('about') }}"
                                        placeholder="Enter About..."></textarea>
                                    @error('about')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Address</label>
                                    <textarea class="form-control" rows="2" name="address" id="address" value="{{ old('address') }}"
                                        placeholder="Enter Address..."></textarea>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">City</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        value="{{ old('city') }}" placeholder="City">
                                    @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">District</label>
                                    <input type="text" class="form-control" name="district" id="district"
                                        value="{{ old('district') }}" placeholder="District">
                                    @error('district')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Division</label>
                                    <input type="text" class="form-control" name="division" id="division"
                                        value="{{ old('division') }}" placeholder="Division">
                                    @error('division')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Country</label>
                                    <input type="text" class="form-control" name="country" id="country"
                                        value="{{ old('country') }}" placeholder="Country">
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Select Image:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image"
                                            id="exampleInputFile" onchange="readURLImage(this)">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <p></p>
                                    <img src="" class="showImage" alt="">
                                    @error('image')
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
    <script type="text/javascript">
        function readURLImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.showImage')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function showPass1() {
            var x = document.getElementById("myInput1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
