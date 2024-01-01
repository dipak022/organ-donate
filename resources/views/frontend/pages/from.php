<div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">First Name<span
                                            style="color: red">*</span></label>
                                        <input class="form-control valid" name="first_name" id="first_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your first name'" placeholder="Enter your first name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Last Name<span
                                            style="color: red">*</span></label>
                                        <input class="form-control valid" name="last_name" id="last_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your last name'" placeholder="Enter your last name" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Date Of Bith<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="date_of_bith" id="date_of_bith" type="date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter date of birth'" placeholder="Enter date of birth" required>
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Height<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="height" id="height" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter height'" placeholder="Enter height" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Weight<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="weight" id="weight" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter weight'" placeholder="Enter weight" required>
                                    </div>
                                </div>
                                <div class="col-12">
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
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Once my death has been confirmed and the death certification has been released by a physician, I hereby give permission to donate<span
                                            style="color: red">*</span></label>
                                        <select name="permission_to_donate" class="form-control" required>
                                            <option value="">Select permission</option>
                                            <option value="All my organs and tissues" {{ old('permission_to_donate') == 'All my organs and tissues' ? 'selected' : '' }}>All my organs and tissues
                                            </option>
                                            <option value="Specific organs and/or tissues" {{ old('permission_to_donate') == 'Specific organs and/or tissues' ? 'selected' : '' }}>Specific organs and/or tissues
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">I authorize you to use my organs/tissues for<span
                                            style="color: red">*</span></label>
                                        <select name="organs_tissues_for" class="form-control" required>
                                            <option value="">Select permission</option>
                                            <option value="Research" {{ old('organs_tissues_for') == 'Research' ? 'selected' : '' }}>Research
                                            </option>
                                            <option value="Transplant" {{ old('organs_tissues_for') == 'Transplant' ? 'selected' : '' }}>Transplant
                                            </option>
                                            <option value="Research & transplant" {{ old('organs_tissues_for') == 'Research & transplant' ? 'selected' : '' }}>Research & transplant
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Specific organs tissues name<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="specific_organs_tissues_name" id="specific_organs_tissues_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Specific organs tissues name'" placeholder="Enter Specific organs tissues name" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Anything you want to add (any notes, Specific organs and/or tissues, diseases, etc.)</label>
                                        <textarea class="form-control w-100" name="anything_description" id="anything_description" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter anything'" placeholder=" Enter anything"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Donor's signature<span
                                            style="color: red">*</span></label>
                                        <input class="form-control" name="donor_signature" id="donor_signature" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Donor's signature'" placeholder="Enter Donor's signature" required>
                                    </div>
                                </div>