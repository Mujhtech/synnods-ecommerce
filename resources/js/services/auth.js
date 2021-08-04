import { http } from "../api";
var CryptoJS = require("crypto-js");

export function register(user) {
    return http().post('/auth/register', user);
}

export function recover(data) {
    return http().post('/auth/recover', data);
}

export function reset(data) {
    return http().post('/auth/reset', data);
}

export function verify(data) {
    return http().post('/auth/verify', data);
}

export function resend(data) {
    return http().post('/auth/resend', data);
}

export function login(data) {
    return http().post('/auth/login', data);
}

export function setToken(token){
    let ciphertext = CryptoJS.AES.encrypt(JSON.stringify({token: token}), 'laravellaravelvuevuespaspa');
    localStorage.setItem('SYNECT', ciphertext);
}

export function isLoggedIn() {
    const token = localStorage.getItem('SYNECT');

    return token != null;
}

export function logout() {
    http().get('/auth/logout');
    localStorage.removeItem('SYNECT');
}

export function getAccessToken() {
    const token = localStorage.getItem('SYNECT');
    if (!token){
        return null;
    }

    var bytes  = CryptoJS.AES.decrypt(token.toString(), 'laravellaravelvuevuespaspa');
    var plaintext = JSON.parse(bytes.toString(CryptoJS.enc.Utf8));

    return plaintext.token;
}

export function getProfile() {
    return http().get('/auth/profile');
}
