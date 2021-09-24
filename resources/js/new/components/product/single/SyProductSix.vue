<template>
  <div class="single-product-wrapper">
    <div class="single-product-img">
      <router-link :to="`/product/${product.slug}`"
        ><img
          v-lazy="`${product.featured_image}`"
          :alt="product.name"
          width="110"
          height="110"
      /></router-link>
    </div>
    <div class="product-content">
      <span
        ><router-link
          :to="{
            path: '/shop',
            query: { category: product.category.slug },
          }"
          >{{ product.category.name }}</router-link
        >
        ,
        <router-link
          :to="{
            path: '/shop',
            query: {
              sub_category: product.sub_category.slug,
            },
          }"
          >{{ product.sub_category.name }}</router-link
        ></span
      >
      <h4>
        <router-link :to="`/product/${product.slug}`">{{
          product.name
        }}</router-link>
      </h4>
      <div class="product-price-wrapper">
        <span>₦{{ product.price }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SyProductSix",
  props: {
    product: Object,
  },
};
</script>