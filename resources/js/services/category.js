import { http, httpFile } from "../api";

export function category() {
    return http().get('/category');
}

export function topLevel() {
    return http().get('/category/top-level');
}

export function createCategory(data) {
    return httpFile().post('/category/create', data);
}

export function updateCategory(data) {
    return httpFile().put('/category/update', data);
}

export function categoryProduct(slug) {
    return http().get(`/product/category/${slug}`);
}

export function subCategoryProduct(slug) {
    return http().get(`/product/sub_category/${slug}`);
}