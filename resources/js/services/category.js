import { http, httpFile } from "../api";

export function category() {
    return http().get('/category');
}

export function createCategory(data) {
    return httpFile().post('/category/create', data);
}

export function updateCategory(data) {
    return httpFile().put('/category/update', data);
}