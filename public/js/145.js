"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[145],{9145:(t,e,s)=>{s.r(e),s.d(e,{default:()=>p});var n=s(7757),r=s.n(n),c=s(4637),o=s(8498),a=s(4369);function i(t,e,s,n,r,c,o){try{var a=t[c](o),i=a.value}catch(t){return void s(t)}a.done?e(i):Promise.resolve(i).then(n,r)}var u,l;const d={components:{PvMediaOne:c.Z,PvDetailOne:o.Z},props:{slug:String},data:function(){return{product:null}},mounted:function(){this.getProduct()},methods:{getProduct:(u=r().mark((function t(){var e;return r().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,(0,a.t)(this.slug);case 3:e=t.sent,console.log(e),this.product=e.data.data.data,t.next=11;break;case 8:t.prev=8,t.t0=t.catch(0),console.log(t.t0.response);case 11:case"end":return t.stop()}}),t,this,[[0,8]])})),l=function(){var t=this,e=arguments;return new Promise((function(s,n){var r=u.apply(t,e);function c(t){i(r,s,n,c,o,"next",t)}function o(t){i(r,s,n,c,o,"throw",t)}c(void 0)}))},function(){return l.apply(this,arguments)})}};const p=(0,s(1900).Z)(d,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"product-single-container product-single-default product-quick-view mb-0 custom-scrollbar skeleton-body"},[t.product?t._e():s("div",{staticClass:"quickview-wrap product"},[t._m(0)]),t._v(" "),t.product?s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-6 product-single-gallery mb-md-0"},[s("pv-media-one",{attrs:{product:t.product,"is-magnify":!1}})],1),t._v(" "),s("div",{staticClass:"col-md-6 product-single-details mb-0"},[s("pv-detail-one",{attrs:{product:t.product,"is-product-nav":!1}})],1),t._v(" "),s("button",{staticClass:"mfp-close",attrs:{title:"Close (Esc)",type:"button"},on:{click:function(e){return t.$emit("close")}}},[t._v("×")])]):t._e()])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"skel-group"},[s("div",{staticClass:"col-md-6 summary-before"}),t._v(" "),s("div",{staticClass:"col-md-6 summary entry-summary"})])}],!1,null,null,null).exports}}]);