<template>
  <div>
    <sy-breadcrumb :title="product.name"></sy-breadcrumb>
    <div class="product-details pt-65 pb-65">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="product-details-img">
              <div class="zoompro-wrap zoompro-2 pr-20">
                <div class="zoompro-border zoompro-span">
                  <img
                    class="zoompro"
                    :src="`${product.featured_image}`"
                    :data-zoom-image="`${product.featured_image}`"
                    alt="zoom"
                  />
                  <span>-29%</span>
                  <div class="product-video">
                    <a
                      class="video-popup"
                      href="https://www.youtube.com/watch?v=tce_Ap96b0c"
                    >
                      <i class="fa fa-video-camera"></i>
                      View Video
                    </a>
                  </div>
                </div>
              </div>
              <div
                id="gallery"
                class="product-dec-slider-2 product-dec-right mt-15"
              >
                <a
                  :data-image="`${product.featured_image}`"
                  :data-zoom-image="`${product.featured_image}`"
                >
                  <img
                    :src="`${product.featured_image}`"
                    alt=""
                  />
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="product-details-content">
              <h4>Phantom Remote Control Ver 2018</h4>
              <div class="rating-review">
                <div class="pro-dec-rating">
                  <i class="ion-android-star-outline theme-star"></i>
                  <i class="ion-android-star-outline theme-star"></i>
                  <i class="ion-android-star-outline theme-star"></i>
                  <i class="ion-android-star-outline theme-star"></i>
                  <i class="ion-android-star-outline"></i>
                </div>
                <div class="pro-dec-review">
                  <ul>
                    <li>{{product.reviews.length}} Reviews</li>
                    <li>Add Your Reviews</li>
                  </ul>
                </div>
              </div>
              <span>$260.00</span>
              <div class="in-stock">
                <p>Available: <span>In stock</span></p>
              </div>
              <p>
                {{product.description}}
              </p>
              <div class="quality-add-to-cart">
                <div class="quality">
                  <label>Qty:</label>
                  <input
                    class="cart-plus-minus-box"
                    type="text"
                    name="qtybutton"
                    value="02"
                  />
                </div>
                <div class="product-action">
                  <a class="action-cart" title="Add To Cart" href="#">
                    Add to Cart
                  </a>
                  <a class="same-action" title="Wishlist" href="#">
                    <i class="fa fa-heart-o"></i>
                  </a>
                  <a
                    class="same-action compare-mrg"
                    data-target="#exampleCompare"
                    data-toggle="modal"
                    title="Compare"
                    href="#"
                  >
                    <i class="fa fa-sliders fa-rotate-90"></i>
                  </a>
                </div>
              </div>
              <div class="pro-dec-categories">
                <ul>
                  <li class="categories-title">Categories:</li>
                  <li><router-link
              :to="{
                path: '/shop',
                query: { category: product.category.slug },
              }"
              >{{ product.category.name }}</router-link
            >,
            <router-link
              :to="{
                path: '/shop',
                query: { sub_category: product.sub_category.slug },
              }"
              >{{ product.sub_category.name }}</router-link
            ></li>
                </ul>
              </div>
              <div class="pro-dec-categories">
                <ul>
                  <li class="categories-title">Tags:</li>
                  <li><a href="#">Plazatheme,</a></li>
                </ul>
              </div>
              <div class="pro-dec-social">
                <ul>
                  <li>
                    <a class="tweet" href="#"
                      ><i class="ion-social-twitter"></i> Tweet</a
                    >
                  </li>
                  <li>
                    <a class="share" href="#"
                      ><i class="ion-social-facebook"></i> Share</a
                    >
                  </li>
                  <li>
                    <a class="google" href="#"
                      ><i class="ion-social-googleplus-outline"></i> Google+</a
                    >
                  </li>
                  <li>
                    <a class="pinterest" href="#"
                      ><i class="ion-social-pinterest"></i> Pinterest</a
                    >
                  </li>
                </ul>
              </div>
              <div class="pro-dec-btn">
                <a href="#"><i class="fa fa-angle-left"></i></a>
                <a href="#"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="description-review-area pt-25 pb-70">
      <div class="container">
        <div class="description-review-wrapper">
          <div class="description-review-topbar nav text-center">
            <a class="active" data-bs-toggle="tab" href="#des-details1"
              >Description</a
            >
            <a data-bs-toggle="tab" href="#des-details2">Tags</a>
            <a data-bs-toggle="tab" href="#des-details3">Review</a>
          </div>
          <div class="tab-content description-review-bottom">
            <div id="des-details1" class="tab-pane active">
              <div class="product-description-wrapper">
                <p>
                  {{product.contents}}
                </p>
              </div>
            </div>
            <div id="des-details2" class="tab-pane">
              <div class="product-anotherinfo-wrapper">
                <ul>
                  <li><span>Tags:</span></li>
                  <li><a href="#"> Fashion,</a></li>
                  <li><a href="#"> Office Furniture,</a></li>
                  <li><a href="#"> Sports,</a></li>
                  <li><a href="#"> Jewelry,</a></li>
                  <li><a href="#"> watch</a></li>
                </ul>
              </div>
            </div>
            <div id="des-details3" class="tab-pane">
              <div class="rattings-wrapper">
                <div class="sin-rattings">
                  <div class="star-author-all">
                    <div class="ratting-star f-left">
                      <i class="ion-star theme-color"></i>
                      <i class="ion-star theme-color"></i>
                      <i class="ion-star theme-color"></i>
                      <i class="ion-star theme-color"></i>
                      <i class="ion-star theme-color"></i>
                      <span>(5)</span>
                    </div>
                    <div class="ratting-author f-right">
                      <h3>tayeb rayed</h3>
                      <span>12:24</span>
                      <span>9 March 2018</span>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Utenim ad minim veniam, quis nost rud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Utenim ad minim veniam, quis nost.
                  </p>
                </div>
                <div class="sin-rattings">
                  <div class="star-author-all">
                    <div class="ratting-star f-left">
                      <i class="ion-star theme-color"></i>
                      <i class="ion-star theme-color"></i>
                      <i class="ion-star theme-color"></i>
                      <i class="ion-star theme-color"></i>
                      <i class="ion-star theme-color"></i>
                      <span>(5)</span>
                    </div>
                    <div class="ratting-author f-right">
                      <h3>farhana shuvo</h3>
                      <span>12:24</span>
                      <span>9 March 2018</span>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Utenim ad minim veniam, quis nost rud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Utenim ad minim veniam, quis nost.
                  </p>
                </div>
              </div>
              <div class="ratting-form-wrapper">
                <h3>Add your Comments :</h3>
                <div class="ratting-form">
                  <form action="#">
                    <div class="star-box">
                      <h2>Rating:</h2>
                      <div class="ratting-star">
                        <i class="ion-star theme-color"></i>
                        <i class="ion-star theme-color"></i>
                        <i class="ion-star theme-color"></i>
                        <i class="ion-star theme-color"></i>
                        <i class="ion-star"></i>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="rating-form-style mb-20">
                          <input placeholder="Name" type="text" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="rating-form-style mb-20">
                          <input placeholder="Email" type="text" />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="rating-form-style form-submit">
                          <textarea
                            name="message"
                            placeholder="Message"
                          ></textarea>
                          <input type="submit" value="add review" />
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-area pb-45">
      <div class="container">
        <div class="section-border mb-10">
          <h4 class="section-title section-bg-white">Related Products</h4>
        </div>
        <div class="product-slider-nav nav-style"></div>
        <div
          class="headphone-slider-active product-slider owl-carousel nav-style"
        >
          <div class="devita-product-2">
            <div class="product-img">
              <a href="product-details.html">
                <img src="assets/img/product/headphone-1.jpg" alt="" />
              </a>
            </div>
            <div class="list-col">
              <div class="gridview">
                <div class="product-content text-center">
                  <span>Headphone, Accessories</span>
                  <h4>
                    <a href="product-details.html"
                      >Matrior white Headphone Ver 2018
                    </a>
                  </h4>
                  <div class="product-price-wrapper">
                    <span>$260.00</span>
                  </div>
                </div>
                <div class="product-action-wrapper-2 text-center">
                  <div class="product-rating">
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline"></i>
                  </div>
                  <p>
                    Quam elit phasellus nibh sed eget, sed nunc in ultricies
                    sodales sapien, non velit scelerisque...
                  </p>
                  <div class="product-action">
                    <a class="same-action" title="Wishlist" href="#">
                      <i class="fa fa-heart-o"></i>
                    </a>
                    <a
                      class="action-cart"
                      title="Quick View"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      href="#"
                    >
                      Add to Cart
                    </a>
                    <a
                      class="same-action compare-mrg"
                      data-target="#exampleCompare"
                      data-toggle="modal"
                      title="Compare"
                      href="#"
                    >
                      <i class="fa fa-sliders fa-rotate-90"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="devita-product-2">
            <div class="product-img">
              <a href="product-details.html">
                <img src="assets/img/product/headphone-2.jpg" alt="" />
              </a>
              <span>-30%</span>
            </div>
            <div class="list-col">
              <div class="gridview">
                <div class="product-content text-center">
                  <span>Headphone, Accessories</span>
                  <h4>
                    <a href="product-details.html"
                      >Matrior black Headphone Ver 2018</a
                    >
                  </h4>
                  <div class="product-price-wrapper">
                    <span>$260.00</span>
                    <span class="product-price-old">$162.00 </span>
                  </div>
                </div>
                <div class="product-action-wrapper-2 text-center">
                  <div class="product-rating">
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline"></i>
                  </div>
                  <p>
                    Quam elit phasellus nibh sed eget, sed nunc in ultricies
                    sodales sapien, non velit scelerisque...
                  </p>
                  <div class="product-action">
                    <a class="same-action" title="Wishlist" href="#">
                      <i class="fa fa-heart-o"></i>
                    </a>
                    <a
                      class="action-cart"
                      title="Quick View"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      href="#"
                    >
                      Add to Cart
                    </a>
                    <a
                      class="same-action compare-mrg"
                      data-target="#exampleCompare"
                      data-toggle="modal"
                      title="Compare"
                      href="#"
                    >
                      <i class="fa fa-sliders fa-rotate-90"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="devita-product-2">
            <div class="product-img">
              <a href="product-details.html">
                <img src="assets/img/product/headphone-3.jpg" alt="" />
              </a>
            </div>
            <div class="list-col">
              <div class="gridview">
                <div class="product-content text-center">
                  <span>Headphone, Accessories</span>
                  <h4>
                    <a href="product-details.html"
                      >Matrior blue Headphone Ver 2018</a
                    >
                  </h4>
                  <div class="product-price-wrapper">
                    <span>$300.00</span>
                  </div>
                </div>
                <div class="product-action-wrapper-2 text-center">
                  <div class="product-rating">
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline"></i>
                  </div>
                  <p>
                    Quam elit phasellus nibh sed eget, sed nunc in ultricies
                    sodales sapien, non velit scelerisque...
                  </p>
                  <div class="product-action">
                    <a class="same-action" title="Wishlist" href="#">
                      <i class="fa fa-heart-o"></i>
                    </a>
                    <a
                      class="action-cart"
                      title="Quick View"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      href="#"
                    >
                      Add to Cart
                    </a>
                    <a
                      class="same-action compare-mrg"
                      data-target="#exampleCompare"
                      data-toggle="modal"
                      title="Compare"
                      href="#"
                    >
                      <i class="fa fa-sliders fa-rotate-90"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="devita-product-2">
            <div class="product-img">
              <a href="product-details.html">
                <img src="assets/img/product/headphone-4.jpg" alt="" />
              </a>
              <span>-10%</span>
            </div>
            <div class="list-col">
              <div class="gridview">
                <div class="product-content text-center">
                  <span>Headphone, Accessories</span>
                  <h4>
                    <a href="product-details.html"
                      >Matrior black Headphone Ver 2018</a
                    >
                  </h4>
                  <div class="product-price-wrapper">
                    <span>$120.00</span>
                    <span class="product-price-old">$150.00 </span>
                  </div>
                </div>
                <div class="product-action-wrapper-2 text-center">
                  <div class="product-rating">
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline"></i>
                  </div>
                  <p>
                    Quam elit phasellus nibh sed eget, sed nunc in ultricies
                    sodales sapien, non velit scelerisque...
                  </p>
                  <div class="product-action">
                    <a class="same-action" title="Wishlist" href="#">
                      <i class="fa fa-heart-o"></i>
                    </a>
                    <a
                      class="action-cart"
                      title="Quick View"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      href="#"
                    >
                      Add to Cart
                    </a>
                    <a
                      class="same-action compare-mrg"
                      data-target="#exampleCompare"
                      data-toggle="modal"
                      title="Compare"
                      href="#"
                    >
                      <i class="fa fa-sliders fa-rotate-90"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="devita-product-2">
            <div class="product-img">
              <a href="product-details.html">
                <img src="assets/img/product/headphone-5.jpg" alt="" />
              </a>
            </div>
            <div class="list-col">
              <div class="gridview">
                <div class="product-content text-center">
                  <span>Headphone, Accessories</span>
                  <h4>
                    <a href="product-details.html"
                      >Matrior white Headphone Ver 2018</a
                    >
                  </h4>
                  <div class="product-price-wrapper">
                    <span>$190.00</span>
                  </div>
                </div>
                <div class="product-action-wrapper-2 text-center">
                  <div class="product-rating">
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline"></i>
                  </div>
                  <p>
                    Quam elit phasellus nibh sed eget, sed nunc in ultricies
                    sodales sapien, non velit scelerisque...
                  </p>
                  <div class="product-action">
                    <a class="same-action" title="Wishlist" href="#">
                      <i class="fa fa-heart-o"></i>
                    </a>
                    <a
                      class="action-cart"
                      title="Quick View"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      href="#"
                    >
                      Add to Cart
                    </a>
                    <a
                      class="same-action compare-mrg"
                      data-target="#exampleCompare"
                      data-toggle="modal"
                      title="Compare"
                      href="#"
                    >
                      <i class="fa fa-sliders fa-rotate-90"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="devita-product-2">
            <div class="product-img">
              <a href="product-details.html">
                <img src="assets/img/product/headphone-2.jpg" alt="" />
              </a>
              <span>-15%</span>
            </div>
            <div class="list-col">
              <div class="gridview">
                <div class="product-content text-center">
                  <span>Headphone, Accessories</span>
                  <h4>
                    <a href="product-details.html"
                      >Matrior black Headphone Ver 2018</a
                    >
                  </h4>
                  <div class="product-price-wrapper">
                    <span>$260.00</span>
                    <span class="product-price-old">$162.00 </span>
                  </div>
                </div>
                <div class="product-action-wrapper-2 text-center">
                  <div class="product-rating">
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline"></i>
                  </div>
                  <p>
                    Quam elit phasellus nibh sed eget, sed nunc in ultricies
                    sodales sapien, non velit scelerisque...
                  </p>
                  <div class="product-action">
                    <a class="same-action" title="Wishlist" href="#">
                      <i class="fa fa-heart-o"></i>
                    </a>
                    <a
                      class="action-cart"
                      title="Quick View"
                      data-toggle="modal"
                      data-target="#exampleModal"
                      href="#"
                    >
                      Add to Cart
                    </a>
                    <a
                      class="same-action compare-mrg"
                      data-target="#exampleCompare"
                      data-toggle="modal"
                      title="Compare"
                      href="#"
                    >
                      <i class="fa fa-sliders fa-rotate-90"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SyBreadcrumb from '../../components/commons/SyBreadcrumb.vue';
import { fetchSingle } from "../../../services/product";

export default {
    name: "Product",
    components: {
        SyBreadcrumb
    },
  data: function () {
    return {
      product: null,
      relatedProducts: null,
      featuredProducts: null,
      bestProducts: null,
      latestProducts: null,
      topRatedProducts: null,
      nextProduct: null,
      prevProduct: null,
      loaded: false,
      productCategory: [],
    };
  },
  created: function () {
    this.getProduct();
  },
  methods: {
    getProduct: async function () {
      this.loaded = false;

      try {
        const response = await fetchSingle(this.$route.params.slug);
        this.product = response.data.data.data;
        /* this.relatedProducts = response.data.relatedProducts;
        this.featuredProducts = response.data.featuredProducts;
        this.bestProducts = response.data.bestSellingProducts;
        this.latestProducts = response.data.latestProducts;
        this.topRatedProducts = response.data.topRatedProducts;
        this.prevProduct = response.data.prevProduct;
        this.nextProduct = response.data.nextProduct;

        this.product.product_categories.map((item) => {
          this.productCategory.push(item);
        });*/
        this.loaded = true;
        console.log(response);
      } catch (err) {
        console.log(err.response);
      }
    },
  },
};
</script>