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
                        <h2>Core Membership</h2>
                    </div>
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
                        <h2 class="text-left">How will core membership help me?</h2>
                        <p>This is a top-level membership which comes at a premium rate of Rs. 10,000/- plus GST</p>
                        <p>Core members will be integral part of GPM community and will be involved in core committee of our
                            community.
                            Like basic members, core members will get complete step by step access to learn about financial literacy
                            through
                            our videos. More than that Core members can attain all future webinars and seminars of the company which
                            will
                            be conducted by experts from the industry. </p>
                        <p>GPM community will share up to 50% of revenues generated from core members among core members. If a core
                            member
                            recommends any person to become core member of our community, 25% of membership fees will be shared with
                            a
                            member who has referred a new member. Another 25% of that new joinee with be shared equally among all
                            existing
                            core members. The idea to share 50% of revenues with core members is to give them feeling on how it feels
                            and
                            encourage them to earn passive income.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection