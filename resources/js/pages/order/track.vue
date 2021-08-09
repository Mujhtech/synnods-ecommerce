<template>
  <main class="main">
    <div class="page-header">
      <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0">
          <div class="container">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link to="/">Home</router-link>
              </li>
              <li class="breadcrumb-item">
                <router-link to="/shop">Shop</router-link>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                My Account
              </li>
            </ol>
          </div>
        </nav>

        <h1>My Account</h1>
      </div>
    </div>
     <div class="container login-container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="heading mb-1">
              <h2 class="title">Track Order</h2>
            </div>

            <form action="#">
              <label for="order-id">
                Order ID
                <span class="required">*</span>
              </label>
              <input
                type="email"
                class="form-input form-wide"
                id="order-id"
                required
              />
              <button type="submit" class="btn btn-dark btn-md w-100">
                Track Order
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </main>
</template>
<script>
export default {
  name: "Tracking",
  data: function () {
    return {};
  },
};
</script>