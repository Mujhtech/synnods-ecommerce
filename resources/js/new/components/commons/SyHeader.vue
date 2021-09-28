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
                  >Category <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li
                    v-for="(category, index) in categories.slice(0, 4)"
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
              <li class="mega-menu-position">
                <a href="shop.html">
                  Phone & Tablet <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Phone</li>
                          <li><a href="index.html">Android</a></li>
                          <li><a href="index-electronics-2.html">iOS</a></li>
                          <li>
                            <a href="index-electronics-3.html">Windows</a>
                          </li>
                          <li><a href="index-electronics-4.html">Others</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Tablets</li>
                          <li><a href="index.html">Android</a></li>
                          <li><a href="index-electronics-2.html">iOS</a></li>
                          <li>
                            <a href="index-electronics-3.html">Windows</a>
                          </li>
                          <li><a href="index-electronics-4.html">Others</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Sort by Price</li>
                          <li><a href="index-jewelry.html"> >= 100,000</a></li>
                          <li><a href="index-medical.html"> >= 150,000</a></li>
                          <li><a href="index-sports.html"> >= 200,000</a></li>
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
                <a href="shop.html">
                  Electronics <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Television</li>
                          <li><a href="index.html">Smart TVs</a></li>
                          <li><a href="index-electronics-2.html">LED</a></li>
                          <li><a href="index-electronics-3.html">Plasma</a></li>
                          <li><a href="index-electronics-4.html">Others</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Audio & Sound Systems</li>
                          <li><a href="index.html">Home Theatre</a></li>
                          <li>
                            <a href="index-electronics-2.html">HiFi Systems</a>
                          </li>
                          <li>
                            <a href="index-electronics-3.html"
                              >MP3 Players & Speakers</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Games & Consoles</li>
                          <li><a href="index-jewelry.html"> PS4 & PS3</a></li>
                          <li><a href="index-sports.html"> Xbox</a></li>
                          <li><a href="index-sports.html"> Nintendo Wii</a></li>
                          <li><a href="index-sports.html"> Sony PSP</a></li>
                          <li><a href="index-sports.html"> PS Vita</a></li>
                          <li><a href="index-sports.html"> Nintendo 3DS</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Cameras</li>
                          <li>
                            <a href="index-jewelry.html"> Digital Cameras</a>
                          </li>
                          <li>
                            <a href="index-medical.html">
                              Professional & SLR Cameras</a
                            >
                          </li>
                          <li>
                            <a href="index-sports.html">
                              Camcorders & Video Cameras</a
                            >
                          </li>
                          <li>
                            <a href="index-sports.html">
                              Camera Lenses & Accessories</a
                            >
                          </li>
                          <li><a href="index-sports.html"> CCTV Cameras</a></li>
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
                <a href="shop.html">
                  Home & kitchen <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Television</li>
                          <li><a href="index.html">Smart TVs</a></li>
                          <li><a href="index-electronics-2.html">LED</a></li>
                          <li><a href="index-electronics-3.html">Plasma</a></li>
                          <li><a href="index-electronics-4.html">Others</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Audio & Sound Systems</li>
                          <li><a href="index.html">Home Theatre</a></li>
                          <li>
                            <a href="index-electronics-2.html">HiFi Systems</a>
                          </li>
                          <li>
                            <a href="index-electronics-3.html"
                              >MP3 Players & Speakers</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Games & Consoles</li>
                          <li><a href="index-jewelry.html"> PS4 & PS3</a></li>
                          <li><a href="index-sports.html"> Xbox</a></li>
                          <li><a href="index-sports.html"> Nintendo Wii</a></li>
                          <li><a href="index-sports.html"> Sony PSP</a></li>
                          <li><a href="index-sports.html"> PS Vita</a></li>
                          <li><a href="index-sports.html"> Nintendo 3DS</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Cameras</li>
                          <li>
                            <a href="index-jewelry.html"> Digital Cameras</a>
                          </li>
                          <li>
                            <a href="index-medical.html">
                              Professional & SLR Cameras</a
                            >
                          </li>
                          <li>
                            <a href="index-sports.html">
                              Camcorders & Video Cameras</a
                            >
                          </li>
                          <li>
                            <a href="index-sports.html">
                              Camera Lenses & Accessories</a
                            >
                          </li>
                          <li><a href="index-sports.html"> CCTV Cameras</a></li>
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
                <a href="shop.html">
                  Furniture <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Television</li>
                          <li><a href="index.html">Smart TVs</a></li>
                          <li><a href="index-electronics-2.html">LED</a></li>
                          <li><a href="index-electronics-3.html">Plasma</a></li>
                          <li><a href="index-electronics-4.html">Others</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Audio & Sound Systems</li>
                          <li><a href="index.html">Home Theatre</a></li>
                          <li>
                            <a href="index-electronics-2.html">HiFi Systems</a>
                          </li>
                          <li>
                            <a href="index-electronics-3.html"
                              >MP3 Players & Speakers</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Games & Consoles</li>
                          <li><a href="index-jewelry.html"> PS4 & PS3</a></li>
                          <li><a href="index-sports.html"> Xbox</a></li>
                          <li><a href="index-sports.html"> Nintendo Wii</a></li>
                          <li><a href="index-sports.html"> Sony PSP</a></li>
                          <li><a href="index-sports.html"> PS Vita</a></li>
                          <li><a href="index-sports.html"> Nintendo 3DS</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Cameras</li>
                          <li>
                            <a href="index-jewelry.html"> Digital Cameras</a>
                          </li>
                          <li>
                            <a href="index-medical.html">
                              Professional & SLR Cameras</a
                            >
                          </li>
                          <li>
                            <a href="index-sports.html">
                              Camcorders & Video Cameras</a
                            >
                          </li>
                          <li>
                            <a href="index-sports.html">
                              Camera Lenses & Accessories</a
                            >
                          </li>
                          <li><a href="index-sports.html"> CCTV Cameras</a></li>
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
                <a href="shop.html">
                  Baby, Kids & Toys <i class="ion-chevron-down"></i>
                </a>
                <ul class="mega-menu">
                  <li>
                    <ul>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Television</li>
                          <li><a href="index.html">Smart TVs</a></li>
                          <li><a href="index-electronics-2.html">LED</a></li>
                          <li><a href="index-electronics-3.html">Plasma</a></li>
                          <li><a href="index-electronics-4.html">Others</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Audio & Sound Systems</li>
                          <li><a href="index.html">Home Theatre</a></li>
                          <li>
                            <a href="index-electronics-2.html">HiFi Systems</a>
                          </li>
                          <li>
                            <a href="index-electronics-3.html"
                              >MP3 Players & Speakers</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Games & Consoles</li>
                          <li><a href="index-jewelry.html"> PS4 & PS3</a></li>
                          <li><a href="index-sports.html"> Xbox</a></li>
                          <li><a href="index-sports.html"> Nintendo Wii</a></li>
                          <li><a href="index-sports.html"> Sony PSP</a></li>
                          <li><a href="index-sports.html"> PS Vita</a></li>
                          <li><a href="index-sports.html"> Nintendo 3DS</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul>
                          <li class="mega-menu-title">Cameras</li>
                          <li>
                            <a href="index-jewelry.html"> Digital Cameras</a>
                          </li>
                          <li>
                            <a href="index-medical.html">
                              Professional & SLR Cameras</a
                            >
                          </li>
                          <li>
                            <a href="index-sports.html">
                              Camcorders & Video Cameras</a
                            >
                          </li>
                          <li>
                            <a href="index-sports.html">
                              Camera Lenses & Accessories</a
                            >
                          </li>
                          <li><a href="index-sports.html"> CCTV Cameras</a></li>
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