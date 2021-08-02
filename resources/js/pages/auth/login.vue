<template>
  <div class="container login-container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="heading mb-1">
              <h2 class="title">Login</h2>
            </div>

            <form action="#">
              <label for="login-email">
                Username or email address
                <span class="required">*</span>
              </label>
              <input
                type="email"
                class="form-input form-wide"
                id="login-email"
                required
              />

              <label for="login-password">
                Password
                <span class="required">*</span>
              </label>
              <input
                type="password"
                class="form-input form-wide"
                id="login-password"
                required
              />

              <div class="form-footer">
                <div class="custom-control custom-checkbox mb-0">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="lost-password"
                  />
                  <label class="custom-control-label mb-0" for="lost-password">
                    Remember me
                  </label>
                </div>

                <router-link
                  to="/auth/forgot-password"
                  class="forget-password text-dark form-footer-right"
                >
                  Forgot Password?
                </router-link>
              </div>
              <button type="submit" class="btn btn-dark btn-md w-100">
                LOGIN
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>