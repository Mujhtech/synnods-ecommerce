import { http } from "../api";

export function vendor() {
    return http().get('/vendor');
}

export function vendorProduct(vendor) {
    return http().get(`/product/vendor/${vendor}`);
}



