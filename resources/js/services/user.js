import { http } from "../api";

export function update(data) {
    return http().post('/user/update', data);
}


