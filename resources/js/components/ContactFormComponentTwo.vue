<template>
  <section class="contact-form">
    <form @submit="submitForm">
      <div class="col-12 alert alert-danger" v-if="isError">
        <div>{{isError}}</div>
      </div>
      <div class="col-12 alert alert-success" v-if="isSuccess">
        <div>{{isSuccess}}</div>
      </div>
      <div class="form-group">
        <label>Name:</label>
        <input
          type="text"
          class="form-control"
          v-model="formValues.name"
          @change="checkErrors"
          placeholder="Enter your Name"
          required
        >
      </div>
      <div class="form-group">
        <div class="form-group">
          <label>Email:</label>
          <input
            name="email"
            v-model="formValues.email"
            @change="checkErrors"
            type="email"
            class="form-control"
            required
            placeholder="Enter your email"
          >
        </div>
      </div>
      <div class="form-group">
        <label>Message:</label>
        <textarea
          type="text"
          rows="3"
          class="form-control"
          v-model="formValues.message"
          @change="checkErrors"
          placeholder="Enter Your Message"
          required
        ></textarea>
      </div>
      <div class="text-center">
        <button class="btn btn-danger btn-md text-uppercase">Submit</button>
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
