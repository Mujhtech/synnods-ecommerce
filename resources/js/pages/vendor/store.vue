<template>
  <main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"><i class="icon-home"></i></router-link>
          </li>
          <li class="breadcrumb-item">
            <router-link to="/vendors">Store</router-link>
          </li>
          <li class="breadcrumb-item active" aria-current="page">alexp</li>
        </ol>
      </div>
    </nav>

    <div class="store-single-container container d-md-flex">
      <aside class="sidebar-store mb-3">
        <!--<div class="widget widget-products-categories mb-3">
					<h3 class="widget-title">Store Product Category</h3>

					<div class="widget-body">
						<ul class="cat-list">
							<li>
								<router-link :to="{path: '/shop', query: {category: 'gifts'}}">Gifts</router-link>
							</li>
							<li>
								<router-link :to="{path: '/shop', query: {category: 'toys-1'}}">Toys</router-link>
							</li>
							<li>
								<router-link :to="{path: '/shop', query: {category: 'digital-microscope'}}">Digital Microscope</router-link>
							</li>
						</ul>
					</div>
				</div>-->
        <div class="widget widget-contact">
          <h3 class="widget-title">Contact Vendor</h3>
          <div class="widget-body">
            <form class="mb-0" action="#" method="get">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Your Name"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  class="form-control"
                  placeholder="you@example.com"
                  required
                />
              </div>
              <div class="form-group">
                <textarea
                  class="form-control"
                  rows="6"
                  placeholder="Type your message..."
                ></textarea>
              </div>
              <div class="form-footer my-0">
                <div class="form-footer-right">
                  <button type="submit" class="btn btn-primary">
                    Send Message
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </aside>

      <div class="store-single mb-3">
        <div class="store-header-info">
          <div class="store-details">
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

            <div class="store-data">
              <h1 class="store-title">{{ vendor.name }}</h1>
              <ul class="store-info-list">
                <li>
                  <i class="fa fa-map-marker"></i>
                  <p class="store-address">
                    {{ vendor.address }}, {{ vendor.state }}
                    {{ vendor.country }}
                  </p>
                </li>
                <li>
                  <i class="fa fa-star"></i>
                  4.00 rating from 1 review
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="store-single-tabs mb-2">
          <pv-tabs class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a
                href="#store-content"
                class="nav-link active"
                data-toggle="tab"
                role="tab"
                >Products</a
              >
            </li>
          </pv-tabs>
        </div>

        <div class="store-tab-content tab-content">
          <div
            class="tab-pane fade show active"
            id="store-content"
            role="tabpanel"
          >
            <div class="row">
              <div
                class="col-6 col-sm-4 col-xl-3"
                v-for="(product, index) in products.slice(0, 10)"
                :key="'store' + index"
              >
                <pv-product-one :product="product"></pv-product-one>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-3"></div>
  </main>
</template>

<script>
import PvProductOne from "../../components/features/product/PvProductOne";
import PvTabs from "../../components/features/PvTabs";
import { baseUrl } from "../../api";
import { vendorProduct } from "../../services/vendor";

export default {
  metaInfo: {
    title: "Store",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PvProductOne,
    PvTabs,
  },
  data: function () {
    return {
      products: [],
      vendor: null,
      baseUrl: baseUrl,
    };
  },
  created: async function () {
    try {
      const response = await vendorProduct(this.$route.params.slug);
      this.products = response.data.data.product;
      this.vendor = response.data.data.vendor;
      console.log(response);
    } catch (err) {
      console.log(err.response);
    }
  },
};
</script>