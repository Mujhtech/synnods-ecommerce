<template>
    <div>
        <sy-breadcrumb></sy-breadcrumb>
        <div class="shop-page-area pt-30 pb-65">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="banner-area pb-30">
                            <a href="#"
                                ><img
                                    alt=""
                                    src="assets/img/banner/banner-49.jpg"
                            /></a>
                        </div>
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                                <div class="grid-list-options nav view-mode">
                                    <a
                                        class="active"
                                        href="#product-grid"
                                        data-view="product-grid"
                                        data-bs-toggle="tab"
                                        ><i class="fa fa-th"></i
                                    ></a>
                                    <a
                                        href="#product-list"
                                        data-view="product-list"
                                        data-bs-toggle="tab"
                                        ><i class="fa fa-list-ul"></i
                                    ></a>
                                </div>
                                <p>Showing 1 - 20 of 30 results</p>
                            </div>
                            <div class="product-sorting-wrapper">
                                <div class="product-shorting shorting-style">
                                    <label>View:</label>
                                    <select>
                                        <option value=""> 20</option>
                                        <option value=""> 23</option>
                                        <option value=""> 30</option>
                                    </select>
                                </div>
                                <div class="product-show shorting-style">
                                    <label>Sort by:</label>
                                    <select>
                                        <option value="">Default</option>
                                        <option value=""> Name</option>
                                        <option value=""> price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content jump">
                            <div
                                class="tab-pane active pb-20"
                                id="product-grid"
                            >
                                <div class="row">
                                    <sy-product-four></sy-product-four>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-list">
                                <div class="row">
                                    <sy-product-five></sy-product-five>
                                </div>
                            </div>
                            <div class="pagination-total-pages">
                                <div class="pagination-style">
                                    <ul>
                                        <li>
                                            <a class="prev-next prev" href="#"
                                                ><i
                                                    class="ion-ios-arrow-left"
                                                ></i>
                                                Prev</a
                                            >
                                        </li>
                                        <li>
                                            <a class="active" href="#">1</a>
                                        </li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li>
                                            <a class="prev-next next" href="#"
                                                >Next<i
                                                    class="ion-ios-arrow-right"
                                                ></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="total-pages">
                                    <p>Showing 1 - 20 of 30 results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div
                            class="shop-sidebar-wrapper gray-bg-7 mrg-top-md mrg-top-sm"
                        >
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">
                                    Shop By Categories
                                </h4>
                                <div class="shop-catigory">
                                    <ul id="faq">
                                        <li>
                                            <a
                                                data-bs-toggle="collapse"
                                                href="#shop-catigory-1"
                                                >Laptop & Computer
                                                <i
                                                    class="ion-ios-arrow-down"
                                                ></i
                                            ></a>
                                            <ul
                                                id="shop-catigory-1"
                                                class="panel-collapse collapse show"
                                                data-bs-parent="#faq"
                                            >
                                                <li>
                                                    <a href="#">Accessories</a>
                                                </li>
                                                <li>
                                                    <a href="#">Bags & Cases</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Binoculars & Scopes</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Digital Cameras</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Film Photography</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a
                                                data-bs-toggle="collapse"
                                                href="#shop-catigory-2"
                                                >Living room
                                                <i
                                                    class="ion-ios-arrow-down"
                                                ></i
                                            ></a>
                                            <ul
                                                id="shop-catigory-2"
                                                class="panel-collapse collapse"
                                                data-bs-parent="#faq"
                                            >
                                                <li>
                                                    <a href="#">Accessories</a>
                                                </li>
                                                <li>
                                                    <a href="#">Bags & Cases</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Binoculars & Scopes</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Digital Cameras</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Film Photography</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a
                                                data-bs-toggle="collapse"
                                                href="#shop-catigory-3"
                                                >Lighting Furniture
                                                <i
                                                    class="ion-ios-arrow-down"
                                                ></i
                                            ></a>
                                            <ul
                                                id="shop-catigory-3"
                                                class="panel-collapse collapse"
                                                data-bs-parent="#faq"
                                            >
                                                <li>
                                                    <a href="#">Accessories</a>
                                                </li>
                                                <li>
                                                    <a href="#">Bags & Cases</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Binoculars & Scopes</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Digital Cameras</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        >Film Photography</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Outdoor</a></li>
                                        <li><a href="#">Tablets</a></li>
                                        <li><a href="#">Accessories</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="shop-price-filter mt-40 shop-sidebar-border pt-35"
                            >
                                <h4 class="shop-sidebar-title">Price Filter</h4>
                                <div class="price_filter mt-25">
                                    <span>Range: $100.00 - 1.300.00 </span>
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <input
                                                type="text"
                                                id="amount"
                                                name="price"
                                                placeholder="Add Your Price"
                                            />
                                        </div>
                                        <button type="button">Filter</button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="shop-widget mt-40 shop-sidebar-border pt-35"
                            >
                                <h4 class="shop-sidebar-title">By Brand</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Samsung
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Panasonic
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Electrolux
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >LG
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Calvin Klein
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Diesel
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Polo
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Tommy Hilfiger
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="shop-widget mt-40 shop-sidebar-border pt-35"
                            >
                                <h4 class="shop-sidebar-title">By Color</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Black
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Blue
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Green
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Grey
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Red</a
                                            >
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >White
                                            </a>
                                        </li>
                                        <li>
                                            <input type="checkbox" /><a href="#"
                                                >Yellow
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="shop-widget mt-40 shop-sidebar-border pt-35"
                            >
                                <h4 class="shop-sidebar-title">
                                    Compare Products
                                </h4>
                                <div class="compare-product">
                                    <p>You have no item to compare.</p>
                                    <div class="compare-product-btn">
                                        <span>Clear all </span>
                                        <a href="#"
                                            >Compare <i class="fa fa-check"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="shop-widget mt-40 shop-sidebar-border pt-35"
                            >
                                <h4 class="shop-sidebar-title">Popular Tags</h4>
                                <div class="shop-tags mt-25">
                                    <ul>
                                        <li><a href="#">Computer</a></li>
                                        <li><a href="#">Cameras</a></li>
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">Big Sale</a></li>
                                        <li><a href="#">Sony</a></li>
                                        <li><a href="#">Devita</a></li>
                                    </ul>
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
import SyBreadcrumb from "../../components/commons/SyBreadcrumb";
import * as catService from "../../../services/category";
import { fetchProduct } from "../../../services/product";
import SyProductFour from '../../components/product/single/SyProductFour';
import SyProductFive from '../../components/product/single/SyProductFive';

export default {
    components: { SyBreadcrumb, SyProductFour, SyProductFive },
    name: "Shop",
    metaInfo: {
        title: "Shop",
        titleTemplate: "%s - Synoods Ecommerce"
    },
    data: function() {
        return {
            categoryList: [],
            featuredProducts: [],
            isSticky: false
        };
    },
    mounted: function() {
        this.getCategoryLists();
        this.getProduct();
    },
    destroyed: function() {
    },
    methods: {
        getCategoryLists: async function() {
            try {
                const response = await catService.category();
                this.categoryList = response.data.data.data;
                //console.log(response);
            } catch (err) {
                console.log(err.response);
            }
        },
        getProduct: async function() {
            try {
                const response = await fetchProduct();
                this.featuredProducts = response.data.data.data;
                //console.log(response);
            } catch (err) {
                console.log(err.response);
            }
        },
    }
};
</script>
