@extends('layouts.app')

@section('content')
<div id="register">
    <div class="container">
        <div class="header">
            <h1 class="pt-4"
            data-aos="zoom-in"
            data-aos-delay="300">Choose your plan</h1>
            <img src="{{asset('icons/general-icon/LINEIMG.png')}}"
                class="img-fluid  mb-4 sm-img"
            data-aos="zoom-in"
            data-aos-delay="300">
            <div class="row">
                <div class="col mt-2" 
                    data-aos="fade-right"
                    data-aos-delay="400">
                    <div class="card card-shadow p-3">
                        <h2>Basic Membership</h2>
                        <div class="card-body">
                            <h3 class="text-center">&#x20b9; 1,000
                                <span class="gst">+ GST</span>
                            </h3>
                            <div class="features">
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Life time Membership
                                </span>
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Access to Tutorials
                                </span>
                                <span class="feature disabled">
                                    <i class="fa fa-check"></i>
                                    Free Access to webinars
                                </span>
                                <span class="feature disabled">
                                    <i class="fa fa-check"></i>
                                    Free access to Seminars
                                </span>
                                <span class="feature disabled">
                                    <i class="fa fa-check"></i>
                                    Passive Income Opportunity
                                </span>
                                <span class="feature disabled">
                                    <i class="fa fa-check"></i>
                                    Share in revenue
                                </span>
                                <span class="feature disabled">
                                    <i class="fa fa-check"></i>
                                    Regular Trainings
                                </span>
                            </div>
                        </div>
                        <div class='pm-button'>
                            <a href='https://www.payumoney.com/paybypayumoney/#/1ACF2575246845B84FB51D94305DE3C6'>
                                <img src='https://www.payumoney.com/media/images/payby_payumoney/new_buttons/21.png' /></a></div>
                    </div>
                </div>
                <div class="col mt-2" 
                    data-aos="fade-left"
                    data-aos-delay="400">
                    <div class="card card-shadow p-3">
                        <h2>Core Membership</h2>
                        <div class="card-body">
                            <h3 class="text-center">&#x20b9; 10,000
                                <span class="gst">+ GST</span>
                            </h3>
                            <div class="features">
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Life time Membership
                                </span>
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Access to Tutorials
                                </span>
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Free Access to webinars
                                </span>
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Free access to Seminars
                                </span>
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Passive Income Opportunity
                                </span>
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Share in revenue
                                </span>
                                <span class="feature">
                                    <i class="fa fa-check"></i>
                                    Regular Trainings
                                </span>
                            </div>
                        </div>
                        <div class='pm-button'><a href='https://www.payumoney.com/paybypayumoney/#/B09C716FED4F3C5FE6AE3B12614478D0'><img src='https://www.payumoney.com/media/images/payby_payumoney/new_buttons/21.png' /></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection