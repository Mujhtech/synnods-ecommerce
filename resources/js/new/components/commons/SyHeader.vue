<template>
  <header class="header-area theme-bg">
    <div class="header-top pt-10 pb-13 border-bottom-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <div class="header-top-left">
              <div class="language-currency">
                <span>Language:</span>
                <div class="lang-curr-dropdown">
                  <ul>
                    <li>
                      <a class="language-click" href="javascript:;"
                        >English <i class="ion-chevron-down"></i
                      ></a>
                      <ul class="language-dropdown">
                        <li><a href="javascript:;">English </a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="language-currency lang-curr-mrg">
                <span>Currency: </span>
                <div class="lang-curr-dropdown">
                  <ul>
                    <li>
                      <a class="language-click" href="javascript:;"
                        >{{ getCurrency }}<i class="ion-chevron-down"></i
                      ></a>
                      <ul class="language-dropdown">
                        <li>
                          <a
                            href="javascript:;"
                            v-on:click="changeCurrency('USD')"
                            >USD
                          </a>
                        </li>
                        <li>
                          <a
                            href="javascript:;"
                            v-on:click="changeCurrency('NGN')"
                            >NGN
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="header-top-right">
              <ul>
                <li v-if="getToken">
                  <router-link to="/account">My Account</router-link>
                </li>
                <li>
                  <router-link to="/wishlist">Wishlist</router-link>
                </li>
                <li v-if="!getToken">
                  <router-link to="/authentication"
                    >Register / Login</router-link
                  >
                </li>
                <li>
                  <router-link to="/checkout">Checkout</router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle ptb-40 border-bottom-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <div class="logo logo-mrg">
              <router-link to="/">
                <img
                  src="https://havybucket.fra1.cdn.digitaloceanspaces.com/faadaakaa/faadaakaa/faadaakaa_logo.png"
                  alt=""
                />
              </router-link>
            </div>
          </div>
          <div class="col-lg-9 col-md-12 col-12">
            <div class="header-contact-search-wrapper f-right">
              <div class="header-contact middle-same">
                <div class="header-contact-icon">
                  <i class="pe-7s-headphones"></i>
                </div>
                <div class="header-contact-content">
                  <p>Call us <br />Free Support: (012) 800 456 789</p>
                </div>
              </div>
              <div class="header-search middle-same">
                <form
                  class="header-search-form"
                  v-on:submit.prevent="submitSearchForm"
                >
                  <input
                    type="text"
                    name="search_item"
                    v-model="search_term"
                    placeholder="Search entire store here ..."
                  />
                  <button>
                    <i class="ion-ios-search-strong"></i>
                  </button>
                </form>
              </div>
              <sy-cart></sy-cart>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom border-bottom-1 header-bottom-3">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="logo mobile-logo">
              <router-link to="/">
                <img
                  alt=""
                  src="https://havybucket.fra1.cdn.digitaloceanspaces.com/faadaakaa/faadaakaa/faadaakaa_logo.png"
                />
              </router-link>
            </div>
          </div>
          <div class="col-12">
            <div class="mobile-menu-area">
              <div class="mobile-menu">
                <nav id="mobile-menu-active">
                  <ul class="menu-overflow">
                    <li><router-link to="/">Home</router-link></li>
                    <li>
                      <a href="javascript:;">Category </a>
                      <ul>
                        <li
                          v-for="(category, index) in categories.slice(0, 5)"
                          :key="index"
                        >
                          <router-link
                            :to="`/shop?category=${category.slug}`"
                            >{{ category.name }}</router-link
                          >
                        </li>
                      </ul>
                    </li>
                    <li><router-link to="/contact">Contact</router-link></li>
                    <li>
                      <router-link to="/authentication">Login</router-link>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="main-menu main-none main-border elec-menu">
          <nav>
            <ul>
              <li><i style="color: white" class="pe-7s-menu"></i></li>
              <li class="mega-menu-position">
                <a href="javascript:;"
                  >Computer & Accessories <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li
                        v-for="(category, index) in computer.categories"
                        :key="index"
                      >
                        <ul>
                          <li class="mega-menu-title">
                            <strong><router-link
                              :to="`/shop?category=${category.slug}`"
                              >{{ category.name }}</router-link
                            ></strong>
                          </li>
                          <li
                            v-for="(sub_cat, key) in category.sub_categories"
                            :key="key"
                          >
                            <router-link
                              :to="`/shop?sub_category=${sub_cat.slug}`"
                              >{{ sub_cat.name }}</router-link
                            >
                          </li>
                        </ul>
                      </li>
                      <li style="width: 32%">
                        <div
                          style="height: 200px; width: 100%; overflow: hidden"
                        >
                          <img
                            style="margin-top: -200px"
                            src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/comp21.png"
                          />
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="mega-menu-position">
                <a href="javascript:;">
                  Phone & Tablet <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li
                        v-for="(category, index) in phone.categories"
                        :key="index"
                      >
                        <ul>
                          <li class="mega-menu-title">
                            <strong><router-link
                              :to="`/shop?category=${category.slug}`"
                              >{{ category.name }}</router-link
                            ></strong>
                          </li>
                          <li
                            v-for="(sub_cat, key) in category.sub_categories"
                            :key="key"
                          >
                            <router-link
                              :to="`/shop?sub_category=${sub_cat.slug}`"
                              >{{ sub_cat.name }}</router-link
                            >
                          </li>
                        </ul>
                      </li>
                      <li style="width: 32%">
                        <div
                          style="height: 200px; width: 100%; overflow: hidden"
                        >
                          <img
                            style="margin-top: -200px"
                            src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/phones21.png"
                          />
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="mega-menu-position">
                <a href="javascript:;">
                  Electronics <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li
                        v-for="(category, index) in electronic.categories"
                        :key="index"
                      >
                        <ul>
                          <li class="mega-menu-title">
                            <strong><router-link
                              :to="`/shop?category=${category.slug}`"
                              >{{ category.name }}</router-link
                            ></strong>
                          </li>
                          <li
                            v-for="(sub_cat, key) in category.sub_categories"
                            :key="key"
                          >
                            <router-link
                              :to="`/shop?sub_category=${sub_cat.slug}`"
                              >{{ sub_cat.name }}</router-link
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <div
                          style="height: 200px; width: 100%; overflow: hidden"
                        >
                          <img
                            style="margin-top: -200px"
                            src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/Electronics21.png"
                          />
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="mega-menu-position">
                <a href="javascript:;">
                  Home & kitchen <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li
                        v-for="(category, index) in home.categories"
                        :key="index"
                      >
                        <ul>
                          <li class="mega-menu-title">
                            <strong><router-link
                              :to="`/shop?category=${category.slug}`"
                              >{{ category.name }}</router-link
                            ></strong>
                          </li>
                          <li
                            v-for="(sub_cat, key) in category.sub_categories"
                            :key="key"
                          >
                            <router-link
                              :to="`/shop?sub_category=${sub_cat.slug}`"
                              >{{ sub_cat.name }}</router-link
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <div
                          style="height: 200px; width: 100%; overflow: hidden"
                        >
                          <img
                            style="margin-top: -200px"
                            src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/Electronics21.png"
                          />
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="mega-menu-position">
                <a href="javascript:;">
                  Furniture <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li
                        v-for="(category, index) in furniture.categories"
                        :key="index"
                      >
                        <ul>
                          <li class="mega-menu-title">
                            <strong><router-link
                              :to="`/shop?category=${category.slug}`"
                              >{{ category.name }}</router-link
                            ></strong>
                          </li>
                          <li
                            v-for="(sub_cat, key) in category.sub_categories"
                            :key="key"
                          >
                            <router-link
                              :to="`/shop?sub_category=${sub_cat.slug}`"
                              >{{ sub_cat.name }}</router-link
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <div
                          style="height: 200px; width: 100%; overflow: hidden"
                        >
                          <img
                            style="margin-top: -200px"
                            src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/Electronics21.png"
                          />
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="mega-menu-position">
                <a href="javascript:;">
                  Baby, Kids & Toys <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li
                        v-for="(category, index) in baby.categories"
                        :key="index"
                      >
                        <ul>
                          <li class="mega-menu-title">
                            <strong><router-link
                              :to="`/shop?category=${category.slug}`"
                              >{{ category.name }}</router-link
                            ></strong>
                          </li>
                          <li
                            v-for="(sub_cat, key) in category.sub_categories"
                            :key="key"
                          >
                            <router-link
                              :to="`/shop?sub_category=${sub_cat.slug}`"
                              >{{ sub_cat.name }}</router-link
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <div
                          style="height: 200px; width: 100%; overflow: hidden"
                        >
                          <img
                            style="margin-top: -200px"
                            src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/Electronics21.png"
                          />
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><router-link to="/contact">Contact</router-link></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import SyCart from "./SyCart";
export default {
  name: "SyHeader",
  components: {
    SyCart,
  },
  props: {
    categories: Array,
    phone: Object,
    computer: Object,
    baby: Object,
    furniture: Object,
    electronic: Object,
    home: Object,
  },
  data: function () {
    return {
      search_term: "",
    };
  },
  computed: {
    ...mapGetters("setting", ["getCurrency"]),
    ...mapGetters("user", ["getToken"]),
  },
  methods: {
    ...mapActions("setting", ["updateCurrency"]),
    ...mapActions("notification", ["addNotification"]),
    changeCurrency: function (cur) {
      console.log(localStorage.getItem("mod"));
      this.updateCurrency(cur);
      //this.addNotification(`Currency changed to ${cur}`);
    },
    submitSearchForm: function (e) {
      this.$router.push({
        path: "/shop",
        query: {
          search_term: this.search_term,
        },
      });
    },
  },
};
</script>