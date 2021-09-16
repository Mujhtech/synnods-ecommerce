<template>
  <div class="panel-body">
    <div class="shipping-information-wrapper">
      <div class="shipping-info-2">
        <span>HasTech</span>
        <span>Bonosrie</span>
        <span>D - Block</span>
        <span>Dkaka, 1201</span>
        <span>Bangladesh</span>
        <span>T: +8800 879 9876 </span>
      </div>
      <div class="edit-address">
        <a href="#">Edit Address</a>
      </div>
      <div class="billing-select">
        <select class="email s-email s-wid">
          <option>Select Your Address</option>
          <option>Add New Address</option>
          <option>
            Boot Experts, Bonosrie D- Block, Dkaka, 1201, Bangladesh
          </option>
        </select>
      </div>
      <div class="ship-wrapper">
        <div class="single-ship">
          <input type="checkbox" checked="" value="address" name="address" />
          <label>Use Billing Address</label>
        </div>
      </div>
      <div class="billing-back-btn">
        <div class="billing-back">
          <a href="#"><i class="ion-arrow-up-c"></i> back</a>
        </div>
        <div class="billing-btn">
          <button type="submit">Continue</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SyCartShipping",
};
</script>