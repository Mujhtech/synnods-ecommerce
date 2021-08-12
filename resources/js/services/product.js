import { http } from "../api";

export function fetchProduct() {
    return http().get('/product');
}

export function fetchSingle(slug) {
    return http().get(`/product/${slug}`);
}