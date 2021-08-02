import axios from "axios";
import * as auth from "../services/auth";

const baseDonmain = "http://localhost:3000";
const apiURL = "http://localhost:8000/api";

export const customHeader = {
    "Content-Type": "application/json",
    Accept: "application/json"
};

export const baseUrl = `${baseDonmain}`;
export const currentDemo = 20;

export function http() {
    return axios.create({
        baseURL: apiURL,
        headers: {
            Authorization: "Bearer " + auth.getAccessToken()
        }
    });
}

export function httpFile() {
    return axios.create({
        baseURL: apiURL,
        headers: {
            Authorization: "Bearer " + auth.getAccessToken(),
            "Content-Type": "multipart/form-data"
        }
    });
}

export default axios.create({
    baseUrl,
    headers: customHeader
});
