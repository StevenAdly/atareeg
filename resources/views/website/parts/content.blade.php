


    <!-- ============ About Us ============= -->

    <section id="story" class="description_content">
        <div class="text-content container">
            <div class="col-md-6">
                <h1>About us</h1>
                <div class="fa fa-cutlery fa-2x"></div>
                <p class="desc-text">Restaurant is a place for simplicity. Good food, good beer, and good service. Simple is the name of the game, and we’re good at finding it in all the right places, even in your dining experience. We’re a small group from Denver, Colorado who make simple food possible. Come join us and see what simplicity tastes like.</p>
            </div>
            <div class="col-md-6">
                <div class="img-section">
                    <img src="{{URL::to('website/images/kabob.jpg')}}" width="250" height="220">
                    <img src="{{URL::to('website/images/limes.jpg')}}" width="250" height="220">
                    <div class="img-section-space"></div>
                    <img src="{{URL::to('website/images/radish.jpg')}}"  width="250" height="220">
                    <img src="{{URL::to('website/images/corn.jpg')}}"  width="250" height="220">
                </div>
            </div>
        </div>
    </section>


    <!-- ============ Pricing  ============= -->


    <section id ="pricing" class="description_content">
        <div class="pricing background_content">
            <h1><span>Affordable</span> pricing</h1>
        </div>
        <div class="text-content container">
            <div class="container">
                <div class="row">
                    <div id="w">
                        <?php $blocks=DB::table('blocks')->get(); ?>
                        <ul id="filter-list" class="clearfix">
                            @foreach($blocks as $block)
                            <li class="filter" data-filter="breakfast" style="margin: 0 25px 0 25px">{{$block->bl_name}}</li>
                            @endforeach
                        </ul><!-- @end #filter-list -->
                        <ul id="filter-list" class="clearfix">
                            @foreach($blocks as $block)
                            <li class="filter" data-filter="breakfast"> ريال/للزائر {{$block->bl_price}} </li>
                            @endforeach
                        </ul>

                    </div><!-- @end #w -->
                </div>
            </div>
        </div>
    </section>


    <!-- ============ Our Beer  ============= -->


    <section id ="beer" class="description_content">
        <div  class="beer background_content">
            <h1>Great <span>Place</span> to enjoy</h1>
        </div>
        <div class="text-content container">
            <div class="col-md-5">
                <div class="img-section">
                    <img src="{{URL::to('website/images/beer_spec.jpg')}}" width="100%">
                </div>
            </div>
            <br>
            <div class="col-md-6 col-md-offset-1">
                <h1>OUR BEER</h1>
                <div class="icon-beer fa-2x"></div>
                <p class="desc-text">Here at Restaurant we’re all about the love of beer. New and bold flavors enter our doors every week, and we can’t help but show them off. While we enjoy the classics, we’re always passionate about discovering something new, so stop by and experience our craft at its best.</p>
            </div>
        </div>
    </section>


    <!-- ============ Our Bread  ============= -->


    <section id="bread" class=" description_content">
        <div  class="bread background_content">
            <h1>Our Breakfast <span>Menu</span></h1>
        </div>
        <div class="text-content container">
            <div class="col-md-6">
                <h1>OUR BREAD</h1>
                <div class="icon-bread fa-2x"></div>
                <p class="desc-text">We love the smell of fresh baked bread. Each loaf is handmade at the crack of dawn, using only the simplest of ingredients to bring out smells and flavors that beckon the whole block. Stop by anytime and experience simplicity at its finest.</p>
            </div>
            <div class="col-md-6">
                <img src="{{URL::to('website/images/bread1.jpg')}}" width="260" alt="Bread">
                <img src="{{URL::to('website/images/bread1.jpg')}}" width="260" alt="Bread">
            </div>
        </div>
    </section>



    <!-- ============ Featured Dish  ============= -->

    <section id="featured" class="description_content">
        <div  class="featured background_content">
            <h1>Our Featured Dishes <span>Menu</span></h1>
        </div>
        <div class="text-content container">
            <div class="col-md-6">
                <h1>Have a look to our dishes!</h1>
                <div class="icon-hotdog fa-2x"></div>
                <p class="desc-text">Each food is handmade at the crack of dawn, using only the simplest of ingredients to bring out smells and flavors that beckon the whole block. Stop by anytime and experience simplicity at its finest.</p>
            </div>
            <div class="col-md-6">
                <ul class="image_box_story2">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{URL::to('website/images/slider1.jpg')}}"  alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="item">
                                <img src="{{URL::to('website/images/slider2.jpg')}}" alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="item">
                                <img src="{{URL::to('website/images/slider3.JPG')}}" alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </section>

    <!-- ============ Reservation  ============= -->

    <section  id="reservation"  class="description_content">
        <div class="featured background_content">
            <h1>Reserve a Table!</h1>
        </div>
        <div class="text-content container">
            <div class="inner contact">
                <!-- Form Area -->
                <div class="contact-form">
                    <!-- Form -->
                        <!-- Left Inputs -->
                        <div class="container">

                            <div class="row">
                                <div class="col-lg-offset-5 col-md-offset-4 col-lg-3 col-md-4 col-xs-12">
                                    <!-- Message -->
                                    <div class="right-text">
                                        <h2>Hours</h2><hr>
                                        @foreach($blocks as $block)
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                {{$block->bl_name}} : {{$block->bl_started_at}} - {{$block->bl_ended_at}}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Clear -->
                        <div class="clear"></div>
                </div><!-- End Contact Form Area -->
            </div><!-- End Inner -->
        </div>
    </section>

    <!-- ============ Social Section  ============= -->

    <section class="social_connect">
        <div class="text-content container">
            <div class="col-md-6">
                <span class="social_heading">FOLLOW</span>
                <ul class="social_icons">
                    <li><a class="color_animation" href="#"><i class="fab fa-facebook-f"></i></a></li>

                    <li><a class="icon-twitter color_animation" href="#" target="_blank"></a></li>
                    <li><a class="icon-github color_animation" href="#" target="_blank"></a></li>
                    <li><a class="icon-linkedin color_animation" href="#" target="_blank"></a></li>
                    <li><a class="icon-mail color_animation" href="#"></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <span class="social_heading">OR DIAL</span>
                <span class="social_info"><a class="color_animation" href="#">(941) 883-335-6524</a></span>
            </div>
        </div>
    </section>

    <!-- ============ Contact Section  ============= -->

    <section id="contact">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.664063989472!2d91.8316103150038!3d24.909437984030877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37505558dd0be6a1%3A0x65c7e47c94b6dc45!2sTechnext!5e0!3m2!1sen!2sbd!4v1444461079802" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

    </section>


