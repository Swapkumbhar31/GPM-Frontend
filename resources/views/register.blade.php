@extends('layouts.app')

@section('content')
<div id="register-information">
    <h2 class="text-center">MEMBER INFORMATION</h2>
    <div class="text-center">
        <img src="{{asset('images/icons/general-icon/LINEIMG.png')}}"
            class="img-fluid pt-2 sm-img">
    </div>
    <register-information-form email="harmony98@example.com"
        type="core"
        code="{{$code}}"
        api_key="{{Auth::user()->api_key}}"></register-information-form>

</div>
@endsection
