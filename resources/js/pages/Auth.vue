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
    <router-view />
  </main>
</template>
<script>
export default {
  name: "Auth",
  data: function () {
    return {};
  },
};
</script>