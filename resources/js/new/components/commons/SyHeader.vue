<template>
  <header class="header-area theme-bg">
    <div class="header-top pt-10 pb-13 border-bottom-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <div class="header-top-left">
              <!--<div class="language-currency">
                <span>Language:</span>
                <div class="lang-curr-dropdown">
                  <ul>
                    <li>
                      <a class="language-click" href="javascript:;"
                        >English <i class="ion-chevron-down"></i
                      ></a>
                      <ul class="language-dropdown">
                        <li><a href="javascript:;">English </a></li>
                        <li><a href="javascript:;">Bangla </a></li>
                        <li><a href="javascript:;">Hindi </a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>-->
              <div class="language-currency lang-curr-mrg">
                <span>Currency: </span>
                <div class="lang-curr-dropdown">
                  <ul>
                    <li>
                      <a class="language-click" href="javascript:;"
                        >NGN <i class="ion-chevron-down"></i
                      ></a>
                      <ul class="language-dropdown">
                        <li><a href="javascript:;">USD </a></li>
                        <li><a href="javascript:;">NGN </a></li>
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
                <li>
                  <router-link to="/account">My Account</router-link>
                </li>
                <li>
                  <router-link to="/wishlist">Wishlist</router-link>
                </li>
                <li>
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
              <div class="header-cart middle-same">
                <button class="icon-cart">
                  <i class="pe-7s-shopbag cart-bag"></i>
                  <span class="count-amount">$609.00</span>
                  <i class="ion-chevron-down cart-down"></i>
                  <span class="count-style">02</span>
                </button>
                <div class="shopping-cart-content">
                  <ul>
                    <li class="single-shopping-cart">
                      <div class="shopping-cart-img">
                        <a href="javascript:;"
                          ><img alt="" src="assets/img/cart/cart-1.jpg"
                        /></a>
                      </div>
                      <div class="shopping-cart-title">
                        <h4>
                          <a href="javascript:;">Phantom Remote <br />Control 2018 </a>
                        </h4>
                        <h6>Qty: 02</h6>
                        <span>$260.00</span>
                      </div>
                      <div class="shopping-cart-delete">
                        <a href="javascript:;"><i class="ion-android-close"></i></a>
                      </div>
                    </li>
                    <li class="single-shopping-cart">
                      <div class="shopping-cart-img">
                        <a href="javascript:;"
                          ><img alt="" src="assets/img/cart/cart-2.jpg"
                        /></a>
                      </div>
                      <div class="shopping-cart-title">
                        <h4>
                          <a href="javascript:;">Phantom Remote <br />Control 2018 </a>
                        </h4>
                        <h6>Qty: 02</h6>
                        <span>$260.00</span>
                      </div>
                      <div class="shopping-cart-delete">
                        <a href="javascript:;"><i class="ion-android-close"></i></a>
                      </div>
                    </li>
                  </ul>
                  <div class="shopping-cart-total">
                    <h4>Shipping : <span>$20.00</span></h4>
                    <h4>Total : <span class="shop-total">$260.00</span></h4>
                  </div>
                  <div class="shopping-cart-btn">
                    <a class="btn-style btn-hover" href="cart-page.html"
                      >view cart</a
                    >
                    <a class="btn-style btn-hover" href="checkout.html"
                      >checkout</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom">
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
                    <li class="mega-menu-position">
                      <a href="javascript:;">Category <i class="ion-chevron-down"></i> </a>
                      <ul class="mega-menu">
                        <li
                          v-for="(category, index) in categories.slice(0, 5)"
                          :key="index"
                        >
                          <ul>
                            <li>
                              <ul>
                                <li class="mega-menu-title">
                                  <router-link
                                    :to="`/shop?category=${category.slug}`"
                                    >{{ category.name }}</router-link
                                  >
                                </li>
                                <li
                                  v-for="(
                                    sub_cat, key
                                  ) in category.sub_categories"
                                  :key="key"
                                >
                                  <router-link
                                    :to="`/shop?sub_category=${sub_cat.slug}`"
                                    >{{ sub_cat.name }}</router-link
                                  >
                                </li>
                              </ul>
                            </li>
                          </ul>
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
        <div class="main-menu main-none">
          <nav>
            <ul>
              <li><router-link to="/">Home</router-link></li>
              <li class="mega-menu-position">
                <a href="javascript:;">Category <i class="ion-chevron-down"></i> </a>
                <ul class="mega-menu">
                  <li
                    v-for="(category, index) in categories.slice(0, 5)"
                    :key="index"
                  >
                    <ul>
                      <li>
                        <ul>
                          <li class="mega-menu-title">
                            <router-link
                              :to="`/shop?category=${category.slug}`"
                              >{{ category.name }}</router-link
                            >
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
                    </ul>
                  </li>
                </ul>
              </li>
              <li><router-link to="/contact">Contact</router-link></li>
              <li><router-link to="/authentication">Login</router-link></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "SyHeader",
  props: {
    categories: Array,
  },
  data: function () {
    return {
      search_term: "",
    };
  },
  methods: {
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