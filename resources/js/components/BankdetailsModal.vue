<template>
  <div class="modal-body change-bank">
    <button type="button" class="close pull-right" aria-label="Close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
    </button>
    <form @submit="submitForm">
      <fieldset>
        <legend align="center">
          <strong>Update Bank Details</strong>
        </legend>
        <div class="row justify-content-center">
          <div class="col-10 col-lg-8 alert alert-danger mt-3 mb-3" v-if="isError">
            <span>{{isError}}</span>
          </div>
          <div class="col-10 col-lg-8 alert alert-success mt-3 mb-3" v-if="isSuccess">
            <span>{{isSuccess}}</span>
          </div>
          <div class="col-lg-8 col-10 text-center form-group mt-3">
            <label>Your Bank name*</label>
            <input
              type="bank_name"
              v-model="formValues.bank_name"
              class="form-control"
              @change="checkErrors"
              placeholder="Enter your bank name"
            >
            <small v-if="error === 1">Required field</small>
          </div>
          <div class="col-lg-8 col-10 text-center form-group">
            <label>Bank Account Number*</label>
            <input
              type="text"
              v-model="formValues.account_number"
              class="form-control"
              @change="checkErrors"
              placeholder="Enter your account number"
            >
            <small v-if="error === 2">Required field</small>
          </div>
          <div class="col-lg-8 col-10 text-center form-group">
            <label>Enter IFSC*</label>
            <input
              type="text"
              v-model="formValues.ifsc"
              class="form-control"
              @change="checkErrors"
              placeholder="Enter your IFSC"
            >
            <small v-if="error === 3">Required field</small>
          </div>
          <div class="col-lg-8 col-10 text-center form-group">
            <label>Name as per Passbook*</label>
            <input
              type="text"
              v-model="formValues.name"
              class="form-control"
              @change="checkErrors"
              placeholder="Enter your Name as per Passbook"
            >
            <small v-if="error === 4">Required field</small>
          </div>
          <div class="col-lg-8 col-10 text-center m-3">
            <button class="btn btn-danger text-uppercase">Save</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["api_key"],
  data() {
    return {
      URL: "http://test.gainpassivemoney.com/api/",
      formValues: {
        bank_name: "",
        name: "",
        account_number: "",
        ifsc: ""
      },
      isError: "",
      isSuccess: "",
      error: 0
    };
  },
  mounted() {
    // this.checkErrors();
    const value = { api_key: this.api_key };
    axios.post(this.URL + "profile/get/bankdetails", value).then(response => {
      if (response.data && response.data.id) {
        this.formValues = response.data;
      } else {
        this.isError = "No record found";
      }
    });
  },
  methods: {
    checkErrors() {
      if (this.formValues.bank_name === "") {
        this.error = 1;
        this.isError = "Please enter bank name.";
      } else if (this.formValues.account_number === "") {
        this.error = 2;
        this.isError = "Please enter account number.";
      } else if (this.formValues.ifsc === "") {
        this.error = 3;
        this.isError = "Please enter IFSC.";
      } else if (this.formValues.name === "") {
        this.error = 4;
        this.isError = "Please enter Name as per passbook.";
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
          .post(this.URL + "profile/update/bankdetails", this.formValues)
          .then(response => {
            if (response.status === 200) {
              this.isSuccess = "Record updated";
            } else {
              this.isError = "Error whihe updating.";
            }
          });
      }
    }
  }
};
</script>
