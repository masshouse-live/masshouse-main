@extends('layouts.app')

@section('content')
    <!--contact-landing section-->
    <section class="contact-landing">
        <h2>GET IN TOUCH</h2>
        <!--contact form-->
        <div class="contact-form">
            <form action="{{ route('send_message') }}" method="POST" id="contact-form">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                <div class="row">
                    <!-- first name field -->
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">
                        <input type="text" id="firstname" class="form-control grey" placeholder="FIRST NAME"
                            autocomplete="off" required="required" name="firstname">
                    </div>
                    <!-- second name field -->
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">
                        <input type="text" id="secondname" class="form-control grey" placeholder="SECOND NAME"
                            autocomplete="off" required="required" name="secondname">
                    </div>
                    <!-- email field -->

                </div>

                <div class="row">
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">

                        <input type="email" id="email" class="form-control grey" placeholder="EMAIL ADDRESS"
                            autocomplete="off" required="required" name="email">
                    </div>
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">

                        <input type="tel"id="phone" class="form-control grey" placeholder="PHONE NUMBER"
                            autocomplete="off" required="required" name="phone">
                    </div>
                </div>
                <div class="row">
                    <!-- phone field -->
                    <!-- type of enquiry field -->
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">

                        <select name="category" class='form-select'>
                            <option>TYPE OF ENQUIRY</option>
                            <option>New Business Opportunity</option>
                            <option>Career Enquiry</option>
                            <option>Help</option>
                        </select>

                    </div>
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">

                        <input type="text" name="subject" id="subject" class="form-control grey"
                            placeholder="Message Subject" autocomplete="off" required="required" name="subject">
                    </div>

                </div>


                <!-- message field -->
                <div class="form-outline mb-4">

                    <textarea type="text" id="message" class="form-control grey message-area" placeholder="MESSAGE" required="required"
                        name="message"></textarea>
                </div>
                <!--checkbox-->
                <div class="contact-agreement">
                    <input class="form-check-input rounded-0" required type="checkbox" id="exampleCheckbox">
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
    @include('partials.partners', ['color' => 'black', 'partners' => $sponsors])
@endsection
