<section class=" bg--secondary">
                <div class="container">
                    <div class="row justify-content-center no-gutters">
                        <div class="col-md-10 col-lg-8">
                            <div class="boxed boxed--border">
                                <form id="appointmentForm" class="text-left row mx-0">
                                    <?php
                                    if(!isset($_SESSION['id'])){ ?>

                                        <div class="col-md-6">
                                            <span>FullName:</span>
                                            <input type="text"  name="fullname" class="validate-required" />
                                        </div>
                                        <div class="col-md-6">
                                            <span>Phone:</span>
                                            <input type="tel" name="phone" class="validate-required" />
                                        </div>
                                        <div class="col-md-6">
                                            <span>Email Address:</span>
                                            <input type="email" name="email" class="validate-required validate-email" />
                                        </div>
                                        <div class="col-md-6">
                                            <span>Password:</span>
                                            <input type="password" name="password" class="validate-required" />
                                        </div>

                                        <input type="text" id="userNature" name="Registered" value = "false" hidden />

                                    <?php
                                    }
                                   ?>

                                    
                                   
                                    <div class="col-md-12">
                                        <span>Purpose Of Appointment:</span>
                                        <textarea rows="5" name="appointment_purpose" class="validate-required"></textarea>
                                    </div>
                                    <div class="col-md-12 text-center boxed">
                                        <h5>Section</h5>
                                    </div>
                                    <div class="col-md-3 col-6 text-center">
                                        <span class="block">Medical</span>
                                        <div class="input-radio">
                                            <input type="radio"  value="Medical" name="section" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 text-center">
                                        <span class="block">Finance</span>
                                        <div class="input-radio">
                                            <input type="radio" value="Finance" name="section" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 text-center">
                                        <span class="block">Adminstration</span>
                                        <div class="input-radio">
                                            <input type="radio" value="Adminstration" name="section" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 text-center">
                                        <span class="block">Records</span>
                                        <div class="input-radio">
                                            <input type="radio" value="Records" name="section" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center boxed">
                                        <h5>Time</h5>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="input-radio">
                                            <span>  11:00am</span>
                                            <input type="radio" name="time" value="11:00am" class="validate-required" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="input-radio">
                                            <span>12:30 pm</span>
                                            <input type="radio"  name="time" value="12:30pm" class="validate-required" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="input-radio">
                                            <span>1:30 pm</span>
                                            <input type="radio" name="time" value="1:30pm" class="validate-required" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <span>Appointment Date:</span>
                                        <input type="date" min="<?php echo date('Y-m-d'); ?>" name="appointment_date" class="validate-required" />
                                    </div>
                                    <div class="col-md-12 boxed">
                                        <input type="submit" class="btn btn--primary " value = "Book Appointment">
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>