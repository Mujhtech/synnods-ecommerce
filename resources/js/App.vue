<template>
  <div>
    <sy-notification></sy-notification>
    <sy-header></sy-header>
    <router-view></router-view>
    <div class="brand-logo-area">
      <div class="container">
        <div class="brand-logo-active owl-carousel border-top-2 ptb-60">
          <div class="single-brand-logo">
            <img alt="" src="assets/img/brand-logo/brand-logo-1.png" />
          </div>
          <div class="single-brand-logo">
            <img alt="" src="assets/img/brand-logo/brand-logo-2.png" />
          </div>
          <div class="single-brand-logo">
            <img alt="" src="assets/img/brand-logo/brand-logo-3.png" />
          </div>
          <div class="single-brand-logo">
            <img alt="" src="assets/img/brand-logo/brand-logo-4.png" />
          </div>
          <div class="single-brand-logo">
            <img alt="" src="assets/img/brand-logo/brand-logo-5.png" />
          </div>
          <div class="single-brand-logo">
            <img alt="" src="assets/img/brand-logo/brand-logo-2.png" />
          </div>
        </div>
      </div>
    </div>
    <div class="shop-service-area black-bg pt-65">
      <div class="container">
        <div class="shop-service-wrapper black-bg-2">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="shop-service-content text-center">
                <h4>Free Shipping</h4>
                <p>Free shipping on all order</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="shop-service-content text-center">
                <h4>Money Return</h4>
                <p>30 days for free return</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="shop-service-content text-center border-none">
                <h4>Online Support</h4>
                <p>Support 24 hours a day</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <sy-footer></sy-footer>
    <sy-newsletter></sy-newsletter>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import * as auth from "./services/auth";
import * as catService from "./services/category";
import SyHeader from "./new/components/commons/SyHeader";
import SyFooter from "./new/components/commons/SyFooter";
import SyNewsletter from "./new/components/commons/SyNewsletter";
import SyNotification from "./new/components/commons/SyNotification";

export default {
  components: {
    SyHeader,
    SyNotification,
    SyNewsletter,
    SyFooter,
  },
  data: function () {
    return {
      isHide: false,
      categories: [],
    };
  },
  watch: {},
  created: function () {},
  mounted: function () {
    this.fetchCategory();
    this.fetchUser();
    Echo.channel("NewProduct").listen(".new.product", (e) => {
      this.$notify({
        group: "newProduct",
        text: `has been added!`,
        data: e.product,
      });
    });
    Echo.channel("NewUser").listen(".new.user", (e) => {
      this.$notify({
        group: "newUser",
        text: `just joined!`,
        data: e.user,
      });
    });
  },
  destroyed: function () {},
  methods: {
    ...mapActions("user", ["userLogin", "userLogout"]),
    doCopy: function (text) {
      this.$copyText(text).then(
        function (e) {
          alert("Copied");
          console.log(e);
        },
        function (e) {
          console.log(e);
        }
      );
    },
    fetchCategory: async function () {
      try {
        const response = await catService.category();
        this.categories = response.data.data.data;
      } catch (err) {
        console.log(err.response);
      }
    },
    fetchUser: async function () {
      try {
        const response = await auth.getProfile();
        this.userLogin(response.data.data.user);
      } catch (err) {
        //if(!err.response) return;
        console.log(err.response);
        localStorage.removeItem("SYNECT");
        localStorage.removeItem("SYNECUS");
        this.userLogout({});
      }
    },
  },
};
</script>