<template>
  <div class="panel-body">
    <div class="billing-information-wrapper">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="billing-info">
            <label>First Name</label>
            <input type="text" v-model="billing.first_name" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="billing-info">
            <label>Last Name</label>
            <input type="text" v-model="billing.last_name" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="billing-info">
            <label>Email Address</label>
            <input type="email" v-model="billing.email" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="billing-info">
            <label>Telephone</label>
            <input type="text" v-model="billing.phone" />
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="billing-info">
            <label>Address</label>
            <input type="text" v-model="billing.address" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="billing-info">
            <label>city</label>
            <input type="text" v-model="billing.city" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="billing-info">
            <label>State/Province</label>
            <input type="text" v-model="billing.state" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="billing-select">
            <label>Country</label>
            <select v-model="billing.country">
              <option value="Nigeria">Nigeria</option>
            </select>
          </div>
        </div>
      </div>
      <div class="billing-back-btn">
        <div class="billing-back">
          <a href="#"><i class="ion-arrow-up-c"></i> back</a>
        </div>
        <div class="billing-btn">
          <button type="button">Continue</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SyCartBilling",
  props: {
    billing: Object,
  },
};
</script>