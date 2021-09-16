<template>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-5">
        <div class="checkout-register">
          <div class="title-wrap">
            <h4 class="cart-bottom-title section-bg-white">
              CHECKOUT AS A GUEST OR REGISTER
            </h4>
          </div>
          <div class="register-us">
            <ul>
              <li><input type="checkbox" /> Checkout as Guest</li>
              <li><input type="checkbox" /> Register</li>
            </ul>
          </div>
          <h6>REGISTER AND SAVE TIME!</h6>
          <div class="register-us-2">
            <p>Register with us for future convenience.</p>
            <ul>
              <li>Fast and easy checkout</li>
              <li>Easy access to your order history and status</li>
            </ul>
          </div>
          <a href="#">Apply Coupon</a>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="checkout-login">
          <div class="title-wrap">
            <h4 class="cart-bottom-title section-bg-white">LOGIN</h4>
          </div>
          <p>Already have an account?</p>
          <span>Please log in below:</span>
          <form>
            <div class="login-form">
              <label>Email Address * </label>
              <input type="email" name="email" />
            </div>
            <div class="login-form">
              <label>Password *</label>
              <input type="password" name="email" />
            </div>
          </form>
          <div class="login-forget">
            <router-link to="/auth/forgot">Forgot your password?</router-link>
            <p>* Required Fields</p>
          </div>
          <div class="checkout-login-btn">
            <a href="#">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>