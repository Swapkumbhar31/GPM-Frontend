<template>
  <div class="container-fluid card-sm">
    <div class="row justify-content-center" v-if="currentStep === 1">
      <div class="col-md-6 col-sm-12 card pb-4">
        <form @submit="mailValidation">
          <fieldset>
            <legend align="center">
              <strong>Having trouble signing in?</strong>
            </legend>
            <div class="row justify-content-center card-inner-content">
              <div class="col-md-9 col-sm-11 text-center">
                <div class="alert alert-danger disp-error" v-if="isError">{{ isError }}</div>
              </div>
              <div class="col-md-9 col-sm-11 text-center form-group">
                <label class="m-3">Please Enter Your Registered Email Address</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  v-model="email"
                  required
                  placeholder="Enter your email"
                  @change="checkErrors"
                >
                <small v-if="error == 1">*Required field</small>
              </div>
              <div class="col-md-9 col-sm-11 text-center m-4">
                <input type="submit" class="btn btn-danger text-uppercase" value="Continue">
              </div>
              <small class="text-muted m-3">We will send you an OTP on your registered mail id.</small>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="row justify-content-center" v-if="currentStep === 2">
      <div class="col-md-6 col-sm-12 card pb-4">
        <fieldset>
          <form @submit="otpValidation">
            <legend align="center">
              <strong>Recover your password</strong>
            </legend>
            <div class="row justify-content-center">
              <div class="col-9 text-center">
                <div class="alert alert-danger disp-error" v-if="isError">{{ isError }}</div>
              </div>
              <div id="divOuter" class="justify-content-center text-center">
                <label class="m-3">Enter OTP we've sent you</label>
                <input
                  id="partitioned"
                  autocomplete="off"
                  v-model="otp"
                  class="form-control"
                  type="text"
                  maxlength="6"
                  @change="checkErrors"
                  required
                >
                <small v-if="error == 2">*Required field</small>
              </div>
              <div class="col-9 text-center m-5">
                <button class="btn btn-danger text-uppercase" type="submit">Continue</button>
              </div>
              <small class="text-muted m-3">
                Didn't recieved OTP?
                <span
                  class="btn-link"
                  @click="currentStep = 1"
                  style="cursor:pointer;"
                >click here.</span>
              </small>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
    <div class="row justify-content-center" v-if="currentStep === 3">
      <div class="col-md-6 col-sm-12 card pb-4">
        <form @submit="passwordValidation">
          <fieldset>
            <legend align="center">
              <strong>Reset Your Password</strong>
            </legend>
            <div class="row justify-content-center">
              <div class="col-9 text-center">
                <div class="alert alert-danger disp-error" v-if="isError">{{ isError }}</div>
              </div>
              <div class="col-9 text-center mb-3">
                <label class="mb-3">Password</label>
                <input
                  type="password"
                  class="form-control"
                  placeholder="Enter your new password"
                  @change="checkErrors"
                  v-model="password"
                  required
                >
                <div class="float-left">
                  <small v-if="error == 3">Required field</small>
                  <small v-if="error == 4">Password must be at least 6 characters long.</small>
                </div>
              </div>
              <div class="col-9 text-center mt-2">
                <label class="mb-3">Confirm Password</label>
                <input
                  type="password"
                  class="form-control"
                  placeholder="Confirm your new password"
                  @change="checkErrors"
                  v-model="cpassword"
                  required
                >
                <div class="float-left">
                  <small v-if="error == 5">Required field</small>
                  <small v-if="error == 6">Password not match</small>
                </div>
              </div>
              <div class="col-9 text-center m-5">
                <button class="btn btn-danger text-uppercase" type="submit">Continue</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="row justify-content-center" v-if="currentStep === 4">
      <div class="col-md-6 col-sm-12 card pb-4">
        <fieldset>
          <legend align="center">
            <strong>Successful</strong>
          </legend>
          <div class="row text-center success-modal">
            <div class="col-12 m-auto">
              <img src="icons/general-icon/Tick.svg" class="tick-image">
            </div>
            <div class="col-12">
              <h6 class="text-muted m-3">Your password has been changed successfully</h6>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      URL: "http://test.gainpassivemoney.com/api/",
      isError: "",
      currentStep: 1,
      email: "",
      cpassword: "",
      password: "",
      otp: "",
      error: ""
    };
  },
  mounted() {},
  methods: {
    checkErrors() {},
    mailValidation(e) {
      e.preventDefault();
      const v = {
        email: this.email
      };
      axios.post(this.URL + "forgot-password/mail", v).then(response => {
        if (response.data.status === "0") {
          this.isError = response.data.msg;
        } else {
          this.currentStep = 2;
        }
      });
    },
    otpValidation(e) {
      e.preventDefault();
      if (this.otp.length < 6) {
        this.error = 2;
        return;
      }
      const v = {
        email: this.email,
        otp: this.otp
      };
      axios.post(this.URL + "forgot-password/verify", v).then(response => {
        if (response.data.status !== "200") {
          this.isError = response.data.msg;
        } else {
          this.currentStep = 3;
        }
      });
    },
    passwordValidation(e) {
      e.preventDefault();
      if (this.password.length < 6) {
        this.error = 4;
        return;
      }
      if (this.password !== this.cpassword) {
        this.error = 6;
        return;
      } else {
        this.error = 0;
      }
      const v = {
        email: this.email,
        password: this.password,
        cpassword: this.cpassword
      };
      axios
        .post(this.URL + "forgot-password/set-password", v)
        .then(response => {
          if (response.data.status === "100" || response.data.status === "0") {
            this.isError = response.data.msg;
          } else {
            this.currentStep = 4;
          }
        });
    }
  }
};
</script>
