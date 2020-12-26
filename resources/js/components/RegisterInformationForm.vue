<template>
  <form @submit="submitForm">
    <div class="container">
      <div class="alert alert-danger" v-if="error > 0">
        <span>{{errorText}}</span>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="form-group col-lg-6 col-12">
              <label>First Name*</label>
              <input
                type="text"
                v-model="user.firstname"
                class="form-control"
                @change="checkErrors"
                placeholder="Enter your first name"
              >
              <div>
                <small v-if="error === 1">First name must be at least 3 characters long.</small>
                <small v-if="error === 2">Required field</small>
                <small v-if="error === 3">Name must contain only letters</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>Last Name*</label>
              <input
                type="text"
                v-model="user.lastname"
                class="form-control"
                @change="checkErrors"
                placeholder="Enter your first name"
              >
              <div>
                <small v-if="error === 4">First name must be at least 3 characters long.</small>
                <small v-if="error === 5">Required field</small>
                <small v-if="error === 6">Name must contain only letters</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>Email*</label>
              <input
                disabled
                type="email"
                v-model="user.email"
                class="form-control"
                @change="checkErrors"
                placeholder="Enter your email"
              >
              <div>
                <small v-if="error === 7">Enter valid email address</small>
                <small v-if="error === 8">Required field</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>Contact*</label>
              <div class="container">
                <div class="row">
                  <select class="form-control col-4">
                    <!-- *ngFor="let code of countryCodeArray" -->
                    <option
                      v-bind:value="value.dial_code"
                      :key="value.name"
                      v-for="value in contryCodes"
                    >{{value.name}}({{value.dial_code}})</option>
                  </select>
                  <input
                    name="contact"
                    v-model="user.contact"
                    class="form-control col-8"
                    @change="checkErrors"
                    placeholder="Enter your contact"
                  >
                </div>
              </div>
              <div>
                <small v-if="error === 9">Required field</small>
                <small v-if="error === 10">Phone number should content numbers.</small>
                <small v-if="error === 11">Phone number must be at least 10 digits long.</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>New Password*</label>
              <input
                type="password"
                v-model="user.password"
                class="form-control"
                @change="checkErrors"
                placeholder="Enter your password"
              >
              <div>
                <small v-if="error === 12">Required field</small>
                <small v-if="error === 13">Password must be at least 6 characters long.</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>Confirm Password*</label>
              <input
                type="password"
                v-model="user.cpassword"
                class="form-control"
                @change="checkErrors"
                placeholder="confirm password"
              >
              <div>
                <small v-if="error === 14">Required field</small>
                <small v-if="error === 15">Password not match</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>PAN card number*</label>
              <input
                type="text"
                class="form-control"
                id="pancard"
                v-model="user.pancard"
                @change="checkErrors"
                placeholder="Enter your pan card number"
              >
              <div>
                <small v-if="error === 16">Required field</small>
                <small v-if="error === 17">Invalid Pancard Number</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>Date of Birth*</label>
              <input
                type="text"
                v-model="user.dob"
                id="dob"
                class="form-control"
                @change="checkErrors"
                placeholder="YYYY/MM/DD"
              >
              <div>
                <small v-if="error === 18">Required field</small>
                <small v-if="error === 19">Invalid Date format (YYYY/MM/DD)</small>
                <small v-if="error === 20">Invalid month</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>Address*</label>
              <input
                type="text"
                v-model="user.address"
                @change="checkErrors"
                class="form-control"
                placeholder="Enter your living address"
              >
              <div>
                <small v-if="error === 21">Required field</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>City*</label>
              <input
                type="text"
                v-model="user.city"
                class="form-control"
                @change="checkErrors"
                placeholder="Enter your city"
              >
              <div>
                <small v-if="error === 22">Required field</small>
                <small v-if="error === 23">Invalid city name format</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>State*</label>
              <input
                type="text"
                v-model="user.state"
                class="form-control"
                @change="checkErrors"
                placeholder="Enter your state"
              >
              <div>
                <small v-if="error === 24">Required field</small>
                <small v-if="error === 25">Invalid state name format</small>
              </div>
            </div>
            <div class="form-group col-lg-6 col-12">
              <label>Country*</label>
              <select
                type="text"
                class="form-control"
                v-model="user.country"
                @change="checkErrors"
                placeholder="Select your country"
              >
                <option v-bind:value="value" :key="value" v-for="value in countries">{{value}}</option>
              </select>
              <div>
                <small v-if="error === 26">Required field</small>
              </div>
            </div>
          </div>
          <div class="row" v-if="type === 'core'">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                <label>Your Bank name*</label>
                <input
                  type="text"
                  v-model="user.bankname"
                  class="form-control"
                  @change="checkErrors"
                  placeholder="Enter your bank name"
                >
                <div>
                  <small v-if="error === 27">Required field</small>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                <label>Bank Account Number*</label>
                <input
                  type="text"
                  v-model="user.accountnumber"
                  class="form-control"
                  @change="checkErrors"
                  placeholder="Enter your account number"
                >
                <div>
                  <small v-if="error === 28">Required field</small>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                <label>Enter IFSC*</label>
                <input
                  type="text"
                  v-model="user.ifsc"
                  class="form-control"
                  @change="checkErrors"
                  placeholder="Enter your IFSC"
                >
                <div>
                  <small v-if="error === 29">Required field</small>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="form-group">
                <label>Name as per passbook*</label>
                <input
                  type="text"
                  v-model="user.nameonpassbook"
                  class="form-control"
                  @change="checkErrors"
                  placeholder="Enter your name As Passbook"
                >
                <div>
                  <small v-if="error === 30">Required field</small>
                </div>
              </div>
            </div>
            <small class="text-danger">
              Note : Bank account details are required for direct
              settlement of referral bonuses in
              your account
            </small>
          </div>
          <div class="form-group col-12 text-center mt-4">
            <button class="btn btn-danger text-uppercase">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import axios from "axios";
