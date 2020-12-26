@extends('layouts.app')

@section('content')
<div id="membership">
    <div class="cover">
        <div class="overlay gradient"></div>
        <img src="images/maxresdefault.jpg">
    </div>
    <div class="container content">
        <div class="header">
            <p class="text-center text-muted"
            data-aos="zoom-in"
            data-aos-delay="300">Become a Member</p>
            <h1
            data-aos="zoom-in"
            data-aos-delay="600">Membership plans</h1>
            <div class="text-center"
            data-aos="zoom-in"
            data-aos-delay="600">
                <img src="images/icons/general-icon/LINEIMG.png"
                    class="img-fluid  mb-4 sm-img">
            </div>
            <p
            data-aos="zoom-in"
            data-aos-delay="900">Everyone inspires to be wealthy <span class="number">.</span>While it is true that being financially abundant should be a birthright<span class="number">,</span> yet many of
                us<span class="number">,</span> still struggle for many<span class="number">.</span>To understand this economic phenomenon we at GPM have been researching this disparity
                since last
                <span class="number">10</span> years<span class="number">.</span>GPM is an acronym for Gain Passive Money working towards another economic model multiplying your
                money for you<span class="number">.</span></p>
        </div>
        <div class="member-ship-card row  justify-content-center">
            <div class="col-sm-6 col-lg-4 card-sm"
                    data-aos="fade-right"
                    data-aos-delay="1200">
                <div class="card card-shadow">
                    <div class="core-card callout top text-center">
                        <h3>Basic Membership</h3>
                    </div>
                    <div class="card-body">
                        <h1>&#x20b9; 1,000
                            <span>+ GST</span>
                        </h1>
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
                        <a href="/membership/basic"
                            class="btn btn-danger mb-3">Know More</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4"
                    data-aos="fade-left"
                    data-aos-delay="1200">
                <div class="card card-shadow">
                    <div class="core-card callout top text-center">
                        <h3>Core Membership</h3>
                    </div>
                    <div class="card-body">
                        <h1>&#x20b9; 10,000
                            <span>+ GST</span>
                        </h1>
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
                        <a href="/membership/core"
                            class="btn btn-danger mb-3">Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
