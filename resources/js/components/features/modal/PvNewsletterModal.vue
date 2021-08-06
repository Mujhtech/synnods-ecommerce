<template>
  <div
    class="newsletter-popup mfp-hide bg-img"
    id="newsletter-popup-form"
    style="
      background: #f1f1f1 no-repeat center/cover
        url(./images/newsletter_popup_bg.jpg);
    "
  >
    <div class="newsletter-popup-content">
      <img
        :src="'/assets/images/logo.png'"
        alt="Logo"
        class="logo-newsletter"
        width="101"
        height="40"
      />
      <h2>Subscribe to newsletter</h2>

      <p>
        Subscribe to the Porto mailing list to receive updates on new arrivals,
        special offers and our promotions.
      </p>

      <form action="#" v-on:submit.prevent="subscribe">
        <div class="input-group">
          <input
            type="email"
            class="form-control"
            id="newsletter-email"
            name="newsletter-email"
            placeholder="Your email address"
            v-model="email"
            required
          />
          <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
      </form>
      <div class="newsletter-subscribe">
        <div class="custom-control custom-checkbox">
          <input
            type="checkbox"
            class="custom-control-input"
            value="0"
            id="show-again"
            @change="removeNewsletter($event)"
          />
          <label for="show-again" class="custom-control-label"
            >Don't show this popup again</label
          >
        </div>
      </div>
    </div>

    <button
      title="Close (Esc)"
      type="button"
      class="mfp-close"
      @click="$emit('close')"
    >
      ×
    </button>
  </div>
</template>

<script>
import { setCookie } from "../../../utils/index";
import PreLoader from "../../common/PreLoader";
import { subscribe as service } from "../../../services/setting";
import { mapActions } from "vuex";

export default {
  data: function () {
    return {
      email: "",
      loading: false,
    };
  },
  components: {
    PreLoader,
  },
  methods: {
    ...mapActions("notification", ["addNotification"]),
    subscribe: async function () {
      try {
        this.loading = true;
        const response = await service({ email: this.email });
        this.loading = false;
        console.log(response);
        this.email = "";
        this.addNotification({
          type: "success",
          messsage: response.data.data.message,
        });
      } catch (e) {
        this.loading = false;
        this.email = "";
        console.log(e.response);
        this.addNotification({
          type: "error",
          message: e.response.data.data
            ? e.response.data.data.message
            : "Something went wrong",
        });
      }
    },
    removeNewsletter: function (e) {
      setCookie("newsletter", !e.target.checked);
    },
  },
};
</script>