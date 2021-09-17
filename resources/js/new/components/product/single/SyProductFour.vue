<template>
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
        <div class="devita-product-2 mrg-inherit">
            <div class="product-img">
                <div class="product-img-slider">
                    <a href="product-details.html"
                        ><img src="assets/img/product/product-1.jpg" alt=""
                    /></a>
                    <a href="product-details.html"
                        ><img src="assets/img/product/product-2.jpg" alt=""
                    /></a>
                    <a href="product-details.html"
                        ><img src="assets/img/product/product-3.jpg" alt=""
                    /></a>
                </div>
                <span>-29%</span>
            </div>
            <div class="list-col">
                <div class="gridview">
                    <div class="product-content text-center">
                        <span>Remote, Accessories</span>
                        <h4>
                            <a href="product-details.html"
                                >Phantom Remote Control Ver 2018</a
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
                            Quam elit phasellus nibh sed eget, sed nunc in
                            ultricies sodales sapien, non velit scelerisque...
                        </p>
                        <div class="product-action">
                            <a class="same-action" title="Wishlist" href="#">
                                <i class="fa fa-heart-o"></i>
                            </a>
                            <a class="action-cart" title="Add To Cart" href="#">
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
</template>

<script>
export default {
    name: "SyProductFour",
    props: {
        product: Object
    }
}
</script>