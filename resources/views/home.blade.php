@extends('layouts.app')

@section('content')
<div id="profile">
    <div class="hidden-lg">
        <div id="wrap">
            <div id="one">
            </div>
            <div id="two">
            </div>
        </div>
        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 text-light">
                        <div class="referal-code text-center mt-5">
                            <p class="mb-4">
                                <span class="d-block">UserID: @GPM{{$user->id}}</span>
                                <span class="d-block">Pancard: {{$user->pancard}}</span>
                            </p>
                            @if($user->membership === 'core' && $user->id !== 1 || true )
                            <button class="btn btn-yellow mb-2 w-75 p-2"
                                style="border-radius: 10px; box-shadow: none"
                                data-toggle="modal"
                                data-target="#refferalModal">{{$user->referral_code}}</button>
                            <h4>Your Referral Code</h4>
                            <span class="text-muted">Refer this code to your friends to get 25% of joining amount as referral bonus!</span>
                            @endif
                        </div>
                        <div class="action-buttons m-4">
                            <div class="container-fluid">
                                <div class="row mt-1">
                                    <div class="col-12 text-center mt-4">
                                        <a class="btn btn-yellow w-100"
                                            href="activities">Activities</a>
                                    </div>
                                    @if($user->membership === 'core')
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-yellow w-100"
                                            data-toggle="modal"
                                            data-target="#bankdetailsModal">Edit Bank Details</button>
                                    </div>
                                    @endif
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-yellow w-100"
                                            data-toggle="modal"
                                            data-target="#personaldetailsModal">Edit Personal Info</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-yellow w-100"
                                            data-toggle="modal"
                                            data-target="#changePasswordModal">Change password</button>
                                    </div>
                                    @if($user->membership === 'basic')
                                    <div class="col-12 text-center mt-4">
                                        <a class="btn btn-yellow w-100"
                                            href='https://www.payumoney.com/paybypayumoney/#/91D48EAAE578CFB5281E809132B49844'>Upgrade Membership</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="d-flex flex-row">
                            <div class=" profile-image mt-3">
                                <input type="file"
                                    id="profilefile"
                                    style="display:none"
                                    onchange="fileChangeEvent()"
                                    class="custom-file-input" />
                                <img src="https://fliteracy.gainpassivemoney.com/api/profile/pic/thumbnail/{{$user->profile_img_url}}"
                                    alt=""
                                    class="img-fluid image"
                                    onclick="saveProfile()">
                                @if($user->membership === 'core')
                                <img src="images/icons/general-icon/crown.svg"
                                    class="core-member"
                                    data-toggle="tooltip"
                                    title="You are a core member">
                                @endif
                            </div>
                            <div class="values mt-3 ml-3">
                                <h1>{{$user->name}}</h1>
                                <div class="d-flex mb-1 align-items-center">
                                    <div class="image-icons">
                                        <img src="images/icons/general-icon/cake.svg"
                                            class="icons">
                                    </div>
                                    <span class="value">
                                    {{date("d/m/Y", strtotime($user->dob))}}
                                    </span>
                                </div>
                                <div class="d-flex mb-1 align-items-center">
                                    <div class="image-icons">
                                        <img src="images/icons/general-icon/mail.svg"
                                            class="icons">
                                        @if($user->isVarified === '1')
                                        <img src="icons/general-icon/varified_mark.svg"
                                            class="verified">
                                        @endif
                                    </div>
                                    <span class="value">
                                        {{$user->email}}
                                    </span>
                                </div>
                                <div class="d-flex mb-1 align-items-center">
                                    <div class="image-icons">
                                        <img src="images/icons/general-icon/phone.svg"
                                            class="icons">
                                    </div>
                                    <span class="value">
                                        {{$user->contact}}
                                    </span>
                                </div>
                                <div class="d-flex mb-1 align-items-center">
                                    <div class="image-icons">
                                        <img src="images/icons/general-icon/location.svg"
                                            class="icons">
                                    </div>
                                    <span class="value">
                                        {{$user->city}}, {{$user->state}}.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-5">
                            @if($progress)
                            <div class="col-lg-12">
                                <div class="container-fluid">
                                    <div class="row">
                                        @php($x = 0)
                                        @foreach($progress as $p)
                                        @php($x++)
                                        <!-- p?.module_name.toLowerCase().replace(' ', '-') -->
                                        <div class="col-6">
                                            <div class="progress-row">
                                                <h5>Arena {{$x}}: <a href="https://fliteracy.gainpassivemoney.com/chapter/{{str_replace(' ', '-', strtolower($p['module_name']))}}" target="_blank">{{$p['module_name']}}</a></h5>
                                                <progress max="{{$p['chap_count']}}"
                                                    value="{{$user->isModuleCompleted === '0' ? $p['completed'] : $p['chap_count']}}"></progress>
                                                <div class="d-inline">
                                                    <img src="images/icons/general-icon/{{ $user->isModuleCompleted === '0' ? $p['state'] : 'finished'}}.svg"
                                                        height="20px"
                                                        width="20px">
                                                    @if($p['state'] === 'finished' || $user->isModuleCompleted === '1')
                                                    <small class="text-muted">You've successfully passed this arena.</small>
                                                    @endif
                                                    @if($p['state'] === 'ongoing' && $user->isModuleCompleted === '0')
                                                    <a href="https://fliteracy.gainpassivemoney.com"
                                                        target="_blank">
                                                        <small class="text-primary">
                                                            @if($user->chapter_id === 1)
                                                            <span>Start your journey</span>
                                                            @else
                                                            <span>Resume Arena</span>
                                                            @endif
                                                        </small></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-6 text-center">
                                            @if($user->membership === 'core' && $user->id !== 1)
                                            <div class="magenda-card">
                                                <span class="d-block count">{{$profile['invites']}}</span>
                                                <span>People Reffered by You</span>
                                            </div>
                                            @endif
                                            @if($user->membership === 'core' && $user->id === 1)
                                            <div class="magenda-card"
                                                style="opacity: 0.5">
                                                <span class="d-block count">0</span>
                                                <span>People Reffered by You</span>
                                            </div>
                                            @endif
                                            @if($user->membership === 'basic')
                                            <div class="magenda-card"
                                                data-toggle="tooltip"
                                                title="Please upgrade your membership to unlock this feature."
                                                style="opacity: 0.5">
                                                <span class="d-block count">0</span>
                                                <span>People Reffered by You</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-6 text-center">
                                            @if($user->membership === 'core')
                                            <div class="magenda-card">
                                                <span class="d-block count">&#x20b9; {{$profile['earning']}}/-</span>
                                                <span>Your Total Earnings</span>
                                            </div>
                                            @endif
                                            @if($user->membership === 'basic')
                                            <div class="magenda-card"
                                                data-toggle="tooltip"
                                                title="Please upgrade your membership to unlock this feature."
                                                style="opacity: 0.5">
                                                <span class="d-block count">&#x20b9; 0</span>
                                                <span>Your Total Earnings</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="visible-sm">
    <div class="profile-sm">
        <div class="profile-banner">
            <div class="overlay gradient"></div>
            <img class="img-fluid"
                src="images/maxresdefault.jpg">
        </div>
        <div class="container">
            <div class="row info-conatiner">
                <div class="col-4 profile-section">
                    <div class="profile-image">
                        <img src="https://fliteracy.gainpassivemoney.com/api/profile/pic/thumbnail/{{$user->profile_img_url}}"
                            alt=""
                            class="img-fluid image"
                            onclick="saveProfile()">
                        @if($user->membership === 'core')
                        <img src="images/icons/general-icon/crown.svg"
                            class="core-member"
                            tooltip="You are a core member">
                        @endif
                    </div>
                </div>
                <div class="col-8">
                    <div class="info">
                        <div class="values">
                            <h4>
                                {{$user->name}}</h4>
                            <div class="d-flex mb-1 align-items-center">
                                <div class="image-icons">
                                    <img src="images/icons/general-icon/cake.svg"
                                        class="icons">
                                </div>
                                <span class="value">
                                    {{$user->dob}}
                                </span>
                            </div>
                            <div class="d-flex mb-1 align-items-center">
                                <div class="image-icons">
                                    <img src="images/icons/general-icon/mail.svg"
                                        class="icons">
                                    @if($user->isVarified === '1')
                                    <img src="images/icons/general-icon/varified_mark.svg"
                                        class="verified">
                                    @endif
                                </div>
                                <span class="value">
                                    {{$user->email}}
                                </span>
                            </div>
                            <div class="d-flex mb-1 align-items-center">
                                <div class="image-icons">
                                    <img src="images/icons/general-icon/phone.svg"
                                        class="icons">
                                </div>
                                <span class="value number">
                                    {{$user->contact}}
                                </span>
                            </div>
                            <div class="d-flex mb-1 align-items-center">
                                <div class="image-icons">
                                    <img src="images/icons/general-icon/location.svg"
                                        class="icons">
                                </div>
                                <span class="value">
                                    {{$user->city}}, {{$user->state}}.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($progress)
            <div class="row justify-content-end mt-5">
                <div class="col-lg-9">
                    <div class="container-fluid">
                        <div class="row">
                            @php($x = 0)
                            @foreach($progress as $p)
                            @php($x++)
                            <div class="col-12">
                                <div class="progress-row">
                                    <h5>Arena {{$x}}: <a href="https://fliteracy.gainpassivemoney.com/chapter/{{str_replace(' ', '-', strtolower($p['module_name']))}}" target="_blank">{{$p['module_name']}}</a></h5>
                                    <progress max="{{$p['chap_count']}}"
                                        value="{{$user->isModuleCompleted === '0' ? $p['completed'] : $p['chap_count']}}"></progress>
                                    <div class="d-inline">
                                        <img src="images/icons/general-icon/{{ $user->isModuleCompleted === '0' ? $p['state'] : 'finished'}}.svg"
                                            height="20px"
                                            width="20px">
                                        @if($p['state'] === 'finished' || $user->isModuleCompleted === '1')
                                        <small class="text-muted">You've successfully passed this arena.</small>
                                        @endif()
                                        @if($p['state'] === 'ongoing' && $user->isModuleCompleted === '0')
                                        <a href="https://fliteracy.gainpassivemoney.com"
                                            target="_blank">
                                            <small class="text-muted">Resume Arena</small></a>
                                        @endif()

                                    </div>
                                </div>
                            </div>
                            @endforeach()
                            <div class="col-12 referal-code text-center">
                                <p class="mb-4">
                                    <span class="d-block">UserID: @GPM{{$user->id}}</span>
                                    <span class="d-block">Pancard: {{$user->pancard}}</span>
                                </p>
                                @if($user->membership === 'core')
                                <button class="btn btn-success mb-2"
                                      data-toggle="modal"
                                      data-target="#refferalModal">{{$user->referral_code}}</button>
                                <h3>Your Referral Code</h3>
                                <span>Refer this code to your friends to get 25% of joining amount as referral bonus!</span>
                                @endif()
                            </div>
                            <div class="col-12 text-center m-2">
                                @if($user->membership === 'core')
                                <div class="magenda-card">
                                    <span class="d-block count">{{$profile['invites']}}</span>
                                    <span>People Referred by You</span>
                                </div>
                                @endif()
                                @if($user->membership === 'basic')
                                <div class="magenda-card"
                                    tooltip="Please upgrade your membership to unlock this feature."
                                    style="opacity: 0.5">
                                    <span class="d-block count">0</span>
                                    <span>People Referred by You</span>
                                </div>
                                @endif
                            </div>
                            <div class="col-12 text-center m-2">
                                @if($user->membership === 'core')
                                <div class="magenda-card">
                                    <span class="d-block count">&#x20b9; {{$profile['earning']}}/-</span>
                                    <span>Your Total Earnings</span>
                                </div>
                                @endif
                                @if($user->membership === 'basic')
                                <div class="magenda-card"
                                    tooltip="Please upgrade your membership to unlock this feature."
                                    style="opacity: 0.5">
                                    <span class="d-block count">&#x20b9; 0</span>
                                    <span>Your Total Earnings</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="action-buttons">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-12 mb-3 text-center">
                            <button class="btn btn-success"
                                routerLink="/profile/activities">Activities</button>
                        </div>
                        @if($user->membership === 'core')
                        <div class="col-12 mb-3 text-center">
                            <button class="btn btn-success"
                            data-toggle="modal"
                            data-target="#bankdetailsModal">
                                Edit Bank Details</button>
                        </div>
                        @endif
                        <div class="col-12 mb-3 text-center">
                            <button class="btn btn-success"
                            data-toggle="modal"
                            data-target="#personaldetailsModal">Edit Personal Info</button>
                        </div>
                        <div class="col-12 mb-3 text-center">
                            <button class="btn btn-success"
                            data-toggle="modal"
                            data-target="#changePasswordModal">Change password</button>
                        </div>
                        @if($user->membership === 'basic')
                        <div class="col-12 mb-3 text-center">
                            <a class="btn btn-success"
                                href='https://www.payumoney.com/paybypayumoney/#/91D48EAAE578CFB5281E809132B49844'>Upgrade Membership</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div id="bankdetails">
    <div id="bankdetailsModal"
        class="modal fade"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <bank-details-modal api_key="{{Auth::user()->api_key}}"></bank-details-modal>
            </div>
        </div>
    </div>
