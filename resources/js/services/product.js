import { http } from "../api";

export function fetchProduct() {
    return http().get('/product');
}