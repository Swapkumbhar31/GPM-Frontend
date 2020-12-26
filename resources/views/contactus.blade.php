@extends('layouts.app')

@section('content')
<div id="contact-us">
    <div class="content container">
        <p class="text-center text-muted text-capitalize pt-3"
            data-aos="zoom-in"
            data-aos-delay="300">Start Your Journey Now</p>
        <h1 class="text-center"
            data-aos="zoom-in"
            data-aos-delay="600">Contact Us</h1>
        <div class="text-center"
            data-aos="zoom-in"
            data-aos-delay="600">
            <img src="images/icons/general-icon/LINEIMG.png"
                class="img-fluid  sm-img">
        </div>
        <div class="para">
            <div class="row p-lg-5 ">
                <div class="col-md-6 col-sm-12"
                    data-aos="fade-right"
                    data-aos-delay="900">
                    <div class="contact-info">
                        <div class="info text-center">
                            <h3>
                                <u>Get in touch with GPM Community</u>
                            </h3>
                            <p class="text-center">
                                We love connecting with our customers and fans. If you have any questions, concerns, or comments you'd
                                like to share with
                                us please do so by utilizing the methods below.
                            </p>
                            <p class="text-center">You can rest assured that we will keep all your correspondence with The GPM
                                Community private and confidential.
                                Thank you!
                            </p>
                        </div>
                        <div class="info text-center">
                            <span class="key">Email:</span>
                            <span class="value">
                                <!-- customerservice@richdad.com -->
                                Info<span class="number">@</span>yoovaventures.com
                            </span>
                        </div>
                        <div class="info text-center">
                            <span class="key">Contact: </span>
                            <span class="value">
                                <!-- customerservice@richdad.com -->
                                <span class="number">+91 97694 21428</span>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3 mb-4">
                        <a href="https://www.facebook.com/gainpassivemoney"
                            class="m-2"
                            target="_blank">
                            <div id="fb-icon"
                                class="float-right">
                            </div>
                        </a>
                        <a href="https://www.linkedin.com/company/gain-passive-money"
                            class="m-2"
                            target="_blank">
                            <div id="linkdin-icon">
                            </div>
                        </a>
                    </div>

                    <div class="visible-sm">
                        <div class="text-center">
                            <img src="images/icons/general-icon/LINEIMG.png"
                                class="img-fluid  sm-img">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 contact-form"
                    style="margin-bottom: 20px;"
                    data-aos="fade-left"
                    data-aos-delay="900">
                    <div class="form-section">
                        <contact-form-two></contact-form-two>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<!-- Your customer chat code -->
<div class="fb-customerchat"
    attribution=setup_tool
    page_id="1965659610194536"
    theme_color="#6699cc">
</div>
@endsection
