<template>

  <div class="banner-area banner-negative-mrg-2">
    <div class="container-fluid p-0">
      <div class="row g-0">
        <div class="col-lg-6 col-md-6">
          <div class="banner-img banner-hover">
            <router-link to="/shop"><img alt="" src="assets/img/banner/banner-1.jpg" /></router-link>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="banner-img banner-hover">
            <router-link to="/shop"><img alt="" src="assets/img/banner/banner-2.jpg" /></router-link>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  name: "SyHomeBanner",
}
</script>