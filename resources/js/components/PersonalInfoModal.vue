<template>
  <div class="modal-body change-info">
    <button type="button" class="close pull-right" aria-label="Close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
    </button>
    <form @submit="submitForm">
      <fieldset>
        <legend align="center">
          <strong>Change Personal Info</strong>
        </legend>
        <div class="row justify-content-center">
          <div class="col-10 col-lg-8 alert alert-danger mt-3 mb-3" v-if="isError">
            <span>{{isError}}</span>
          </div>
          <div class="col-10 col-lg-8 alert alert-success mt-3 mb-3" v-if="isSuccess">
            <span>{{isSuccess}}</span>
          </div>
          <div class="col-10 col-lg-8 form-group text-center">
            <label>First Name</label>
            <input
              type="text"
              v-model="formValues.firstname"
              class="form-control"
              @change="checkErrors"
              placeholder="Enter your first name"
            >
            <div>
              <small v-if="error === 1">Required field</small>
              <small
                v-if="error === 2"
              >First name should not contain space, special character, number.</small>
            </div>
          </div>
          <div class="col-10 col-lg-8 form-group text-center">
            <label>Last Name</label>
            <input
              type="text"
              v-model="formValues.lastname"
              class="form-control"
              @change="checkErrors"
              placeholder="Enter your last name"
            >
            <div>
              <small v-if="error === 3">Required field</small>
              <small
                v-if="error === 4"
              >Last name should not contain space, special character, number.</small>
            </div>
          </div>
          <div class="col-10 col-lg-8 form-group text-center">
            <label>Date of birth</label>
            <input
              type="text"
              v-model="formValues.dob"
              @change="checkErrors"
              class="form-control"
              placeholder="Enter date of birth"
            >
            <div>
              <small v-if="error === 5">Required field</small>
              <small v-if="error === 6">Invalid Date format (YYYY/MM/DD)</small>
            </div>
          </div>
          <div class="col-10 col-lg-8 text-center form-group">
            <label>Phone</label>
            <input
              type="number"
              @change="checkErrors"
              v-model="formValues.contact"
              class="form-control"
              placeholder="Enter your phone number"
            >
            <small v-if="error === 7">
              *Required
              field
            </small>
          </div>
          <div class="col-10 col-lg-8 text-center form-group">
            <label>Address</label>
            <input
              type="text"
              @change="checkErrors"
              v-model="formValues.address"
              class="form-control"
              placeholder="Enter your address"
            >
            <small v-if="error === 8">*Required field</small>
          </div>
          <div class="col-10 col-lg-8 text-center form-group">
            <label>City</label>
            <input
              type="text"
              @change="checkErrors"
              v-model="formValues.city"
              class="form-control"
              placeholder="Enter your city"
            >
            <small v-if="error === 9">*Required field</small>
          </div>
          <div class="col-10 col-lg-8 text-center form-group">
            <label>State</label>
            <input
              type="text"
              @change="checkErrors"
              v-model="formValues.state"
              class="form-control"
              placeholder="Enter your state"
            >
            <small v-if="error === 10">*Required field</small>
          </div>
          <div class="col-10 col-lg-8 text-center m-3">
            <button class="btn btn-danger text-uppercase" type="submit">Save</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</template>

<script>
export default {
  props: ["api_key", "user"],
  data() {
    return {
      URL: "http://test.gainpassivemoney.com/api/",
      isError: "",
      isSuccess: "",
      error: 0,
      formValues: {
        email: "",
        contact: "",
        dob: "",
        firstname: "",
        lastname: "",
        address: "",
        city: "",
        state: ""
      }
    };
  },
  mounted() {
    var o = JSON.parse(this.user);
    this.formValues.email = o.email;
    this.formValues.contact = o.contact;
    this.formValues.dob = moment(o.dob).format("YYYY/MM/DD");
    this.formValues.firstname = o.name.split(" ")[0];
    this.formValues.lastname = o.name.split(" ")[1];
    this.formValues.address = o.address;
    this.formValues.city = o.city;
    this.formValues.state = o.state;
  },
  methods: {
    checkErrors() {
      var namere = /^[a-zA-Z]+$/;
      var dobre = /^[1-2]{1}[0-9]{3}\/[0-1]{1}[0-9]{1}\/[0-3]{1}[0-9]{1}$/;
      if (this.formValues.firstname === "") {
        this.error = 1;
        this.isError = "Please enter First name.";
      } else if (!namere.test(this.formValues.firstname)) {
        this.error = 2;
        this.isError = "Please enter valid First name.";
      } else if (this.formValues.lastname === "") {
        this.error = 3;
        this.isError = "Please enter last name.";
      } else if (!namere.test(this.formValues.lastname)) {
        this.error = 4;
        this.isError = "Please enter valid last name.";
      } else if (this.formValues.dob === "") {
        this.error = 5;
        this.isError = "Please enter date of birth.";
      } else if (!dobre.test(this.formValues.dob)) {
        this.error = 6;
        this.isError = "Please enter valid date of birth.";
      } else if (this.formValues.contact === "") {
        this.error = 7;
        this.isError = "Please enter phone number.";
      } else if (this.formValues.address === "") {
        this.error = 8;
        this.isError = "Please enter address.";
      } else if (this.formValues.city === "") {
        this.error = 9;
        this.isError = "Please enter city.";
      } else if (this.formValues.state === "") {
        this.error = 10;
        this.isError = "Please enter state.";
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
          .post(this.URL + "profile/update/contactInfo", this.formValues)
          .then(response => {
            if (response.status === 200) {
              this.isSuccess = "Record updated. Reloading page to update";
              setTimeout(() => {
                window.location.reload();
              }, 2000);
            } else {
              this.isError = "Error whihe updating.";
            }
          });
      }
    }
  }
};
</script>
