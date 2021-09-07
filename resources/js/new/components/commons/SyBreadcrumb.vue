<template>
  <div class="breadcrumb-area gray-bg-7">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><router-link to="/">Home</router-link></li>
          <li class="active">{{title}}</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "BreadCrum",
    props: {
        title: String
    }
}
</script>