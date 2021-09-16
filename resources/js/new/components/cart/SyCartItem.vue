<template>
  <div class="panel-body">
    <div class="order-review-wrapper">
      <div class="order-review">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="width-1">Product Name</th>
                <th class="width-2">Price</th>
                <th class="width-3">Qty</th>
                <th class="width-4">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in items" :key="index">
                <td>
                  <div class="o-pro-dec">
                    <p>{{item.name}}</p>
                  </div>
                </td>
                <td>
                  <div class="o-pro-price">
                    <p>₦{{item.price}}</p>
                  </div>
                </td>
                <td>
                  <div class="o-pro-qty">
                    <p>{{item.qty}}</p>
                  </div>
                </td>
                <td>
                  <div class="o-pro-subtotal">
                    <p>₦{{item.price * item.qty}}</p>
                  </div>
                </td>
              </tr>

            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">Subtotal</td>
                <td colspan="1">₦{{totalPrice}}</td>
              </tr>
              <tr class="tr-f">
                <td colspan="3">Shipping & Handling (Flat Rate - Fixed</td>
                <td colspan="1">₦45.00</td>
              </tr>
              <tr>
                <td colspan="3">Grand Total</td>
                <td colspan="1">₦{{totalPrice}}</td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="billing-back-btn">
          <span>
            Forgot an Item?
            <router-link to="/cart"> Edit Your Cart.</router-link>
          </span>
          <div class="billing-btn">
            <button type="submit">Continue</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "SyCartItem",
  props: {
      items: Array,
      totalPrice: Number
  }
};
</script>