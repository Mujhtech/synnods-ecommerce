import { http } from "../api";

export function getPaymentMethod() {
    return http().get('/checkout/payment-methods');
}

export function getShippingQoute(data) {
    return http().post('/shipping', data);
}

export function getCouponStatus(data) {
    return http().post('/checkout/coupon', data);
}