</div>

<div id="personalInfoModal">
    <div id="personaldetailsModal"
        class="modal fade"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <personal-details-modal user="{{Auth::user()}}" api_key="{{Auth::user()->api_key}}"></personal-details-modal>
            </div>
        </div>
    </div>
</div>

<div id="changePassword">
    <div id="changePasswordModal"
        class="modal fade"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <change-password-modal api_key="{{Auth::user()->api_key}}"></change-password-modal>
            </div>
        </div>
    </div>
</div>

<div id="refferalModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-body">
                          <h4 style="margin:0">
                                Referral code
                                <button type="button"
                                    class="close pull-right"
                                    aria-label="Close"  data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </h4>
                        <p>Refer this code to your friends to get 25% referral bonus after they register as a core member.</p>
                        <form>
                              <div class="form-group">
                                    <input type="text"
                                    disabled
                                    id="inputText"
                                    value="{{$user->referral_code}}"
                                    class="form-control ">
                                    <i class="fa fa-copy" id="copyText"
                                    data-clipboard-text="Master the art of financial literacy and become a money magnet! Click on the link below to explore the new world of financial freedom - http://gainpassivemoney.com/register/{{$user->referral_code}}"></i>
                              </div>
                        </form>
                        <small>Note: Copy the above link to share it with your contacts</small>
                  </div>
            </div>
      </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
<script>
    $(document).ready(function () {
        var clipboard = new ClipboardJS('#copyText');
        clipboard.on('success', function(e) {
          $('#inputText').addClass("is-valid");
      });
        $('[data-toggle="tooltip"]').tooltip();
    });
    function saveProfile() {
          console.log("Not implemeneted yet");
    }
    function openReffralModal() {
          console.log("Not implemeneted yet");
    }
</script>
@endsection
