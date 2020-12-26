@extends('layouts.app')

@section('content')
<div id="membership-type"
    class="mt-5">
    <div class="content  flex-center p-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 core mb-4" 
                    data-aos="fade-right"
                    data-aos-delay="300">
                <div class="card">
                    <div class="core-card callout top text-center">
                        <h2>Basic Membership</h2>
                    </div>
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
                        <div class="text-center">
                            <a class="btn btn-danger btn-lg" href="/register">Buy Membership</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mebership-content my-auto" data-aos="zoom-in"
            data-aos-delay="500">
                <div class="card callout right text-justify">
                    <div class="card-body">
                        <h2 class="text-left">How will basic membership help me?</h2>
                        <p>This is a basic membership which comes for a minimal amount of Rs 1000/- plus GST.</p>
                        <p>Basic Members will get complete step by step access to learn about financial literacy through our
                            videos. Members
                            have to clear all 25 chapters one by one to complete our course on financial literacy. </p>
                        <p>Member can achieve financial abundance by following practices mentioned by us. They can anytime upgrade
                            themselves
                            to core membership.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection