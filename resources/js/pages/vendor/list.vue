<template>
  <main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"><i class="icon-home"></i></router-link>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Store List</li>
        </ol>
      </div>
    </nav>

    <div class="container">
      <div
        class="toolbox toolbox-store sticky-header"
        data-sticky-options="{'mobile': true}"
      >
        <div class="toolbox-left">
          <div class="toolbox-item d-none d-md-block">
            <label>Total store showing: {{ vendors.length }}</label>
          </div>

          <div class="toolbox-item toolbox-filter mr-0">
            <a
              href="javascript:;"
              class="btn collapsed"
              data-toggle="collapse"
              @click="filterOpended = !filterOpended"
            >
              <svg
                data-name="Layer 3"
                id="Layer_3"
                viewBox="0 0 32 32"
                xmlns="http://www.w3.org/2000/svg"
              >
                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                <path
                  d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                  class="cls-2"
                ></path>
                <path
                  d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z"
                  class="cls-2"
                ></path>
                <path
                  d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z"
                  class="cls-3"
                ></path>
                <path
                  d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                  class="cls-2"
                ></path></svg
              >Filter
            </a>
          </div>
        </div>

        <div class="toolbox-item toolbox-sort">
          <label>Sort By:</label>

          <div class="select-custom">
            <select name="orderby" class="form-control">
              <option value="menu_order" selected="selected">
                Most Recent
              </option>
              <option value="popularity">Most Popular</option>
            </select>
          </div>
        </div>

        <div class="toolbox-item layout-modes">
          <router-link to="/vendor" class="layout-btn btn-grid" title="Grid">
            <i class="icon-mode-grid"></i>
          </router-link>
          <router-link
            to="/vendor/list"
            class="layout-btn btn-list"
            title="List"
          >
            <i class="icon-mode-list"></i>
          </router-link>
        </div>
      </div>

      <vue-slide-toggle :open="filterOpended">
        <div id="filter-form" class="filter-form-container">
          <div></div>
          <form action="#" class="mb-0">
            <div class="row">
              <div class="input-group col-lg-7 col-xl-5">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Search Vendors"
                  required
                />
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary btn-submit">
                    Search
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </vue-slide-toggle>

      <div class="mt-2">
        <div
          class="store-default store-list"
          v-for="(vendor, index) in vendors"
          :key="index"
        >
          <div class="store-header">
            <router-link :to="`/vendor/${vendor.slug}`">
              <figure>
                <img
                  v-if="vendor.logo"
                  :src="`${baseUrl}${vendor.logo_url}`"
                  alt="vendor"
                  width="625"
                  height="299"
                />
                <img
                  v-else
                  :src="`${vendor.logo_url}`"
                  alt="vendor"
                  width="625"
                  height="299"
                />
              </figure>
            </router-link>
          </div>

          <div class="store-content">
            <router-link :to="`/vendor/${vendor.slug}`">
              <h3 class="store-title">{{ vendor.name }}</h3>
            </router-link>

            <p class="store-address">
              {{ vendor.address }}, {{ vendor.state }}
              {{ vendor.country }}
            </p>
          </div>

          <div class="ratings-container">
            <div class="product-ratings">
              <span class="ratings" style="width: 80%"></span>
              <span class="tooltiptext tooltip-top">4.00</span>
            </div>
            <p>4.00 out of 5</p>
          </div>

          <div class="store-footer">
            <div class="seller-avatar">
              <img
                v-if="vendor.logo"
                :src="`${baseUrl}${vendor.logo_url}`"
                alt="avatar"
                width="100"
                height="100"
              />
              <img
                v-else
                :src="`${vendor.logo_url}`"
                alt="avatar"
                width="100"
                height="100"
              />
            </div>
            <router-link
              :to="`/vendor/${vendor.slug}`"
              class="btn btn-primary btn-round"
            >
            </router-link>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-6"></div>
  </main>
</template>

<script>
import { VueSlideToggle } from "vue-slide-toggle";
import * as vendorService from "../../services/vendor";
import { baseUrl } from "../../api";

export default {
  metaInfo: {
    title: "Vendors",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    VueSlideToggle,
  },
  data: function () {
    return {
      filterOpended: false,
      baseUrl: baseUrl,
      vendors: [],
    };
  },
  mounted: function () {
    this.getVendor();
  },
  methods: {
    getVendor: async function () {
      try {
        const response = await vendorService.vendor();
        console.log(response);
        this.vendors = response.data.data.vendors;
      } catch (err) {
        console.log(err.response);
      }
    },
  },
};
</script>