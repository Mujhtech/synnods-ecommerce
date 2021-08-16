import { http } from "../api";

export function fetchProduct() {
    return http().get('/product');
}

export function fetchSingle(slug) {
    return http().get(`/product/${slug}`);
}

export function fetchShop(data) {
    return http().get('/product/shop', data);
}