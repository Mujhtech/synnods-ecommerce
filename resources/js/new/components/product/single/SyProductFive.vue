<template>
    <div class="col-lg-12">
        <div class="product-list-wrapper shop-border mb-40 pb-40">
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
            </div>
            <div class="product-list-content">
                <span>Watch, Accessories</span>
                <h4>
                    <a href="#">Phantom Remote Control Ver 2018</a>
                </h4>
                <div class="product-rating">
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline theme-star"></i>
                    <i class="ion-android-star-outline"></i>
                </div>
                <div class="product-price-wrapper">
                    <span>$260.00</span>
                    <span class="product-price-old">$162.00 </span>
                </div>
                <p>
                    Mirum est notare quam littera gothica quam putamus parum
                    claram, anteposuerit litterarum formas humanitatis per
                    seacula.
                </p>
                <div class="product-action">
                    <a class="action-cart" href="#" title="Add To Cart">
                        Add to Cart
                    </a>
                    <a class="same-action" href="#" title="Wishlist">
                        <i class="fa fa-heart-o"></i>
                    </a>
                    <a
                        class="same-action compare-mrg"
                        href="#"
                        title="Compare"
                        data-toggle="modal"
                        data-target="#exampleCompare"
                    >
                        <i class="fa fa-sliders fa-rotate-90"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SyProductFive",
    props: {
        product: Object
    }
}
</script>