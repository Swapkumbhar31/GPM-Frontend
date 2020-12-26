@extends('layouts.app')

@section('content')
<div id="activities">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 ">
                <div class="card sticky-top"
                    style="top: 60px;">
                    <img src="https://fliteracy.gainpassivemoney.com/api/profile/pic/thumbnail/{{Auth::user()->profile_img_url}}"
                        class="w-100">
                    <div class="card-body">
                        <div class="values">
                            <h3>{{Auth::user()->name}}</h3>
                            <div class="d-flex mb-1 align-items-center">
                                <div class="image-icons">
                                    <img src="images/icons/general-icon/cake.svg"
                                        class="icons">
                                </div>
                                <span class="value">
                                    {{date("d/m/Y", strtotime(Auth::user()->dob))}}
                                </span>
                            </div>
                            <div class="d-flex mb-1 align-items-center">
                                <div class="image-icons">
                                    <img src="images/icons/general-icon/mail.svg"
                                        class="icons">
                                    @if(intval(Auth::user()->isVarified) === 1)
                                    <img src="icons/general-icon/varified_mark.svg"
                                        class="verified">
                                    @endif
                                </div>
                                <span class="value">
                                    {{Auth::user()->email}}
                                </span>
                            </div>
                            <div class="d-flex mb-1 align-items-center">
                                <div class="image-icons">
                                    <img src="images/icons/general-icon/phone.svg"
                                        class="icons">
                                </div>
                                <span class="value">
                                    {{Auth::user()->contact}}
                                </span>
                            </div>
                            <div class="d-flex mb-1 align-items-center">
                                <div class="image-icons">
                                    <img src="images/icons/general-icon/location.svg"
                                        class="icons">
                                </div>
                                <span class="value">
                                    {{Auth::user()->city}}, {{Auth::user()->state}}.
                                </span>
                            </div>
                        </div>
                        <a href="/profile"
                            class="btn btn-success mt-3">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @foreach($activities as $activity)
                <div class="activity">
                    <div class="log">{{$activity->log}}</div>
                    <span>{{ date("d/m/Y", strtotime($activity->created_at))}}</span>
                    <hr>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
