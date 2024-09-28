@extends('layouts.app')

@section('content')
    <!--contact-landing section-->
    <section class="contact-landing">
        <h2>GET IN TOUCH</h2>
        <!--contact form-->
        <div class="contact-form">
            <form action="" method="POST" id="contact-form">
                <input type="hidden" name="access_key" value="fd94dccf-5968-4655-bd4e-5f7c2a9128c7">
                <div class="row">
                    <!-- first name field -->
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">
                        <input type="text" id="firstname" class="form-control grey" placeholder="FIRST NAME"
                            autocomplete="off" required="required" name="name">
                    </div>
                    <!-- second name field -->
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">
                        <input type="text" id="secondname" class="form-control grey" placeholder="SECOND NAME"
                            autocomplete="off" required="required" name="name">
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">

                        <input type="email" id="email" class="form-control grey" placeholder="EMAIL ADDRESS"
                            autocomplete="off" required="required" name="email">
                    </div>
                </div>

                <div class="row">
                    <!-- phone field -->
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">

                        <input type="tel" id="phone" class="form-control grey" placeholder="PHONE NUMBER"
                            autocomplete="off" required="required" name="phone">
                    </div>
                    <!-- type of enquiry field -->
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">

                        <select class='form-select'>
                            <option>TYPE OF ENQUIRY</option>
                            <option>New Business Opportunity</option>
                            <option>Career Enquiry</option>
                            <option>Help</option>
                        </select>

                    </div>

                </div>


                <!-- message field -->
                <div class="form-outline mb-4">

                    <textarea type="text" id="message" class="form-control grey message-area" placeholder="MESSAGE" required="required"
                        name="message"></textarea>
                </div>
                <!--checkbox-->
                <div class="contact-agreement">
                    <input class="form-check-input rounded-0" type="checkbox" id="exampleCheckbox">
                    <label class="form-check-label" for="exampleCheckbox">
                        I have read and agree to Masshouse’s privacy policy <br>
                        & i would like to receive email updates and news from Masshouse
                    </label>
                </div>
                <!-- send button -->
                <div class="mt-4 pt-2 d-flex">
                    <button type="submit" value="submit" class="button2 send-btn" name="send">SUBMIT</button>
                    <!-- <input type="submit" value="Submit" class="send-btn btn-success py-2 px-3 border-0 rounded-2" name="send"> -->
                </div>
            </form>

        </div>
    </section>


    <!--location section-->
    <section class="location">
        <div class="row lctn-wrapper">
            <div class="lctn-left col-lg-6 col-md-6 col-sm-12">
                <img src="images/serene.PNG" alt="image">
            </div>
            <div class="lctn-right col-lg-6 col-md-6 col-sm-12">
                <div class="row lctnr-wrapper">
                    <div class="lctnr-left col-lg-6 col-md-6 col-sm-12">
                        <p>PHYSICAL <br> ADDRESS</p>
                        <p>NGONG RACE <br> COURSE</p>
                        <p>NAIROBI, <br> KENYA</p>
                        <br><br>
                        <a href="">ACCESS IN MAPS</a>
                    </div>
                    <div class="lctnr-right col-lg-6 col-md-6 col-sm-12">
                        <p>PHONE <br> +254 712 234 567</p>
                        <p>General Enquiries <br> www.masshouse.live</p>
                        <p>Media & PR <br> @masshouse_live</p>
                        <p>CORPORATE ENQUIRIES <br> info@masshouse.live</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--partners-n-sponsors section-->
    <section class="partners-n-sponsors news">
        <div style="padding: 30px 0;padding-bottom: 10px;background-color: #000;">
            <h3 class="text-white">PARTNERS & SPONSORS</h3>
        </div>
        <br><br>
        <div class="logos">
            <div class="logos-slide">
                <img src="images/sponsors/eabl-black.png" />
                <img src="images/sponsors/donjulio-black.png" />
                <img src="images/sponsors/tanqueray-black.png" />
                <img src="images/sponsors/kbl-black.png" />
                <img src="images/sponsors/singleton-black.png" />
                <img src="images/sponsors/safaricom-black.png" />

            </div>
        </div>


        <script>
            var copy = document.querySelector(".logos-slide").cloneNode(true);
            document.querySelector(".logos").appendChild(copy);
        </script> <!--infinite loop script-->
    </section>
@endsection
