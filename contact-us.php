<?php include ('header.php'); ?>
    <div class="page-wrapper">
        <!-- begin of form section -->
        <section class="section">
            <div class="container">
                <header class="text-center">
                    <h1>Contact Us</h1>
                    <h2>Get in touch</h2>
                </header>
                <form name="contact_form">
                    <header class="text-center">
                        <h3 class="msg" id="mydiv"></h3>
                    </header>
                    <div class="form-field">
                        <input class="commonField" id="yourname" name="name" type="text" required>
                        <label class="commonLabel">Your Name</label>
                    </div>
                    <div class="form-field">
                        <input class="commonField" type="tel" name="tel" id="tel" required>
                        <label class="commonLabel">Telehone Number</label>
                    </div>
                    <div class="form-field">
                        <input class="commonField" type="email" id="email" required>
                        <label class="commonLabel">Email Address</label>
                    </div>
                    <div class="form-field">
                        <input class="commonField" type="textarea" id="textarea" required>
                        <label class="commonLabel">Reason</label>
                    </div>
                    <div class="submit">
                        <button class="submit-btn" type="submit" name="submit">Send</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- end of form section -->

        <!-- Begin of Skype section -->
        <section class="section section-grey text-center">
            <header>
                <h5 class="seperator-bottom">GOT A QUESTION? TALK WITH US DIRECT.</h5>
                <h2>Skype <i class="fa fa-skype" aria-hidden="true"></i></h2>
            </header>
        </section>
        <!-- end of Skype Section -->

        <!-- Begin Map Section -->
        <section>
            <div class="map contact-details">
                <span>
            <header class="text-center">
               <h5 class="seperator-bottom">Store</h5>
                  2812 Simpson Avenue<br>
                  Pennsylvania<br>
                  York, 17401      
            </header>
            <a style="margin-top:30px;" target="_blank" href="https://www.google.co.uk/maps/place/Middlesex+University+London/@51.5893495,-0.2304353,17.69z/data=!3m1!4b1!4m5!3m4!1s0x4876108b08ac8657:0xc6241b957359e27d!8m2!3d51.5893495!4d-0.2282466?hl=en" class="submit-btn btn--alt">Get Directions</a>
         </span>
            </div>

            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d619.7115559702012!2d-0.22871102218443404!3d51.58938166232852!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc6241b957359e27d!2sMiddlesex+University+London!5e0!3m2!1sen!2suk!4v1480172839865" width="1000" height="910" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </section>
        <!-- end of Map Section -->
    </div>
<?php include ('footer.php'); ?>