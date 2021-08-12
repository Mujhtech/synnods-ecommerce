import { http } from "../api";

export function vendor() {
    return http().get('/vendor');
}

export function vendorProduct(slug) {
    return http().get(`/product/vendor/${slug}`);
}



