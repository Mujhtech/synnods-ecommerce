<template>
  <div>
    <sy-notification></sy-notification>
    <sy-header :categories="categories"></sy-header>
    <router-view></router-view>
    <sy-brand></sy-brand>
    <sy-footer></sy-footer>
    <!--<sy-newsletter></sy-newsletter>-->
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
import SyBrand from "./new/components/commons/SyBrand";

export default {
  components: {
    SyHeader,
    SyNotification,
    SyNewsletter,
    SyFooter,
    SyBrand,
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
        if(!err.response) return;
        //console.log(err.response);
        localStorage.removeItem("SYNECT");
        localStorage.removeItem("SYNECUS");
        this.userLogout({});
      }
    },
  },
};
</script>