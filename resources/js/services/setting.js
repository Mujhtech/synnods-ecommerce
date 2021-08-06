import { http } from "../api";

export function subscribe(data) {
    return http().post('/subcribe', data);
}