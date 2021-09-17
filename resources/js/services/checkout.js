import { http } from "../api";

export function getPaymentMethod() {
    return http().get('/checkout/payment-methods');
}

export function getShippingQoute() {
    return http().get('/category');
}