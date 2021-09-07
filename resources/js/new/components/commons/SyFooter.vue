<template>
  <footer class="footer-area black-bg pt-65">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-30">
              <h4>About Us</h4>
            </div>
            <div class="footer-about">
              <p>
                We are a team of designers and developers that create high
                quality Magento, Prestashop, Opencart [...].
              </p>
              <div class="footer-contact mt-20">
                <ul>
                  <li>Address: 123 Main Street, Anytown, CA 12345 - USA.</li>
                  <li>Telephone Enquiry: (012) 800 456 789-987</li>
                  <li>Email: <a href="#">Contact@example.com</a></li>
                </ul>
              </div>
            </div>
            <div class="social-icon mr-40">
              <ul>
                <li>
                  <a class="facebook" href="#"
                    ><i class="ion-social-facebook"></i
                  ></a>
                </li>
                <li>
                  <a class="twitter" href="#"
                    ><i class="ion-social-twitter"></i
                  ></a>
                </li>
                <li>
                  <a class="instagram" href="#"
                    ><i class="ion-social-instagram-outline"></i
                  ></a>
                </li>
                <li>
                  <a class="googleplus" href="#"
                    ><i class="ion-social-googleplus-outline"></i
                  ></a>
                </li>
                <li>
                  <a class="rss" href="#"><i class="ion-social-rss"></i></a>
                </li>
                <li>
                  <a class="dribbble" href="#"
                    ><i class="ion-social-dribbble-outline"></i
                  ></a>
                </li>
                <li>
                  <a class="vimeo" href="#"><i class="ion-social-vimeo"></i></a>
                </li>
                <li>
                  <a class="pinterest" href="#"
                    ><i class="ion-social-pinterest"></i
                  ></a>
                </li>
                <li>
                  <a class="skype" href="#"
                    ><i class="ion-social-skype-outline"></i
                  ></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-30">
              <h4>Information</h4>
            </div>
            <div class="footer-content">
              <ul>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="#">Delivery Information</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Customer Service</a></li>
                <li><a href="#">Return Policy</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-30">
              <h4>My Account</h4>
            </div>
            <div class="footer-content">
              <ul>
                <li><a href="my-account.html">My Account</a></li>
                <li><a href="about-us.html">Order History</a></li>
                <li><a href="wishlist.html">WishList</a></li>
                <li><a href="#">Newsletter</a></li>
                <li><a href="about-us.html">Order History</a></li>
                <li><a href="#">International Orders</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-30">
              <h4>Join Our Newsletter Now</h4>
            </div>
            <div class="footer-newsletter">
              <p>
                Get E-mail updates about our latest shop and special offers.
              </p>
              <div id="mc_embed_signup" class="subscribe-form-2">
                <form
                  method="post"
                  id="mc-embedded-subscribe-form"
                  name="mc-embedded-subscribe-form"
                  class="validate"
                  v-on:submit.prevent="subscribe"
                  novalidate
                >
                  <div id="mc_embed_signup_scroll" class="mc-form">
                    <input
                      type="email"
                      value=""
                      name="EMAIL"
                      class="email"
                      v-model="email"
                      placeholder="Your Email Address..."
                      required
                    />
                    <div class="clear-2">
                      <input
                        type="submit"
                        value="Subscribe"
                        name="subscribe"
                        id="subscribe"
                        class="button"
                      />
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="shop-service-wrapper black-bg-2 mt-15">
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
    <div class="container">
      <div class="pt-60 pb-65">
        <div class="row">
          <div class="col-12">
            <div class="footer-middle text-center">
              <div class="footer-tag">
                <ul>
                  <li><a href="#">Online Shopping </a></li>
                  <li><a href="#">Promotions </a></li>
                  <li><a href="#">My Orders </a></li>
                  <li><a href="#">Help </a></li>
                  <li><a href="#">Customer Service </a></li>
                  <li><a href="#">Support </a></li>
                  <li><a href="#">Most Populars </a></li>
                  <li><a href="#">New Arrivals </a></li>
                  <li><a href="#">Special Products </a></li>
                  <li><a href="#">Manufacturers </a></li>
                  <li><a href="#">Our Stores </a></li>
                  <li><a href="#">Shipping </a></li>
                  <li><a href="#">Payments </a></li>
                  <li><a href="#">Warantee </a></li>
                  <li><a href="#">Refunds </a></li>
                  <li><a href="#">Checkout </a></li>
                  <li><a href="#">Discount </a></li>
                  <li><a href="#">Terms & Conditions </a></li>
                  <li><a href="#">Policy Shipping </a></li>
                  <li><a href="#">Returns </a></li>
                  <li><a href="#">Refunds</a></li>
                </ul>
              </div>
              <div class="payment-icon mt-20">
                <a href="#">
                  <img src="assets/img/icon-img/payment.png" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom black-bg-2 pb-25 pt-25">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="copyright text-center">
              <p>Copyright © <a href="#">Faadaakaa</a>. All Right Reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>


<script>
import PreLoader from './PreLoader';
import { subscribe as service } from '../../../services/setting';
import { mapActions } from 'vuex';
export default {
  data: function() {
    return {
      email: "",
      loading: false
    }
  },
  components: {
    PreLoader
  },
  methods: {
    ...mapActions( 'notification', [ 'addNotification' ] ),
    subscribe: async function(){
      try{
        this.loading = true;
        const response = await service({email: this.email});
        this.loading = false;
        console.log(response);
        this.email = "";
        this.addNotification({type: 'success', messsage: response.data.data.message});
      } catch(e){
        this.loading = false;
        this.email = "";
        console.log(e.response);
        this.addNotification({type: 'error', message: e.response.data.data ? e.response.data.data.message: 'Something went wrong'});
      }
    }
  }
}
</script>