export default {
  props: ["email", "type", "code", "api_key"],
  data() {
    return {
      error: 0,
      errorText: "",
      URL: "http://test.gainpassivemoney.com/api/",
      user: {
        firstname: "",
        lastname: "",
        email: "",
        contact: "",
        password: "",
        cpassword: "",
        pancard: "",
        dob: "",
        address: "",
        city: "",
        country: "",
        state: "",
        bankname: "",
        accountnumber: "",
        ifsc: "",
        countryCode: "",
        nameonpassbook: ""
      },
      countries: [],
      contryCodes: [
        { name: "India", dial_code: "+91", code: "IN" },
        { name: "Afghanistan", dial_code: "+93", code: "AF" },
        { name: "Albania", dial_code: "+355", code: "AL" },
        { name: "Algeria", dial_code: "+213", code: "DZ" },
        { name: "AmericanSamoa", dial_code: "+1 684", code: "AS" },
        { name: "Andorra", dial_code: "+376", code: "AD" },
        { name: "Angola", dial_code: "+244", code: "AO" },
        { name: "Anguilla", dial_code: "+1 264", code: "AI" },
        { name: "Antigua and Barbuda", dial_code: "+1268", code: "AG" },
        { name: "Argentina", dial_code: "+54", code: "AR" },
        { name: "Armenia", dial_code: "+374", code: "AM" },
        { name: "Aruba", dial_code: "+297", code: "AW" },
        { name: "Australia", dial_code: "+61", code: "AU" },
        { name: "Austria", dial_code: "+43", code: "AT" },
        { name: "Azerbaijan", dial_code: "+994", code: "AZ" },
        { name: "Bahamas", dial_code: "+1 242", code: "BS" },
        { name: "Bahrain", dial_code: "+973", code: "BH" },
        { name: "Bangladesh", dial_code: "+880", code: "BD" },
        { name: "Barbados", dial_code: "+1 246", code: "BB" },
        { name: "Belarus", dial_code: "+375", code: "BY" },
        { name: "Belgium", dial_code: "+32", code: "BE" },
        { name: "Belize", dial_code: "+501", code: "BZ" },
        { name: "Benin", dial_code: "+229", code: "BJ" },
        { name: "Bermuda", dial_code: "+1 441", code: "BM" },
        { name: "Bhutan", dial_code: "+975", code: "BT" },
        { name: "Bosnia and Herzegovina", dial_code: "+387", code: "BA" },
        { name: "Botswana", dial_code: "+267", code: "BW" },
        { name: "Brazil", dial_code: "+55", code: "BR" },
        {
          name: "British Indian Ocean Territory",
          dial_code: "+246",
          code: "IO"
        },
        { name: "Bulgaria", dial_code: "+359", code: "BG" },
        { name: "Burkina Faso", dial_code: "+226", code: "BF" },
        { name: "Burundi", dial_code: "+257", code: "BI" },
        { name: "Cambodia", dial_code: "+855", code: "KH" },
        { name: "Cameroon", dial_code: "+237", code: "CM" },
        { name: "Canada", dial_code: "+1", code: "CA" },
        { name: "Cape Verde", dial_code: "+238", code: "CV" },
        { name: "Cayman Islands", dial_code: "+ 345", code: "KY" },
        { name: "Central African Republic", dial_code: "+236", code: "CF" },
        { name: "Chad", dial_code: "+235", code: "TD" },
        { name: "Chile", dial_code: "+56", code: "CL" },
        { name: "China", dial_code: "+86", code: "CN" },
        { name: "Christmas Island", dial_code: "+61", code: "CX" },
        { name: "Colombia", dial_code: "+57", code: "CO" },
        { name: "Comoros", dial_code: "+269", code: "KM" },
        { name: "Congo", dial_code: "+242", code: "CG" },
        { name: "Cook Islands", dial_code: "+682", code: "CK" },
        { name: "Costa Rica", dial_code: "+506", code: "CR" },
        { name: "Croatia", dial_code: "+385", code: "HR" },
        { name: "Cuba", dial_code: "+53", code: "CU" },
        { name: "Cyprus", dial_code: "+537", code: "CY" },
        { name: "Czech Republic", dial_code: "+420", code: "CZ" },
        { name: "Denmark", dial_code: "+45", code: "DK" },
        { name: "Djibouti", dial_code: "+253", code: "DJ" },
        { name: "Dominica", dial_code: "+1 767", code: "DM" },
        { name: "Dominican Republic", dial_code: "+1 849", code: "DO" },
        { name: "Ecuador", dial_code: "+593", code: "EC" },
        { name: "Egypt", dial_code: "+20", code: "EG" },
        { name: "El Salvador", dial_code: "+503", code: "SV" },
        { name: "Equatorial Guinea", dial_code: "+240", code: "GQ" },
        { name: "Eritrea", dial_code: "+291", code: "ER" },
        { name: "Estonia", dial_code: "+372", code: "EE" },
        { name: "Ethiopia", dial_code: "+251", code: "ET" },
        { name: "Faroe Islands", dial_code: "+298", code: "FO" },
        { name: "Fiji", dial_code: "+679", code: "FJ" },
        { name: "Finland", dial_code: "+358", code: "FI" },
        { name: "France", dial_code: "+33", code: "FR" },
        { name: "French Guiana", dial_code: "+594", code: "GF" },
        { name: "French Polynesia", dial_code: "+689", code: "PF" },
        { name: "Gabon", dial_code: "+241", code: "GA" },
        { name: "Gambia", dial_code: "+220", code: "GM" },
        { name: "Georgia", dial_code: "+995", code: "GE" },
        { name: "Germany", dial_code: "+49", code: "DE" },
        { name: "Ghana", dial_code: "+233", code: "GH" },
        { name: "Gibraltar", dial_code: "+350", code: "GI" },
        { name: "Greece", dial_code: "+30", code: "GR" },
        { name: "Greenland", dial_code: "+299", code: "GL" },
        { name: "Grenada", dial_code: "+1 473", code: "GD" },
        { name: "Guadeloupe", dial_code: "+590", code: "GP" },
        { name: "Guam", dial_code: "+1 671", code: "GU" },
        { name: "Guatemala", dial_code: "+502", code: "GT" },
        { name: "Guinea", dial_code: "+224", code: "GN" },
        { name: "Guinea-Bissau", dial_code: "+245", code: "GW" },
        { name: "Guyana", dial_code: "+595", code: "GY" },
        { name: "Haiti", dial_code: "+509", code: "HT" },
        { name: "Honduras", dial_code: "+504", code: "HN" },
        { name: "Hungary", dial_code: "+36", code: "HU" },
        { name: "Iceland", dial_code: "+354", code: "IS" },
        { name: "Israel", dial_code: "+972", code: "IL" },
        { name: "Indonesia", dial_code: "+62", code: "ID" },
        { name: "Iraq", dial_code: "+964", code: "IQ" },
        { name: "Ireland", dial_code: "+353", code: "IE" },
        { name: "Italy", dial_code: "+39", code: "IT" },
        { name: "Jamaica", dial_code: "+1 876", code: "JM" },
        { name: "Japan", dial_code: "+81", code: "JP" },
        { name: "Jordan", dial_code: "+962", code: "JO" },
        { name: "Kazakhstan", dial_code: "+7 7", code: "KZ" },
        { name: "Kenya", dial_code: "+254", code: "KE" },
        { name: "Kiribati", dial_code: "+686", code: "KI" },
        { name: "Kuwait", dial_code: "+965", code: "KW" },
        { name: "Kyrgyzstan", dial_code: "+996", code: "KG" },
        { name: "Latvia", dial_code: "+371", code: "LV" },
        { name: "Lebanon", dial_code: "+961", code: "LB" },
        { name: "Lesotho", dial_code: "+266", code: "LS" },
        { name: "Liberia", dial_code: "+231", code: "LR" },
        { name: "Liechtenstein", dial_code: "+423", code: "LI" },
        { name: "Lithuania", dial_code: "+370", code: "LT" },
        { name: "Luxembourg", dial_code: "+352", code: "LU" },
        { name: "Madagascar", dial_code: "+261", code: "MG" },
        { name: "Malawi", dial_code: "+265", code: "MW" },
        { name: "Malaysia", dial_code: "+60", code: "MY" },
        { name: "Maldives", dial_code: "+960", code: "MV" },
        { name: "Mali", dial_code: "+223", code: "ML" },
        { name: "Malta", dial_code: "+356", code: "MT" },
        { name: "Marshall Islands", dial_code: "+692", code: "MH" },
        { name: "Martinique", dial_code: "+596", code: "MQ" },
        { name: "Mauritania", dial_code: "+222", code: "MR" },
        { name: "Mauritius", dial_code: "+230", code: "MU" },
        { name: "Mayotte", dial_code: "+262", code: "YT" },
        { name: "Mexico", dial_code: "+52", code: "MX" },
        { name: "Monaco", dial_code: "+377", code: "MC" },
        { name: "Mongolia", dial_code: "+976", code: "MN" },
        { name: "Montenegro", dial_code: "+382", code: "ME" },
        { name: "Montserrat", dial_code: "+1664", code: "MS" },
        { name: "Morocco", dial_code: "+212", code: "MA" },
        { name: "Myanmar", dial_code: "+95", code: "MM" },
        { name: "Namibia", dial_code: "+264", code: "NA" },
        { name: "Nauru", dial_code: "+674", code: "NR" },
        { name: "Nepal", dial_code: "+977", code: "NP" },
        { name: "Netherlands", dial_code: "+31", code: "NL" },
        { name: "Netherlands Antilles", dial_code: "+599", code: "AN" },
        { name: "New Caledonia", dial_code: "+687", code: "NC" },
        { name: "New Zealand", dial_code: "+64", code: "NZ" },
        { name: "Nicaragua", dial_code: "+505", code: "NI" },
        { name: "Niger", dial_code: "+227", code: "NE" },
        { name: "Nigeria", dial_code: "+234", code: "NG" },
        { name: "Niue", dial_code: "+683", code: "NU" },
        { name: "Norfolk Island", dial_code: "+672", code: "NF" },
        { name: "Northern Mariana Islands", dial_code: "+1 670", code: "MP" },
        { name: "Norway", dial_code: "+47", code: "NO" },
        { name: "Oman", dial_code: "+968", code: "OM" },
        { name: "Pakistan", dial_code: "+92", code: "PK" },
        { name: "Palau", dial_code: "+680", code: "PW" },
        { name: "Panama", dial_code: "+507", code: "PA" },
        { name: "Papua New Guinea", dial_code: "+675", code: "PG" },
        { name: "Paraguay", dial_code: "+595", code: "PY" },
        { name: "Peru", dial_code: "+51", code: "PE" },
        { name: "Philippines", dial_code: "+63", code: "PH" },
        { name: "Poland", dial_code: "+48", code: "PL" },
        { name: "Portugal", dial_code: "+351", code: "PT" },
        { name: "Puerto Rico", dial_code: "+1 939", code: "PR" },
        { name: "Qatar", dial_code: "+974", code: "QA" },
        { name: "Romania", dial_code: "+40", code: "RO" },
        { name: "Rwanda", dial_code: "+250", code: "RW" },
        { name: "Samoa", dial_code: "+685", code: "WS" },
        { name: "San Marino", dial_code: "+378", code: "SM" },
        { name: "Saudi Arabia", dial_code: "+966", code: "SA" },
        { name: "Senegal", dial_code: "+221", code: "SN" },
        { name: "Serbia", dial_code: "+381", code: "RS" },
        { name: "Seychelles", dial_code: "+248", code: "SC" },
        { name: "Sierra Leone", dial_code: "+232", code: "SL" },
        { name: "Singapore", dial_code: "+65", code: "SG" },
        { name: "Slovakia", dial_code: "+421", code: "SK" },
        { name: "Slovenia", dial_code: "+386", code: "SI" },
        { name: "Solomon Islands", dial_code: "+677", code: "SB" },
        { name: "South Africa", dial_code: "+27", code: "ZA" },
        {
          name: "South Georgia and the South Sandwich Islands",
          dial_code: "+500",
          code: "GS"
        },
        { name: "Spain", dial_code: "+34", code: "ES" },
        { name: "Sri Lanka", dial_code: "+94", code: "LK" },
        { name: "Sudan", dial_code: "+249", code: "SD" },
        { name: "Suriname", dial_code: "+597", code: "SR" },
        { name: "Swaziland", dial_code: "+268", code: "SZ" },
        { name: "Sweden", dial_code: "+46", code: "SE" },
        { name: "Switzerland", dial_code: "+41", code: "CH" },
        { name: "Tajikistan", dial_code: "+992", code: "TJ" },
        { name: "Thailand", dial_code: "+66", code: "TH" },
        { name: "Togo", dial_code: "+228", code: "TG" },
        { name: "Tokelau", dial_code: "+690", code: "TK" },
        { name: "Tonga", dial_code: "+676", code: "TO" },
        { name: "Trinidad and Tobago", dial_code: "+1 868", code: "TT" },
        { name: "Tunisia", dial_code: "+216", code: "TN" },
        { name: "Turkey", dial_code: "+90", code: "TR" },
        { name: "Turkmenistan", dial_code: "+993", code: "TM" },
        { name: "Turks and Caicos Islands", dial_code: "+1 649", code: "TC" },
        { name: "Tuvalu", dial_code: "+688", code: "TV" },
        { name: "Uganda", dial_code: "+256", code: "UG" },
        { name: "Ukraine", dial_code: "+380", code: "UA" },
        { name: "United Arab Emirates", dial_code: "+971", code: "AE" },
        { name: "United Kingdom", dial_code: "+44", code: "GB" },
        { name: "United States", dial_code: "+1", code: "US" },
        { name: "Uruguay", dial_code: "+598", code: "UY" },
        { name: "Uzbekistan", dial_code: "+998", code: "UZ" },
        { name: "Vanuatu", dial_code: "+678", code: "VU" },
        { name: "Wallis and Futuna", dial_code: "+681", code: "WF" },
        { name: "Yemen", dial_code: "+967", code: "YE" },
        { name: "Zambia", dial_code: "+260", code: "ZM" },
        { name: "Zimbabwe", dial_code: "+263", code: "ZW" },
        { name: "land Islands", dial_code: "", code: "AX" },
        { name: "Antarctica", dial_code: null, code: "AQ" },
        {
          name: "Bolivia, Plurinational State of",
          dial_code: "+591",
          code: "BO"
        },
        { name: "Brunei Darussalam", dial_code: "+673", code: "BN" },
        { name: "Cocos (Keeling) Islands", dial_code: "+61", code: "CC" },
        {
          name: "Congo, The Democratic Republic of the",
          dial_code: "+243",
          code: "CD"
        },
        { name: "Cote d'Ivoire", dial_code: "+225", code: "CI" },
        { name: "Falkland Islands (Malvinas)", dial_code: "+500", code: "FK" },
        { name: "Guernsey", dial_code: "+44", code: "GG" },
        {
          name: "Holy See (Vatican City State)",
          dial_code: "+379",
          code: "VA"
        },
        { name: "Hong Kong", dial_code: "+852", code: "HK" },
        { name: "Iran, Islamic Republic of", dial_code: "+98", code: "IR" },
        { name: "Isle of Man", dial_code: "+44", code: "IM" },
        { name: "Jersey", dial_code: "+44", code: "JE" },
        {
          name: "Korea, Democratic People's Republic of",
          dial_code: "+850",
          code: "KP"
        },
        { name: "Korea, Republic of", dial_code: "+82", code: "KR" },
        {
          name: "Lao People's Democratic Republic",
          dial_code: "+856",
          code: "LA"
        },
        { name: "Libyan Arab Jamahiriya", dial_code: "+218", code: "LY" },
        { name: "Macao", dial_code: "+853", code: "MO" },
        {
          name: "Macedonia, The Former Yugoslav Republic of",
          dial_code: "+389",
          code: "MK"
        },
        {
          name: "Micronesia, Federated States of",
          dial_code: "+691",
          code: "FM"
        },
        { name: "Moldova, Republic of", dial_code: "+373", code: "MD" },
        { name: "Mozambique", dial_code: "+258", code: "MZ" },
        {
          name: "Palestinian Territory, Occupied",
          dial_code: "+970",
          code: "PS"
        },
        { name: "Pitcairn", dial_code: "+872", code: "PN" },
        { name: "Réunion", dial_code: "+262", code: "RE" },
        { name: "Russia", dial_code: "+7", code: "RU" },
        { name: "Saint Barthélemy", dial_code: "+590", code: "BL" },
        {
          name: "Saint Helena, Ascension and Tristan Da Cunha",
          dial_code: "+290",
          code: "SH"
        },
        { name: "Saint Kitts and Nevis", dial_code: "+1 869", code: "KN" },
        { name: "Saint Lucia", dial_code: "+1 758", code: "LC" },
        { name: "Saint Martin", dial_code: "+590", code: "MF" },
        { name: "Saint Pierre and Miquelon", dial_code: "+508", code: "PM" },
        {
          name: "Saint Vincent and the Grenadines",
          dial_code: "+1 784",
          code: "VC"
        },
        { name: "Sao Tome and Principe", dial_code: "+239", code: "ST" },
        { name: "Somalia", dial_code: "+252", code: "SO" },
        { name: "Svalbard and Jan Mayen", dial_code: "+47", code: "SJ" },
        { name: "Syrian Arab Republic", dial_code: "+963", code: "SY" },
        { name: "Taiwan, Province of China", dial_code: "+886", code: "TW" },
        { name: "Tanzania, United Republic of", dial_code: "+255", code: "TZ" },
        { name: "Timor-Leste", dial_code: "+670", code: "TL" },
        {
          name: "Venezuela, Bolivarian Republic of",
          dial_code: "+58",
          code: "VE"
        },
        { name: "Viet Nam", dial_code: "+84", code: "VN" },
        { name: "Virgin Islands, British", dial_code: "+1 284", code: "VG" },
        { name: "Virgin Islands, U.S.", dial_code: "+1 340", code: "VI" }
      ]
    };
  },
  mounted() {
    this.user.email = this.email;
    this.getContries();
    if (this.code !== null && this.code !== "null" && this.code !== "") {
      const value = { referral_code: this.code, api_key: this.api_key };
      axios.post(this.URL + "add/reffreal", value).then(response => {
        console.log("reffreal added");
      });
    } else {
      const value = { referral_code: null, api_key: this.api_key };
      axios.post(this.URL + "add/reffreal", value).then(response => {
        console.log("reffreal added");
      });
    }
  },
  methods: {
    getContries() {
      axios.post(this.URL + "getcountries").then(response => {
        this.countries = response.data;
      });
    },

    checkErrors() {
      this.errorText = "Please enter all required field.";
      var namere = /^[a-zA-Z]+$/;
      var numberre = /^[0-9]+$/;
      var pancardre = /^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/;
      var dobre = /^[1-2]{1}[0-9]{3}\/[0-1]{1}[0-9]{1}\/[0-3]{1}[0-9]{1}$/;
      var alphanumeric = /^[a-zA-Z0-9]+$/;
      if (this.user.firstname === "") {
        this.error = 2;
        this.errorText = "Please enter First name.";
      } else if (this.user.firstname.length < 3) {
        this.error = 1;
        this.errorText = "Please enter valid First name.";
      } else if (!namere.test(this.user.firstname)) {
        this.error = 3;
        this.errorText = "Please enter valid First name.";
      } else if (this.user.lastname === "") {
        this.error = 5;
        this.errorText = "Please enter Last name.";
      } else if (this.user.lastname.length < 3) {
        this.error = 4;
        this.errorText = "Please enter valid Last name.";
      } else if (!namere.test(this.user.lastname)) {
        this.error = 6;
        this.errorText = "Please enter valid Last name.";
      } else if (this.user.contact === "") {
        this.error = 9;
        this.errorText = "Please enter contact.";
      } else if (!numberre.test(this.user.contact)) {
        this.error = 10;
        this.errorText = "Please enter valid contact.";
      } else if (this.user.password === "") {
        this.error = 12;
        this.errorText = "Please enter password.";
      } else if (this.user.password.length < 6) {
        this.error = 13;
        this.errorText = "Please enter valid password.";
      } else if (this.user.cpassword === "") {
        this.error = 14;
        this.errorText = "Please enter confirm password.";
      } else if (this.user.cpassword !== this.user.password) {
        this.error = 15;
        this.errorText = "Please enter confirm password not match.";
      } else if (this.user.pancard === "") {
        this.error = 16;
        this.errorText = "Please enter pancard.";
      } else if (!pancardre.test(this.user.pancard)) {
        this.error = 17;
        this.errorText = "Please enter valid pancard.";
      } else if (this.user.dob === "") {
        this.error = 18;
        this.errorText = "Please enter date of birth.";
      } else if (!dobre.test(this.user.dob)) {
        this.error = 19;
        this.errorText = "Please enter valid date of birth.";
      } else if (isNaN(new Date(this.user.dob).getDate())) {
        this.error = 20;
        this.errorText = "Please enter valid date of birth.";
      } else if (this.user.address === "") {
        this.error = 21;
        this.errorText = "Please enter address.";
      } else if (this.user.city === "") {
        this.error = 22;
        this.errorText = "Please enter city.";
      } else if (!alphanumeric.test(this.user.city)) {
        this.error = 23;
        this.errorText = "Please enter valid city name.";
      } else if (this.user.state === "") {
        this.error = 24;
        this.errorText = "Please enter state.";
      } else if (!alphanumeric.test(this.user.state)) {
        this.error = 25;
        this.errorText = "Please enter valid state name.";
      } else if (this.user.country === "") {
        this.error = 26;
        this.errorText = "Please enter country.";
      } else if (this.type === "core") {
        if (this.user.bankname === "") {
          this.error = 27;
          this.errorText = "Please enter bank name.";
        } else if (this.user.accountnumber === "") {
          this.error = 28;
          this.errorText = "Please enter account number.";
        } else if (this.user.ifsc === "") {
          this.error = 29;
          this.errorText = "Please enter IFSC.";
        } else if (this.user.nameonpassbook === "") {
          this.error = 30;
          this.errorText = "Please enter name as per passbook.";
        } else {
          this.error = 0;
          return true;
        }
      } else {
        this.error = 0;
        return true;
      }
      return false;
    },

    submitForm() {
      if (this.checkErrors()) {
        axios.post(this.URL + "register/information", this.user).then(() => {
          window.location.href = "/profile";
        });
      }
    }
  }
};
</script>
