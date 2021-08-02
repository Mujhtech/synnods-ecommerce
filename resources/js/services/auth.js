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

export function login(user) {
    return http().post('/auth/login', user)
    .then(response => {
        if(response.status === 200){
            setToken(response.data);
        }
        return response.data;
    });
}

function setToken(user){
    var ciphertext = CryptoJS.AES.encrypt(JSON.stringify({user: user}), 'laravellaravelvuevuespaspa');
    console.log(ciphertext.toString());
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

    var bytes  = CryptoJS.AES.decrypt(user.toString(), 'laravellaravelvuevuespaspa');
    var plaintext = JSON.parse(bytes.toString(CryptoJS.enc.Utf8));

    return plaintext.user.access_token;
}

export function getProfile() {
    return http().get('/auth/profile');
}
