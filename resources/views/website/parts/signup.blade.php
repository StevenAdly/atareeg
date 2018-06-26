<div class="container">
    <div class="row">


        <div class="col-md-12">
            <div class="inner contact">
                <!-- Form Area -->
                <div class="contact-form" id="signin">
                    <!-- Login Form -->
                    <form method="post" action="{{url('/login/client')}}">
                    {{ csrf_field() }}
                    <!-- Left Inputs -->
                        <div class="col-md-6 ">
                            <lable style="color:#4F9E6B"><b>Have an account ? <small>Login Now . . .</small></b></lable><br><br>
                            <!-- Email -->
                            <input type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                            <!-- password -->
                            <input type="password" name="password" id="password" required="required" class="form" placeholder="password" />
                            <!-- Send Button -->
                            <button type="submit" id="submit" name="submit" class="form-btn">Login</button>
                            <!-- End Bottom Submit -->
                            <!-- Clear -->
                            <div class="clear"></div>
                        </div><!-- End Left Inputs -->
                    </form>

                    <!-- Register Form -->
                    <form method="post" action="{{url('/register/client')}}">
                    {{ csrf_field() }}
                    <!-- Right Inputs -->
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <lable style="color:#970215"><b>New client ? <small>Create Free Acccount Now . . .</small></b></lable><br><br>
                            </div>
                            <div class="col-md-6">
                                <!-- name -->
                                <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                            </div>
                            <div class="col-md-6">
                                <!-- Email -->
                                <input type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                            </div>
                            <div class="col-md-6">
                                <!-- password -->
                                <input type="password" name="password" id="password" required="required" class="form" placeholder="Password" />
                            </div>
                            <div class="col-md-6">
                                <!-- password confirmation -->
                                <input type="password" name="c_password" id="password" required="required" class="form" placeholder="Password Confirmation" />
                            </div>
                            <div class="col-md-6">
                                <!-- phone -->
                                <input type="number" name="phone1" id="phone" required="required" class="form" placeholder="Phone Number" />
                            </div>
                            <div class="col-md-6">
                                <!-- phone -->
                                <input type="number" name="phone2" id="phone" required="required" class="form" placeholder="Another Phone Number" />
                            </div>
                            <div class="col-md-6">
                                <!-- Send Button -->
                                <button type="submit" id="submit" name="submit" class="form-btn btn-danger">Register Now</button>
                                <!-- End Bottom Submit -->
                            </div>
                            <!-- Clear -->
                            <div class="clear"></div>
                        </div><!-- End Right Inputs -->
                        <!-- Bottom Submit -->
                    </form>
                </div><!-- End Contact Form Area -->
            </div><!-- End Inner -->
        </div>
    </div>
</div>


<br><br><br>

