@extends('admin.layouts.master')

@section('title', 'Edit Doctor')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Doctor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Doctor</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.doctor.index') }}">Doctor List</a></li>
                        <li class="breadcrumb-item active">Edit Doctor</li>
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
                    <h3 class="card-title">Edit Doctor</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.doctor.update', $doctor->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Doctor ID<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="doctor_id" id="doctor_id"
                                        value="{{ $doctor->doctor_id }}" placeholder="Doctor ID" readonly>
                                    @error('doctor_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Type<span
                                            style="color: red">*</span></label>
                                    <select name="type" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="1" @selected($doctor->type == '1')>Doctor
                                        </option>
                                        <option value="2" @selected($doctor->type == '2')>Assistant
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
                                        @foreach ($designation as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $doctor->desig_id ? 'selected' : '' }}>{{ $item->name }}
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
                                        @foreach ($department as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $doctor->dept_id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Doctor Name<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $doctor->name }}" placeholder="Doctor Name" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Email <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ $doctor->email }}" placeholder="Email" readonly>
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
                                        title="Enter 11 digits mobile number" value="{{ $doctor->mobile }}" required>
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
                                        title="Enter 11 digits mobile number" value="{{ $doctor->mobile2 }}">
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
                                        <option value="Male" @selected($doctor->gender == 'Male')>Male
                                        </option>
                                        <option value="Female" @selected($doctor->gender == 'Female')>Female</option>
                                        <option value="Other" @selected($doctor->gender == 'Other')>Other</option>
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
                                        <option value="Hinduism" @selected($doctor->religion == 'Hinduism')>Hinduism</option>
                                        <option value="Islam" @selected($doctor->religion == 'Islam')>Islam</option>
                                        <option value="Buddhism" @selected($doctor->religion == 'Buddhism')>Buddhism</option>
                                        <option value="Christianity" @selected($doctor->religion == 'Christianity')>Christianity</option>
                                        <option value="Jainism" @selected($doctor->religion == 'Jainism')>Jainism</option>
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
                                        <option value="Single" @selected($doctor->religion == 'Single')>Single</option>
                                        <option value="Married" @selected($doctor->religion == 'Married')>Married</option>
                                        <option value="Widowed" @selected($doctor->religion == 'Widowed')>Widowed</option>
                                        <option value="Separated" @selected($doctor->religion == 'Separated')>Separated</option>
                                        <option value="Divorced" @selected($doctor->religion == 'Divorced')>Divorced</option>
                                    </select>
                                    @error('marital_status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Blood Group<span
                                            style="color: red">*</span></label>
                                    <select class="form-control" name="blood_grp">
                                        <option value="A+VE" @selected($doctor->religion == 'A+VE')>A+VE</option>
                                        <option value="A-VE" @selected($doctor->religion == 'A-VE')>A-VE</option>
                                        <option value="B+VE" @selected($doctor->religion == 'B+VE')>B+VE</option>
                                        <option value="B-VE" @selected($doctor->religion == 'B-VE')>B-VE</option>
                                        <option value="O+VE" @selected($doctor->religion == 'O+VE')>O+VE</option>
                                        <option value="O-VE" @selected($doctor->religion == 'O-VE')>O-VE</option>
                                        <option value="AB+VE" @selected($doctor->religion == 'AB+VE')>AB+VE</option>
                                        <option value="AB-VE" @selected($doctor->religion == 'AB-VE')>AB-VE</option>
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
                                        value="{{ $doctor->dob }}">
                                    @error('generic_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Degree <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="degree" id="degree"
                                        value="{{ $doctor->degree }}" placeholder="Degree" required>
                                    @error('degree')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Speciality <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="specialist" id="specialist"
                                        value="{{ $doctor->specialist }}" placeholder="Speciality" required>
                                    @error('specialist')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Training Certificate</label>
                                    <input type="text" class="form-control" name="train_certi" id="train_certi"
                                        value="{{ $doctor->train_certi }}" placeholder="Training Certificate">
                                    @error('train_certi')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Exp. (Years)</label>
                                    <input type="number" class="form-control" name="exp" id="exp"
                                        value="{{ $doctor->exp }}" placeholder="Experience">
                                    @error('exp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Consult Fee</label>
                                    <input type="text" class="form-control" name="consult_fee" id="consult_fee"
                                        value="{{ $doctor->consult_fee }}" placeholder="Consult Fee">
                                    @error('consult_fee')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Follow up Fee</label>
                                    <input type="text" class="form-control" name="follow_up_fee" id="follow_up_fee"
                                        value="{{ $doctor->follow_up_fee }}" placeholder="Follow up Fee">
                                    @error('follow_up_fee')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Hospital Name</label>
                                    <input type="text" class="form-control" name="hosp_name" id="hosp_name"
                                        value="{{ $doctor->hosp_name }}" placeholder="Hospital Name">
                                    @error('hosp_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">About</label>
                                    <textarea class="form-control" rows="2" name="about" id="about" placeholder="Enter About...">{{ $doctor->about }}</textarea>
                                    @error('about')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label">Address</label>
                                    <textarea class="form-control" rows="2" name="address" id="address" placeholder="Enter Address...">{{ $doctor->address }}</textarea>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">City</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        value="{{ $doctor->city }}" placeholder="City">
                                    @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="col-form-label">District</label>
                                    <input type="text" class="form-control" name="district" id="district"
                                        value="{{ $doctor->district }}" placeholder="District">
                                    @error('district')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Division</label>
                                    <input type="text" class="form-control" name="division" id="division"
                                        value="{{ $doctor->division }}" placeholder="Division">
                                    @error('division')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Country</label>
                                    <input type="text" class="form-control" name="country" id="country"
                                        value="{{ $doctor->country }}" placeholder="Country">
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Select Image:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image"
                                            id="exampleInputFile" onchange="readURLImage(this)">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <p></p>
                                    <label for="exampleInputFile">Old Image:</label>
                                    @if ($doctor->image)
                                        <img src="{{ asset($doctor->image) }}" class="showImage" alt=""
                                            width="100" height="100">
                                    @else
                                        <img src="{{ asset('Images/default-image.jpg') }}" class="showImage"
                                            alt="" width="100" height="100">
                                    @endif
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
@endsection
