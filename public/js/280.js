"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[280],{4280:(t,e,i)=>{i.r(e),i.d(e,{default:()=>w});var s=i(4901),r=i(3828),a=i.n(r),c=i(1450),n=i(7744);i(7917);function o(t){return function(t){if(Array.isArray(t))return l(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return l(t,e);var i=Object.prototype.toString.call(t).slice(8,-1);"Object"===i&&t.constructor&&(i=t.constructor.name);if("Map"===i||"Set"===i)return Array.from(t);if("Arguments"===i||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(i))return l(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function l(t,e){(null==e||e>t.length)&&(e=t.length);for(var i=0,s=new Array(e);i<e;i++)s[i]=t[i];return s}const u={components:{PvCarousel:s.Z,LightBox:a()},props:{product:Object,isMagnify:{type:Boolean,default:!0}},data:function(){return{baseSlider1:n.sA,baseSlider2:n.u_,baseUrl:c.FH}},computed:{lightBoxMedia:function(){return this.product.large_pictures.reduce((function(t,e){return[].concat(o(t),[{src:"".concat(c.FH).concat(e.url),thumb:"".concat(c.FH).concat(e.url)}])}),[])}},mounted:function(){var t=this;null!==this.product&&this.$nextTick((function(){var e=t;t.$refs.mediaRef.swiper.on("transitionStart",(function(){var t=e.$refs.mediaRef.swiper.activeIndex;e.$refs.thumbRef.swiper.slideTo(t),e.$refs.thumbRef.swiper.$el.find(".swiper-wrapper").find(".swiper-dot.active")[0].classList.remove("active"),e.$refs.thumbRef.swiper.$el.find(".swiper-wrapper").find(".swiper-dot")[t].classList.add("active")}))}))},methods:{activeThumbItem:function(t,e){e.currentTarget.parentNode.querySelector(".swiper-dot.active").classList.remove("active"),e.currentTarget.classList.add("active"),this.$refs.mediaRef.swiper.slideTo(t)},openLightBox:function(){this.$refs.lightBox.showImage(this.$refs.mediaRef.swiper.activeIndex)}}};var d=i(1900);const p=(0,d.Z)(u,(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[i("div",{staticClass:"product-slider-container"},[i("div",{staticClass:"label-group"},[t.product.is_hot?i("div",{staticClass:"product-label label-hot"},[t._v("HOT")]):t._e(),t._v(" "),t.product.is_sale?i("div",{staticClass:"product-label label-sale"},[t._v("Sale")]):t._e()]),t._v(" "),i("PvCarousel",{ref:"mediaRef",staticClass:"product-single-carousel show-nav-hover",attrs:{options:t.baseSlider1}},t._l(t.product.large_pictures,(function(e){return i("div",{key:e.name,staticClass:"swiper-slide"},[i("img",{directives:[{name:"lazy",rawName:"v-lazy",value:""+t.baseUrl+e.url,expression:"`${baseUrl}${item.url}`"}],staticClass:"product-single-image",attrs:{width:e.width,height:e.height,alt:"lgPicture"}})])})),0),t._v(" "),t.isMagnify?i("span",{staticClass:"prod-full-screen",on:{click:t.openLightBox}},[i("i",{staticClass:"icon-plus"})]):t._e()],1),t._v(" "),i("PvCarousel",{ref:"thumbRef",staticClass:"prod-thumbnail swiper-dots show-nav-hover",attrs:{options:t.baseSlider2}},t._l(t.product.pictures,(function(e,s){return i("div",{key:"media-one"+s,staticClass:"swiper-dot swiper-slide",class:{active:0===s},on:{click:function(e){return t.activeThumbItem(s,e)}}},[i("img",{directives:[{name:"lazy",rawName:"v-lazy",value:""+t.baseUrl+e.url,expression:"`${baseUrl}${item.url}`"}],attrs:{width:e.width,height:e.height,alt:"product-thumbnail"}})])})),0),t._v(" "),i("light-box",{ref:"lightBox",attrs:{media:t.lightBoxMedia,"show-light-box":!1}})],1)}),[],!1,null,null,null).exports;var h=i(629),v=i(5007);const m={props:{prevProduct:Object,nextProduct:Object},data:function(){return{baseUrl:c.FH,type:"default"}},mounted:function(){var t=this.$route.path.split("/");this.type=t[t.length-2];["simple","variable","sale","featured"].includes(this.type)&&(this.type="default")}};const f=(0,d.Z)(m,(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"product-nav"},[i("div",{staticClass:"product-prev",class:{disabled:!t.prevProduct}},[t.prevProduct?i("router-link",{key:"toPrevProduct",attrs:{to:"/product/"+t.type+"/"+t.prevProduct.slug}},[i("span",{staticClass:"product-link"}),t._v(" "),i("span",{staticClass:"product-popup"},[i("span",{staticClass:"box-content"},[i("img",{staticStyle:{"padding-top":"0px"},attrs:{alt:"product",width:t.prevProduct.width,height:t.prevProduct.height,src:""+t.baseUrl+t.prevProduct.pictures[0].url}}),t._v(" "),i("span",[t._v(t._s(t.prevProduct.name))])])])]):i("a",{attrs:{href:"javascript:;"}},[i("span",{staticClass:"product-link"})])],1),t._v(" "),i("div",{staticClass:"product-next",class:{disabled:!t.nextProduct}},[t.nextProduct?i("router-link",{key:"toNexProduct",attrs:{to:"/product/"+t.type+"/"+t.nextProduct.slug}},[i("span",{staticClass:"product-link"}),t._v(" "),i("span",{staticClass:"product-popup"},[i("span",{staticClass:"box-content"},[i("img",{staticStyle:{"padding-top":"0px"},attrs:{alt:"product",width:t.nextProduct.width,height:t.nextProduct.height,src:""+t.baseUrl+t.nextProduct.pictures[0].url}}),t._v(" "),i("span",[t._v(t._s(t.nextProduct.name))])])])]):i("a",{attrs:{href:"javascript:;"}},[i("span",{staticClass:"product-link"})])],1)])}),[],!1,null,null,null).exports;var _=i(5346);function g(t,e){var i=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);e&&(s=s.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),i.push.apply(i,s)}return i}function C(t){for(var e=1;e<arguments.length;e++){var i=null!=arguments[e]?arguments[e]:{};e%2?g(Object(i),!0).forEach((function(e){b(t,e,i[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(i)):g(Object(i)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(i,e))}))}return t}function b(t,e,i){return e in t?Object.defineProperty(t,e,{value:i,enumerable:!0,configurable:!0,writable:!0}):t[e]=i,t}const y={components:{VueSlideToggle:v.H,PvProductNav:f,PvQuantityInput:_.Z},props:{product:Object,prevProduct:Object,nextProduct:Object,isProductNav:{type:Boolean,default:!0}},data:function(){return{minPrice:0,maxPrice:0,qty:1,currentIndex:0,baseUrl:c.FH,vSizes:[],vColors:[],curSize:{name:null,text:null,image:null},curColor:{name:null,text:null,image:null},tIndex:0,isShare:{type:Boolean,default:!0}}},watch:{$route:function(){this.getFlag()}},computed:C(C({},(0,h.Se)("wishlist",["wishList"])),{},{curIndex:function(){var t=this;if(null!==this.curColor.name&&0===this.vSizes.length){var e=this.product.variants.findIndex((function(e){return e.colors[0].color_name===t.curColor.name}));return this.tIndex=e,e}if(null!==this.curSize.name&&0===this.vColors.length){var i=this.product.variants.findIndex((function(e){return e.size[0].size_name===t.curSize.name}));return this.tIndex=i,i}if(null!==this.curColor.name&&null!==this.curSize.name){var s=this.product.variants.findIndex((function(e){return e.colors[0].color_name===t.curColor.name&&e.size[0].size_name===t.curSize.name}));return this.tIndex=s,s}return this.tIndex},isCartActive:function(){return!(this.product.stock<parseInt(this.qty))&&(0===this.product.variants.length||(null!==this.curSize.name&&null!==this.curColor.name||(null!==this.curColor.name&&0===this.vSizes.length||null!==this.curSize.name&&0===this.vColors.length)))},isWishlisted:function(){var t=this;return this.wishList.findIndex((function(e){return e.name===t.product.name}))>-1},isPriceShow:function(){return null!==this.curSize.name&&null!==this.curColor.name||(null!==this.curColor.name&&0===this.vSizes.length||null!==this.curSize.name&&0===this.vColors.length)}}),created:function(){this.getFlag()},mounted:function(){var t=this;this.product.variants&&!this.product.price&&(this.minPrice=this.product.variants[0].price,this.product.variants.forEach((function(e){var i=e.sale_price?e.sale_price:e.price;t.minPrice>i&&(t.minPrice=i),t.maxPrice<i&&(t.maxPrice=i)}))),this.product.variants.length>0&&(this.product.variants[0].size[0]&&this.product.variants.forEach((function(e){-1===t.vSizes.findIndex((function(t){return t.name===e.size[0].size_name}))&&t.vSizes.push({name:e.size[0].size_name,text:e.size[0].size,image:e.size[0].size_thumbnail})})),this.product.variants[0].colors[0]&&this.product.variants.forEach((function(e){-1===t.vColors.findIndex((function(t){return t.name===e.colors[0].color_name}))&&t.vColors.push({name:e.colors[0].color_name,text:e.colors[0].color,image:e.colors[0].color_thumbnail})})))},methods:C(C(C({},(0,h.nv)("cart",["addToCart"])),(0,h.nv)("wishlist",["addToWishlist"])),{},{addCart:function(){if(this.isCartActive){var t,e,i;if(this.product.variants.length>0)e=this.product.price?this.product.sale_price?this.product.sale_price:this.product.price:this.product.variants[this.curIndex].sale_price?this.product.variants[this.curIndex].sale_price:this.product.variants[this.curIndex].price,this.curColor.name&&this.curSize.name&&(i=this.curColor.name.charAt(0).toUpperCase()+this.curColor.name.slice(1)+", "+this.curSize.name),this.curColor.name||(i=this.curSize.name),this.curSize.name||(i=this.curColor.name.charAt(0).toUpperCase()+this.curColor.name.slice(1)),t=C(C({},this.product),{},{qty:this.qty,name:this.product.name+" - "+i,price:e});else t=C(C({},this.product),{},{qty:this.qty,price:this.product.sale_price?this.product.sale_price:this.product.price});this.addToCart({product:t})}},addWishlist:function(t){var e=this;t.currentTarget.classList.add("load-more-overlay","loading"),setTimeout((function(){e.addToWishlist({product:e.product}),document.querySelector(".wishlist-popup").classList.add("active"),setTimeout((function(){document.querySelector(".wishlist-popup").classList.remove("active")}),1e3)}),1e3)},isDisabled:function(t,e){return!(!t.name||!e.name)&&(0===this.vSizes.length?-1===this.product.variants.findIndex((function(e){return e.colors[0].color_name===t.name})):0===this.vColors.length?-1===this.product.variants.findIndex((function(t){return t.size[0].size_name===e.name})):-1===this.product.variants.findIndex((function(i){return i.colors[0].color_name===t.name&&i.size[0].size_name===e.name})))},toggleColorItem:function(t){this.isDisabled(t,this.curSize)||(this.curColor===t?this.curColor={name:null,text:null,image:null}:this.curColor=t)},toggleSizeItem:function(t){this.isDisabled(this.curColor,t)||(this.curSize===t?this.curSize={name:null,text:null,image:null}:this.curSize=t)},resetValue:function(){this.curColor={name:null,text:null,image:null},this.curSize={name:null,text:null,image:null}},getFlag:function(){this.$route.path.includes("sticky-info")&&(this.isShare=!1)},changeQty:function(t){this.qty=t}})};const x={components:{PvMediaOne:p,PvDetailOne:(0,d.Z)(y,(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[i("h1",{staticClass:"product-title"},[t._v(t._s(t.product.name))]),t._v(" "),t.isProductNav?i("pv-product-nav",{attrs:{"prev-product":t.prevProduct,"next-product":t.nextProduct}}):t._e(),t._v(" "),i("div",{staticClass:"ratings-container"},[i("div",{staticClass:"product-ratings"},[i("span",{staticClass:"ratings",style:"width:"+20*t.product.ratings+"%"}),t._v(" "),i("span",{staticClass:"tooltiptext tooltip-top"},[t._v(t._s(t._f("priceFormat")(t.product.ratings)))])]),t._v(" "),t.product.reviews>0?i("a",{staticClass:"rating-link",attrs:{href:"javascript:;"}},[t._v("( "+t._s(t.product.reviews)+" Reviews )")]):i("a",{staticClass:"rating-link",attrs:{href:"javascript:;"}},[t._v("( There is no review yet. )")])]),t._v(" "),i("hr",{staticClass:"short-divider"}),t._v(" "),t.product.price?i("div",{key:"singlePrice",staticClass:"price-box"},[t.product.is_sale?[i("span",{staticClass:"new-price"},[t._v("$"+t._s(t._f("priceFormat")(t.product.sale_price)))]),t._v(" "),i("span",{staticClass:"old-price"},[t._v("$"+t._s(t._f("priceFormat")(t.product.price)))])]:[i("span",{staticClass:"new-price"},[t._v("$"+t._s(t._f("priceFormat")(t.product.price)))])]],2):i("div",{staticClass:"price-box"},[t.minPrice!==t.maxPrice?[i("span",{staticClass:"new-price"},[t._v("$"+t._s(t._f("priceFormat")(t.minPrice))+" – $"+t._s(t._f("priceFormat")(t.maxPrice)))])]:[i("span",{staticClass:"new-price"},[t._v("$"+t._s(t._f("priceFormat")(t.minPrice)))])]],2),t._v(" "),t.product.short_description?i("div",{staticClass:"product-desc"},[i("p",[t._v(t._s(t.product.short_description))])]):t._e(),t._v(" "),i("ul",{staticClass:"single-info-list"},[t.product.sku?i("li",[t._v("\n\t\t\tSKU:\n\t\t\t"),i("strong",[t._v(t._s(t.product.sku))])]):t._e(),t._v(" "),i("li",[t._v("\n\t\t\tCATEGORY:\n\t\t\t"),i("strong",t._l(t.product.product_categories,(function(e,s){return i("nuxt-link",{key:"product-category-"+s,staticClass:"product-category",attrs:{to:{path:"/shop",query:{category:e.slug}}}},[t._v("\n\t\t\t\t\t"+t._s(e.name)+"\n\t\t\t\t\t"),s<t.product.product_categories.length-1?[t._v(",")]:t._e()],2)})),1)]),t._v(" "),t.product.product_tags.length>0?i("li",[t._v("\n\t\t\tTAGS:\n\t\t\t"),i("strong",t._l(t.product.product_tags,(function(e,s){return i("nuxt-link",{key:"product-category-"+s,staticClass:"product-category",attrs:{to:{path:"/shop",query:{tag:e.slug}}}},[t._v("\n\t\t\t\t\t"+t._s(e.name)+"\n\t\t\t\t\t"),s<t.product.product_tags.length-1?[t._v(",")]:t._e()],2)})),1)]):t._e()]),t._v(" "),t.product.variants.length>0?i("div",{staticClass:"product-filters-container"},[t.vColors.length>0?i("div",{staticClass:"product-single-filter"},[i("label",[t._v("Color:")]),t._v(" "),i("ul",{staticClass:"config-size-list config-color-list config-filter-list"},t._l(t.vColors,(function(e,s){return i("li",{key:"variant-color-"+s,class:{disabled:t.isDisabled(e,t.curSize),active:t.curColor===e},on:{click:function(i){return t.toggleColorItem(e)}}},[e.image[0]?i("a",{key:"thumbForm",staticClass:"filter-thumb p-0",class:{disabled:t.isDisabled(e,t.curSize)},attrs:{href:"javascript:;"}},[i("img",{attrs:{src:""+t.baseUrl+e.image[0].url,width:e.image[0].width,height:e.image[0].height,alt:"color thumb"}})]):i("a",{key:"colorForm",staticClass:"filter-color border-0",class:{disabled:t.isDisabled(e,t.curSize)},style:{backgroundColor:e.text},attrs:{href:"javascript:;"}})])})),0)]):t._e(),t._v(" "),t.vSizes.length>0?i("div",{staticClass:"product-single-filter"},[i("label",[t._v("Size:")]),t._v(" "),i("ul",{staticClass:"config-size-list"},t._l(t.vSizes,(function(e,s){return i("li",{key:"variant-size-"+s,class:{disabled:t.isDisabled(t.curColor,e),active:t.curSize===e},on:{click:function(i){return t.toggleSizeItem(e)}}},[e.image[0]?i("a",{key:"thumbSizeForm",staticClass:"filter-thumb p-0",class:{disabled:t.isDisabled(e,t.curSize)},attrs:{href:"javascript:;"}},[i("img",{attrs:{src:""+t.baseUrl+e.image[0].url,width:e.image[0].width,height:e.image[0].height,alt:"size thumb"}})]):i("a",{staticClass:"d-flex align-items-center justify-content-center",class:{disabled:t.isDisabled(t.curColor,e)},attrs:{href:"javascript:;"}},[e.text?[t._v(t._s(e.text))]:i("img",{attrs:{src:""+t.baseUrl+e.thumbnail[0]}})],2)])})),0)]):t._e(),t._v(" "),i("div",{staticClass:"product-single-filter"},[i("vue-slide-toggle",{attrs:{open:null!==t.curColor.name||null!==t.curSize.name}},[i("label"),t._v(" "),i("a",{staticClass:"font1 text-uppercase clear-btn",attrs:{href:"javascript:;"},on:{click:t.resetValue}},[t._v("Clear")])])],1)]):t._e(),t._v(" "),i("div",{staticClass:"product-action"},[t.product.variants.length>0?i("vue-slide-toggle",{attrs:{open:t.isPriceShow}},[t.minPrice===t.maxPrice||t.product.price?i("div",{key:"samePrice",staticClass:"price-box product-filtered-price"},[i("span",{staticClass:"product-stock"},[t._v(t._s(t.product.stock)+" in stock")])]):i("div",{staticClass:"price-box product-filtered-price"},[t.product.variants[t.curIndex].sale_price?[i("del",{staticClass:"old-price"},[i("span",[t._v("$"+t._s(t._f("priceFormat")(t.product.variants[t.curIndex].price)))])]),t._v(" "),i("span",{staticClass:"product-price"},[t._v("$"+t._s(t._f("priceFormat")(t.product.variants[t.curIndex].sale_price)))])]:[i("span",{staticClass:"product-price"},[t._v("$"+t._s(t._f("priceFormat")(t.product.variants[t.curIndex].price)))])]],2)]):t._e(),t._v(" "),i("div",{staticClass:"product-single-qty"},[i("pv-quantity-input",{attrs:{product:t.product,qty:1},on:{changeCurrentQty:t.changeQty}})],1),t._v(" "),i("a",{staticClass:"btn btn-dark add-cart mr-2",class:{disabled:!t.isCartActive},attrs:{href:"javascript:;",title:"Add to Cart"},on:{click:t.addCart}},[t._v("Add to Cart")]),t._v(" "),i("nuxt-link",{staticClass:"btn btn-gray view-cart d-none",attrs:{to:"/pages/cart"}},[t._v("View cart")])],1),t._v(" "),i("hr",{staticClass:"divider mb-0 mt-0"}),t._v(" "),i("div",{staticClass:"product-single-share mb-3"},[i("label",{staticClass:"sr-only"},[t._v("Share:")]),t._v(" "),t.isShare?i("div",{staticClass:"social-icons mr-2"},[i("a",{staticClass:"social-icon social-facebook icon-facebook",attrs:{href:"javascript:;",title:"Facebook"}}),t._v(" "),i("a",{staticClass:"social-icon social-twitter icon-twitter",attrs:{href:"javascript:;",title:"Twitter"}}),t._v(" "),i("a",{staticClass:"social-icon social-linkedin fab fa-linkedin-in",attrs:{href:"javascript:;",title:"Linkedin"}}),t._v(" "),i("a",{staticClass:"social-icon social-gplus fab fa-google-plus-g",attrs:{href:"javascript:;",title:"Google +"}}),t._v(" "),i("a",{staticClass:"social-icon social-mail icon-mail-alt",attrs:{href:"javascript:;",title:"Mail"}})]):t._e(),t._v(" "),t.isWishlisted?i("nuxt-link",{staticClass:"btn-icon-wish add-wishlist added-wishlist",attrs:{to:"/pages/wishlist",title:"Go to Wishlist"}},[i("i",{staticClass:"icon-wishlist-2"}),t._v(" "),i("span",[t._v("Go to Wishlist")])]):t._e(),t._v(" "),t.isWishlisted?t._e():i("a",{staticClass:"btn-icon-wish add-wishlist",attrs:{href:"javascript:;",title:"Add to Wishlist"},on:{click:function(e){return t.addWishlist(e)}}},[i("i",{staticClass:"icon-wishlist-2"}),t._v(" "),i("span",[t._v("Add to Wishlist")])])],1)],1)}),[],!1,null,null,null).exports},props:{slug:String},data:function(){return{product:null,currentDemo:c.tT}},mounted:function(){this.getProduct()},methods:{getProduct:function(){var t=this;c.ZP.get("".concat(c.FH,"/products/").concat(this.slug),{params:{demo:c.tT,quick_view:!0}}).then((function(e){t.product=e.data.product})).catch((function(t){return{error:JSON.stringify(t)}}))}}};const w=(0,d.Z)(x,(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"product-single-container product-single-default product-quick-view mb-0 custom-scrollbar skeleton-body"},[t.product?t._e():i("div",{staticClass:"quickview-wrap product"},[t._m(0)]),t._v(" "),t.product?i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-6 product-single-gallery mb-md-0"},[i("pv-media-one",{attrs:{product:t.product,"is-magnify":!1}})],1),t._v(" "),i("div",{staticClass:"col-md-6 product-single-details mb-0"},[i("pv-detail-one",{attrs:{product:t.product,"is-product-nav":!1}})],1),t._v(" "),i("button",{staticClass:"mfp-close",attrs:{title:"Close (Esc)",type:"button"},on:{click:function(e){return t.$emit("close")}}},[t._v("×")])]):t._e()])}),[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"skel-group"},[i("div",{staticClass:"col-md-6 summary-before"}),t._v(" "),i("div",{staticClass:"col-md-6 summary entry-summary"})])}],!1,null,null,null).exports}}]);