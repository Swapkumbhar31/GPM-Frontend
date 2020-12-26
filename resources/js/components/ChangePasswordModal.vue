<template>
  <div class="modal-body" id="change-pass">
    <button type="button" class="close pull-right" aria-label="Close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
    </button>
    <form @submit="submitForm">
      <fieldset>
        <legend align="center">
          <strong>Change password</strong>
        </legend>
        <div class="row justify-content-center">
          <div class="col-10 col-lg-8 alert alert-danger mt-3 mb-3" v-if="isError">
            <span>{{isError}}</span>
          </div>
          <div class="col-10 col-lg-8 alert alert-success mt-3 mb-3" v-if="isSuccess">
            <span>{{isSuccess}}</span>
          </div>
          <div class="col-10 col-lg-8 form-group text-center mt-3">
            <label>Current Password</label>
            <input
              type="password"
              v-model="formValues.old"
              @change="checkErrors"
              class="form-control"
              placeholder="Enter your old password"
            >
            <div>
              <small v-if="error === 1">*Required field</small>
              <small v-if="error === 2">*Password must be at least 6 characters long.</small>
            </div>
          </div>
          <div class="col-10 col-lg-8 form-group text-center">
            <label>New Password</label>
            <input
              type="password"
              @change="checkErrors"
              class="form-control"
              v-model="formValues.new"
              placeholder="Enter your new password"
            >
            <div>
              <small v-if="error === 3">*Required field</small>
              <small v-if="error === 4">*Password must be at least 6 characters long.</small>
            </div>
          </div>
          <div class="col-10 col-lg-8 form-group text-center">
            <label>Confirm Password</label>
            <input
              type="password"
              @change="checkErrors"
              class="form-control"
              v-model="formValues.confirm"
              placeholder="Re-enter password"
            >
            <div>
              <small v-if="error === 5">*Required field</small>
              <small v-if="error === 6">*Password must be at least 6 characters long.</small>
            </div>
          </div>
        </div>
        <div class="row justify-content-center m-3">
          <button class="btn btn-danger text-uppercase">Save</button>
        </div>
        <!-- 
        <input type="submit" class="btn btn-white btn-outline text-center" value="Save">-->
      </fieldset>
    </form>
  </div>
</template>

<script>
export default {
  props: ["api_key"],
  data() {
    return {
      URL: "http://test.gainpassivemoney.com/api/",
      formValues: {
        old: "",
        new: "",
        confirm: ""
      },
      isError: "",
      isSuccess: "",
      error: 0
    };
  },
  mounted() {},
  methods: {
    checkErrors() {
      if (this.formValues.old === "") {
        this.error = 1;
      } else if (this.formValues.old.length < 6) {
        this.error = 2;
      } else if (this.formValues.new === "") {
        this.error = 3;
      } else if (this.formValues.new.length < 6) {
        this.error = 4;
      } else if (this.formValues.confirm === "") {
        this.error = 5;
      } else if (this.formValues.confirm.length < 6) {
        this.error = 6;
      } else if (this.formValues.old === this.formValues.new) {
        this.error = 0;
        this.isError = "Old password and new passsword cannot be same.";
      } else if (this.formValues.new !== this.formValues.confirm) {
        this.error = 0;
        this.isError = "New password does not match with confirm password.";
      } else {
        this.error = 0;
        this.isError = "";
        return true;
      }
      return false;
    },
    submitForm(e) {
      e.preventDefault();
      if (this.checkErrors()) {
        this.formValues.api_key = this.api_key;
        axios
          .post(this.URL + "profile/update/password", this.formValues)
          .then(response => {
            if (response.status === 200) {
              this.isError = response.data.msg;
            } else {
              this.isSuccess = response.data.msg;
            }
          });
      }
    }
  }
};
</script>
