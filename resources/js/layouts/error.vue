<template>
  <div class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/" class="router-link-active"> Home </router-link>
          </li>
          <li aria-current="page" class="breadcrumb-item active">404</li>
        </ol>
      </div>
    </nav>
    <div class="container">
      <section class="http-error">
        <div class="row justify-content-center py-3">
          <div class="col-md-7 text-center">
            <div class="http-error-main">
              <h2>
                404
                <i class="fas fa-file ml-3"></i>
              </h2>
              <p>
                We're sorry, but the page you were looking for doesn't exist.
              </p>
            </div>
          </div>
          <div class="col-md-4 mt-4 mt-md-0">
            <h4 class="text-primary">Here are some useful links</h4>
            <ul class="nav nav-list">
              <li class="nav-item">
                <router-link to="/" class="nav-link router-link-active"
                  >Home</router-link
                >
              </li>
              <li class="nav-item">
                <router-link to="/account" class="nav-link router-link-active"
                  >Account</router-link
                >
              </li>
              <li class="nav-item">
                <router-link to="/auth/forgot-password" class="nav-link"
                  >Forget Password</router-link
                >
              </li>
              <li class="nav-item">
                <router-link to="/about-us" class="nav-link"
                  >About Us</router-link
                >
              </li>
              <li class="nav-item">
                <router-link to="/contact-us" class="nav-link"
                  >Contact Us</router-link
                >
              </li>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  name: "404",
  metaInfo: {
    title: "404",
    titleTemplate: "%s - Synoods Ecommerce",
  },
};
</script>