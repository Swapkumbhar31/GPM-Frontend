<template>
  <section class="contact-form">
    <form @submit="submitForm">
      <div class="row">
        <div class="col-12 alert alert-danger" v-if="isError">
          <div>{{isError}}</div>
        </div>
        <div class="col-12 alert alert-success" v-if="isSuccess">
          <div>{{isSuccess}}</div>
        </div>
        <div class="col-md-6 col-sm-10 form-group">
          <input
            type="text"
            v-model="formValues.name"
            @change="checkErrors"
            class="form-control"
            placeholder="Name"
            id="user"
            required
          >
        </div>
        <div class="col-md-6 col-sm-10 form-group">
          <input
            type="email"
            v-model="formValues.email"
            @change="checkErrors"
            class="form-control"
            placeholder="Email"
            id="email"
            required
          >
        </div>
        <div class="col-md-12 col-sm-10 form-group">
          <textarea
            class="form-control"
            v-model="formValues.message"
            placeholder="Message"
            rows="5"
            @change="checkErrors"
            id="comment"
            required
          ></textarea>
        </div>
        <div class="col-12 text-center">
          <button class="btn btn-warning btn-lg text-uppercase mt-3 mb-3">Send Message</button>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <a href="https://www.facebook.com/gainpassivemoney" target="_blank">
            <div id="fb-icon" class="float-right"></div>
          </a>
        </div>
        <div class="col-6 linkdin">
          <a href="https://www.linkedin.com/company/gain-passive-money" target="_blank">
            <div id="linkdin-icon"></div>
          </a>
        </div>
      </div>
    </form>
  </section>
</template>

<script>
import axios from "axios";
export default {
  name: "contact-form",
  components: {},
  props: [],
  data() {
    return {
      isError: "",
      isSuccess: "",
      URL: "http://test.gainpassivemoney.com/api/",
      formValues: {
        name: "",
        email: "",
        message: ""
      }
    };
  },
  computed: {},
  mounted() {},
  methods: {
    checkErrors() {
      return true;
    },
    submitForm(e) {
      e.preventDefault();
      if (this.checkErrors()) {
        axios
          .post(this.URL + "contact-us/mail", this.formValues)
          .then(response => {
            if (+response.data.status === 0) {
              this.isError = "Error Occured";
            } else if (+response.data.status === 200) {
              this.isSuccess = "Mail Sent Successfully";
              this.formValues = {
                name: "",
                email: "",
                message: ""
              };
            }
            setTimeout(() => {
              this.isError = "";
              this.isSuccess = "";
            }, 3000);
          });
      }
    }
  }
};
</script>
