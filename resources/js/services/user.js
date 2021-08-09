import { http } from "../api";

export function update(data) {
    return http().put('/user/update', data);
}

export function updateBilling(data) {
    return http().put('/user/billing/update', data);
}

export function createShipping(data) {
    return http().post('/user/shipping/create', data);
}


