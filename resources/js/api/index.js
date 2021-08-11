import axios from "axios";
import * as auth from "../services/auth";

const baseDonmain = "http://localhost:8000";
const apiURL = "http://localhost:8000/api/v1";

export const customHeader = {
    "Content-Type": "application/json",
    Accept: "application/json"
};

export const baseUrl = `${baseDonmain}`;
export const currentDemo = 20;

export function http() {
    return axios.create({
        baseURL: window.config.APP == 'production' ? window.config.API_URL : apiURL,
        headers: {
            Authorization: "Bearer " + auth.getAccessToken(),
            "Content-Type": "application/json",
            Accept: "application/json"
        }
    });
}

export function httpFile() {
    return axios.create({
        baseURL: apiURL,
        headers: {
            Authorization: "Bearer " + auth.getAccessToken(),
            "Content-Type": "multipart/form-data",
            Accept: "application/json"
        }
    });
}

export default axios.create({
    baseUrl,
    headers: customHeader
});
